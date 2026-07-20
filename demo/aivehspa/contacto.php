<?php
require_once __DIR__ . '/includes/helpers.php';
$currentPage = 'contacto';
$pageTitle = 'Contacto';
$pageDescription = 'Escríbenos por WhatsApp o visítanos en ' . BUSINESS_ADDRESS . '. Horario de atención de ' . BUSINESS_NAME . '.';
include __DIR__ . '/includes/header.php';

$diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
$hoyIndex = ((int) date('N')) - 1; // 0 = Lunes ... 6 = Domingo
?>

<section class="page-hero" style="--hero-bg: url('<?= asset('img/hero/hero-contacto-bg.webp') ?>')">
  <div class="container">
    <p class="eyebrow reveal">Contacto</p>
    <h1 class="reveal">Escríbenos y agenda tu cita</h1>
    <p class="reveal">Cuéntanos qué servicio te interesa y te respondemos directo por WhatsApp.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-grid">

      <form class="contact-form reveal" id="contactForm" data-whatsapp-base="<?= whatsapp_link() ?>">
        <label for="nombre">Tu nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="¿Cómo te llamas?">

        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" placeholder="Cuéntanos qué servicio te interesa y cuándo te gustaría venir..." required></textarea>

        <button type="submit" class="btn btn--whatsapp btn--lg btn--block">
          <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16 3C9 3 3.2 8.7 3.2 15.7c0 2.5.7 4.8 1.9 6.8L3 29l6.7-2c1.9 1.1 4.1 1.6 6.3 1.6 7 0 12.8-5.7 12.8-12.7C28.8 8.7 23 3 16 3zm0 23.2c-2 0-3.9-.5-5.6-1.5l-.4-.2-4 1.1 1.1-3.9-.3-.4a10.4 10.4 0 0 1-1.7-5.6C5.1 9.8 10 5 16 5s10.9 4.8 10.9 10.7S22 26.2 16 26.2zm6-8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.8 8.8 0 0 1-4.4-3.8c-.3-.5.3-.5.9-1.7.1-.2 0-.4 0-.5l-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.2 3.4 5.4 4.7.7.3 1.3.5 1.8.7.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>
          <span>Enviar por WhatsApp</span>
        </button>
      </form>

      <div class="reveal">
        <dl class="contact-info">
          <dt>Dirección</dt>
          <dd><?= e(BUSINESS_ADDRESS) ?></dd>

          <dt>WhatsApp</dt>
          <dd><a class="link-arrow" href="<?= whatsapp_link('Hola, quiero más información') ?>" target="_blank" rel="noopener noreferrer"><?= e(WHATSAPP_DISPLAY) ?></a></dd>

          <dt>Horario</dt>
          <dd>
            <table class="hours-table">
              <?php foreach (BUSINESS_HOURS as $i => $row): ?>
                <tr class="<?= $i === $hoyIndex ? 'is-today' : '' ?>">
                  <td><?= e($row['dia']) ?><?php if ($i === $hoyIndex): ?><span class="hours-table__badge">Hoy</span><?php endif; ?></td>
                  <td><?= e($row['horas']) ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </dd>

          <dt>Síguenos</dt>
          <dd>
            <div class="social-icons">
              <a class="social-icon" <?= SOCIAL_FACEBOOK ? 'href="' . e(SOCIAL_FACEBOOK) . '" target="_blank" rel="noopener noreferrer"' : 'aria-disabled="true"' ?> aria-label="Facebook<?= SOCIAL_FACEBOOK ? '' : ' (próximamente)' ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
              </a>
              <a class="social-icon" <?= SOCIAL_INSTAGRAM ? 'href="' . e(SOCIAL_INSTAGRAM) . '" target="_blank" rel="noopener noreferrer"' : 'aria-disabled="true"' ?> aria-label="Instagram<?= SOCIAL_INSTAGRAM ? '' : ' (próximamente)' ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2.5" y="2.5" width="19" height="19" rx="5.5" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="4.3" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="17.6" cy="6.4" r="1.15" fill="currentColor"/></svg>
              </a>
            </div>
          </dd>
        </dl>

        <div class="map-embed">
          <iframe src="https://www.google.com/maps?q=<?= urlencode(BUSINESS_MAPS_QUERY) ?>&output=embed" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Ubicación de <?= e(BUSINESS_NAME) ?> en Google Maps"></iframe>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
