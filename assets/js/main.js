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

    const sliderEl = document.querySelector('[data-hero-slider]');
    if (sliderEl) {
        const slides = Array.from(sliderEl.querySelectorAll('.hero-slide'));
        const dots = Array.from(sliderEl.querySelectorAll('.hero-slider-dots button'));
        const visualSlides = Array.from((sliderEl.closest('.hero-splash') || document).querySelectorAll('[data-visual-slide]'));
        let current = 0;
        const total = slides.length;
        const update = index => {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                const selected = i === index;
                dot.setAttribute('aria-selected', String(selected));
            });
            if (visualSlides.length) {
                visualSlides.forEach(card => {
                    const matches = Number(card.dataset.visualSlide) === index;
                    card.classList.toggle('active', matches);
                });
            }
            current = index;
        };

        const nextSlide = () => {
            update((current + 1) % total);
        };

        let interval = setInterval(nextSlide, 7000);

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                update(idx);
                clearInterval(interval);
                interval = setInterval(nextSlide, 7000);
            });
        });

        update(0);
    }
});
