const docReady = cb => document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', cb) : cb();

docReady(() => {
    const nav = document.querySelector('nav');
    const toggle = document.querySelector('.menu-toggle');
    const navLinks = [...document.querySelectorAll('nav a[data-section]')];
    const header = document.querySelector('header');
    const supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style;
    const prefersReducedMotion = typeof window.matchMedia === 'function'
        ? window.matchMedia('(prefers-reduced-motion: reduce)').matches
        : false;

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

    const animateScroll = (targetY, duration = 1000) => {
        const startY = window.pageYOffset;
        const distance = targetY - startY;
        let startTime = null;

        const easeInOutCubic = t => (t < 0.5)
            ? 4 * t * t * t
            : 1 - Math.pow(-2 * t + 2, 3) / 2;

        const step = timestamp => {
            if (startTime === null) {
                startTime = timestamp;
            }
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = easeInOutCubic(progress);
            window.scrollTo(0, startY + distance * eased);
            if (elapsed < duration) {
                requestAnimationFrame(step);
            }
        };

        requestAnimationFrame(step);
    };

    const scrollToPosition = top => {
        if (prefersReducedMotion) {
            window.scrollTo(0, top);
            return;
        }
        if (supportsNativeSmoothScroll) {
            window.scrollTo({ top, behavior: 'smooth' });
        } else {
            animateScroll(top, 1000);
        }
    };

    const smoothAnchors = () => {
        const anchorLinks = [...document.querySelectorAll('a[href^="#"]')]
            .filter(link => link.getAttribute('href') && link.getAttribute('href') !== '#');

        if (!anchorLinks.length) {
            return;
        }

        const getTargetOffset = target => {
            const headerOffset = header ? header.offsetHeight + 12 : 0;
            const rect = target.getBoundingClientRect();
            return rect.top + window.pageYOffset - headerOffset;
        };

        anchorLinks.forEach(link => {
            link.addEventListener('click', event => {
                const hash = link.getAttribute('href');
                const target = hash ? document.querySelector(hash) : null;

                if (!target) {
                    return;
                }

                event.preventDefault();
                closeMenu();
                scrollToPosition(getTargetOffset(target));
                history.pushState(null, '', hash);
            });
        });
    };

    smoothAnchors();

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
