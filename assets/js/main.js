const docReady = cb => document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', cb) : cb();

docReady(() => {
    const nav = document.querySelector('nav');
    const toggle = document.querySelector('.menu-toggle');
    const navLinks = [...document.querySelectorAll('nav a[data-section]')];

    const closeMenu = () => nav && nav.classList.remove('open');

    if (toggle && nav) {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    }

    navLinks.forEach(link => link.addEventListener('click', () => {
        closeMenu();
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
        }
    }));

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.05,
        rootMargin: '0px 0px -5% 0px'
    });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    const setActiveNav = () => {
        const activeSection = document.body && document.body.dataset ? document.body.dataset.activeSection : '';
        navLinks.forEach(link => {
            const matches = link.dataset.section === activeSection;
            link.classList.toggle('active', matches);
        });
    };

    setActiveNav();

    const heroSliders = document.querySelectorAll('[data-hero-slider]');
    heroSliders.forEach(sliderEl => {
        const slides = Array.from(sliderEl.querySelectorAll('.hero-slide'));
        const total = slides.length;
        if (!total) {
            return;
        }

        const dots = Array.from(sliderEl.querySelectorAll('.hero-slider-dots button'));
        const sliderShell = sliderEl.closest('.hero-slider-shell') || sliderEl.parentElement;
        const prevBtn = sliderShell ? sliderShell.querySelector('[data-hero-prev]') : null;
        const nextBtn = sliderShell ? sliderShell.querySelector('[data-hero-next]') : null;
        const visualScope = sliderEl.closest('.hero-splash') || document;
        const visualSlides = Array.from(visualScope.querySelectorAll('[data-visual-slide]'));
        const autoplayDelay = Number(sliderEl.dataset.heroDelay) || 15000;
        let current = 0;
        let intervalId;

        const normalizeIndex = target => {
            const remainder = target % total;
            return remainder < 0 ? remainder + total : remainder;
        };

        const update = targetIndex => {
            const index = normalizeIndex(targetIndex);
            slides.forEach((slide, slideIdx) => {
                slide.classList.toggle('active', slideIdx === index);
            });
            dots.forEach((dot, dotIdx) => {
                dot.setAttribute('aria-selected', String(dotIdx === index));
            });
            visualSlides.forEach(card => {
                const matches = Number(card.dataset.visualSlide) === index;
                card.classList.toggle('active', matches);
            });
            current = index;
        };

        const restartAutoplay = () => {
            clearInterval(intervalId);
            intervalId = setInterval(() => update(current + 1), autoplayDelay);
        };

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                update(idx);
                restartAutoplay();
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                update(current - 1);
                restartAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                update(current + 1);
                restartAutoplay();
            });
        }

        update(0);
        restartAutoplay();
    });
});
