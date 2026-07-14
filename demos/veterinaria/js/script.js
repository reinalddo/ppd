(function () {
  'use strict';

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
      nav.classList.contains('is-open') ? closeNav() : openNav();
    });
    nav.querySelectorAll('a').forEach(function (link) { link.addEventListener('click', closeNav); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeNav(); });
  }

  var form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      form.classList.add('is-sent');
    });
  }
})();
