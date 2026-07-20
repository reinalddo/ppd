
</main>

<footer class="site-footer">
  <div class="container site-footer__inner">
    <a class="brand brand--footer" href="<?= u('') ?>">
      <img class="brand__logo" src="<?= asset('img/logo.webp') ?>" alt="<?= e(BUSINESS_NAME) ?>" width="640" height="640">
    </a>

    <p class="site-footer__category"><?= e(BUSINESS_CATEGORY) ?></p>

    <?php if (BUSINESS_ADDRESS): ?>
      <p class="site-footer__line"><?= e(BUSINESS_ADDRESS) ?></p>
    <?php endif; ?>
    <p class="site-footer__line"><?= e(WHATSAPP_DISPLAY) ?></p>

    <div class="social-icons">
      <a class="social-icon" <?= SOCIAL_FACEBOOK ? 'href="' . e(SOCIAL_FACEBOOK) . '" target="_blank" rel="noopener noreferrer"' : 'aria-disabled="true"' ?> aria-label="Facebook<?= SOCIAL_FACEBOOK ? '' : ' (próximamente)' ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
      </a>
      <a class="social-icon" <?= SOCIAL_INSTAGRAM ? 'href="' . e(SOCIAL_INSTAGRAM) . '" target="_blank" rel="noopener noreferrer"' : 'aria-disabled="true"' ?> aria-label="Instagram<?= SOCIAL_INSTAGRAM ? '' : ' (próximamente)' ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2.5" y="2.5" width="19" height="19" rx="5.5" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="4.3" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="17.6" cy="6.4" r="1.15" fill="currentColor"/></svg>
      </a>
    </div>

    <p class="site-footer__copy">© <?= date('Y') ?> <?= e(BUSINESS_NAME) ?>. Diseñado por <a href="https://primerpasodigital.com/" target="_blank" rel="noopener noreferrer">Primer Paso Digital</a>.</p>
  </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Volver arriba" title="Volver arriba">
  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script src="<?= asset('js/script.js') ?>"></script>
</body>
</html>
