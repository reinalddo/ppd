(function () {
  'use strict';

  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Header: transparente sobre el hero, sólido al bajar ---------- */
  var header = document.getElementById('siteHeader');
  function toggleHeaderScrolled() {
    if (window.scrollY > 40) header.classList.add('is-scrolled');
    else header.classList.remove('is-scrolled');
  }
  if (header) {
    window.addEventListener('scroll', toggleHeaderScrolled, { passive: true });
    toggleHeaderScrolled();
  }

  /* ---------- Menú móvil ---------- */
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

  /* ---------- Reveal on scroll ---------- */
  if (!prefersReduced && 'IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
    document.querySelectorAll('.reveal').forEach(function (el) { revealObserver.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in-view'); });
  }

  /* ---------- Volver arriba ---------- */
  var backToTop = document.getElementById('backToTop');
  if (backToTop) {
    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: prefersReduced ? 'auto' : 'smooth' });
    });
    var toggleBackToTop = function () {
      if (window.scrollY > window.innerHeight * 0.6) backToTop.classList.add('is-visible');
      else backToTop.classList.remove('is-visible');
    };
    window.addEventListener('scroll', toggleBackToTop, { passive: true });
    toggleBackToTop();
  }

  /* ---------- Modales de categoría (servicios) ---------- */
  var openModalEl = null;

  function openModal(id) {
    var overlay = document.getElementById(id);
    if (!overlay) return;
    overlay.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    openModalEl = overlay;
  }
  function closeModal() {
    if (!openModalEl) return;
    openModalEl.classList.remove('is-open');
    document.body.style.overflow = '';
    openModalEl = null;
  }

  document.querySelectorAll('[data-modal-open]').forEach(function (btn) {
    btn.addEventListener('click', function () { openModal(btn.getAttribute('data-modal-open')); });
  });

  /* ---------- Flechas de la galería dentro del modal ---------- */
  document.querySelectorAll('[data-gallery-prev], [data-gallery-next]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var wrap = btn.closest('.modal__gallery-wrap');
      var gallery = wrap && wrap.querySelector('[data-gallery]');
      if (!gallery) return;
      var amount = gallery.clientWidth * 0.85;
      var delta = btn.hasAttribute('data-gallery-next') ? amount : -amount;
      gallery.scrollBy({ left: delta, behavior: prefersReduced ? 'auto' : 'smooth' });
    });
  });
  document.querySelectorAll('[data-modal-close]').forEach(function (btn) {
    btn.addEventListener('click', closeModal);
  });
  document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) closeModal();
    });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });

  /* ---------- Formulario de contacto -> WhatsApp ---------- */
  var contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var nombre = contactForm.querySelector('#nombre').value.trim();
      var mensaje = contactForm.querySelector('#mensaje').value.trim();
      if (!mensaje) return;
      var texto = nombre ? 'Hola, soy ' + nombre + '. ' + mensaje : 'Hola. ' + mensaje;
      var url = contactForm.getAttribute('data-whatsapp-base') + '?text=' + encodeURIComponent(texto);
      window.location.href = url;
    });
  }
})();
