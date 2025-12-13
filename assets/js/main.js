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
});
