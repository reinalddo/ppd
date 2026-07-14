(function () {
  'use strict';

  document.getElementById('year').textContent = new Date().getFullYear();

  /* ---------- Mobile nav toggle ---------- */
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('siteNav');

  function closeNav() {
    nav.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  function openNav() {
    nav.classList.add('is-open');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.contains('is-open');
      isOpen ? closeNav() : openNav();
    });

    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeNav);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeNav();
    });
  }

  /* ---------- Scroll reveal + waypoint lines ---------- */
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!prefersReduced && 'IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.reveal').forEach(function (el) {
      revealObserver.observe(el);
    });

    var sectionObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          sectionObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    document.querySelectorAll('.section').forEach(function (el) {
      sectionObserver.observe(el);
    });
  } else {
    document.querySelectorAll('.reveal, .section').forEach(function (el) {
      el.classList.add('in-view');
    });
  }

  /* ---------- Scrollspy ---------- */
  var navLinks = nav ? nav.querySelectorAll('a[href^="#"]') : [];
  var sections = Array.prototype.slice.call(document.querySelectorAll('main .section[id]'));

  if ('IntersectionObserver' in window && sections.length && navLinks.length) {
    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var link = nav.querySelector('a[href="#' + entry.target.id + '"]');
        if (!link) return;
        if (entry.isIntersecting) {
          navLinks.forEach(function (l) { l.classList.remove('is-active'); });
          link.classList.add('is-active');
        }
      });
    }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });

    sections.forEach(function (s) { spy.observe(s); });
  }
})();
