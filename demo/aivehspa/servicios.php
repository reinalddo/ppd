<?php
require_once __DIR__ . '/includes/helpers.php';
$currentPage = 'servicios';
$pageTitle = 'Servicios y precios';
$pageDescription = 'Pedicura spa, manicura, cejas, depilación y limpieza facial en ' . BUSINESS_NAME . ', San Cristóbal. Precios y agenda por WhatsApp.';
include __DIR__ . '/includes/header.php';

$dotColors = ['#C6376B', '#7FA06E', '#B08D57', '#6FA8B5'];

$manicuraPhotos = [
    'manicura/manicura-floral-nude.webp', 'manicura/manicura-celeste-glitter.webp', 'manicura/manicura-negro-glitter.webp',
    'manicura/manicura-ombre-durazno.webp', 'manicura/manicura-fucsia.webp', 'manicura/manicura-chocolate.webp',
    'manicura/manicura-terracota-dorado.webp', 'manicura/manicura-francesa-dorada.webp', 'manicura/manicura-holografico.webp',
    'manicura/manicura-marmol-rosa.webp',
];

// Las 3 categorías sin fotos reales quedan listas para usar la imagen en
// cuanto se coloque en assets/img/servicios/ (ver tabla de prompts entregada).
$pedicuraFoto = 'servicios/pedicura-spa.webp';
$cejasFoto = 'servicios/cejas-depilacion.webp';
$facialFoto = 'servicios/limpieza-facial.webp';

$categorias = [
    'pedicura' => [
        'titulo' => 'Pedicura Spa',
        'desc' => 'Un ritual de belleza y relajación pensado para renovar tus pies de principio a fin.',
        'icon' => '<path d="M18 42c-4 0-7-3-7-8 0-6 2-10 2-16 0-5 2-9 7-9s6 4 6 8c0 5-1 7-1 12 0 4 2 6 2 9 0 3-3 4-9 4z"/><circle cx="16" cy="8" r="1.4" fill="currentColor" stroke="none"/><circle cx="20.5" cy="5.5" r="1.4" fill="currentColor" stroke="none"/><circle cx="25" cy="5.5" r="1.4" fill="currentColor" stroke="none"/><circle cx="28.5" cy="8" r="1.4" fill="currentColor" stroke="none"/>',
        'fotos' => is_file(__DIR__ . '/assets/img/' . $pedicuraFoto) ? [$pedicuraFoto] : [],
        'items' => [
            ['nombre' => 'Pedicura Spa Básica', 'precio' => '$15', 'nota' => 'Limpieza profunda, cuidado de cutículas y esmaltado profesional, con un masaje de 5 minutos de media pierna.'],
            ['nombre' => 'Pedicura Spa Deluxe', 'precio' => '$25', 'nota' => 'Exfoliación, toallas calientes, hidratación profunda, sales minerales, parafina, eliminación de callosidad y piedras calientes. Finaliza con masaje de 10 minutos de media pierna.'],
        ],
    ],
    'manicura' => [
        'titulo' => 'Manicura',
        'desc' => 'Sistemas profesionales para cada estilo, desde lo natural hasta el diseño más elaborado.',
        'icon' => '<path d="M14 44v-8c0-2-2-10-2-14 0-2 1-3 2-3s2 1 2 3v8"/><path d="M16 30v-14c0-2 1-3 2.2-3s2.2 1 2.2 3v12"/><path d="M20.4 28V12c0-2 1-3 2.2-3s2.2 1 2.2 3v16"/><path d="M24.8 28v-11c0-2 1-3 2.2-3s2.2 1 2.2 3v13"/><path d="M29.2 30c0-2 1-4 3-4s4 2 4 5v6c0 5-3 7-3 7H18"/>',
        'fotos' => $manicuraPhotos,
        'items' => [
            ['nombre' => 'Semipermanente', 'precio' => 'Desde $10'],
            ['nombre' => 'Nivelación + Manicure Ruso', 'precio' => 'Desde $15'],
            ['nombre' => 'Kapping de PolyGel', 'precio' => 'Desde $15'],
            ['nombre' => 'Jelly Tips', 'precio' => 'Desde $16'],
            ['nombre' => 'Acrílico', 'precio' => 'Desde $18'],
            ['nombre' => 'PolyGel', 'precio' => 'Desde $18'],
            ['nombre' => 'Esculpidas', 'precio' => 'Desde $20'],
        ],
    ],
    'cejas' => [
        'titulo' => 'Cejas y Depilación',
        'desc' => 'El toque final para un rostro perfectamente definido.',
        'icon' => '<path d="M6 27c4-11 15-16 22-11"/><path d="M31 15l11-7"/><path d="M42 8l0 4"/><path d="M38 8l4 0"/>',
        'fotos' => is_file(__DIR__ . '/assets/img/' . $cejasFoto) ? [$cejasFoto] : [],
        'items' => [
            ['nombre' => 'Perfilado de Cejas', 'precio' => '$5'],
            ['nombre' => 'Depilación de Bozo', 'precio' => '$3'],
            ['nombre' => 'Depilación de Axila', 'precio' => '$5'],
        ],
    ],
    'facial' => [
        'titulo' => 'Limpieza Facial',
        'desc' => 'Limpieza profunda con aparatología especializada para una piel renovada.',
        'icon' => '<path d="M24 8c8 0 14 6 14 14 0 9-6 18-14 18S10 31 10 22c0-8 6-14 14-14z"/><path d="M24 8V4"/><circle cx="19" cy="20" r="1.2" fill="currentColor" stroke="none"/><circle cx="29" cy="20" r="1.2" fill="currentColor" stroke="none"/><path d="M20 27c1.5 1.5 6.5 1.5 8 0"/>',
        'fotos' => is_file(__DIR__ . '/assets/img/' . $facialFoto) ? [$facialFoto] : [],
        'items' => [
            ['nombre' => 'Limpieza Facial con Aparatología', 'precio' => '$20'],
        ],
    ],
];
?>

<section class="page-hero" style="--hero-bg: url('<?= asset('img/hero/hero-servicios-bg.webp') ?>')">
  <div class="container">
    <p class="eyebrow reveal">Servicios</p>
    <h1 class="reveal">Salud, estética y precios claros</h1>
    <p class="reveal">Toca cualquier categoría para ver fotos de nuestro trabajo, el detalle de cada servicio y su precio.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid grid--2">
      <?php foreach ($categorias as $slug => $cat): ?>
        <button class="category-card reveal" type="button" data-modal-open="modal-<?= e($slug) ?>">
          <span class="category-card__media">
            <?php if (!empty($cat['fotos'])): ?>
              <img src="<?= asset('img/' . $cat['fotos'][0]) ?>" alt="Trabajo real de <?= e($cat['titulo']) ?> en <?= e(BUSINESS_NAME) ?>" loading="lazy">
            <?php else: ?>
              <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?= $cat['icon'] ?></svg>
            <?php endif; ?>
          </span>
          <span class="category-card__body">
            <span class="category-card__title"><?= e($cat['titulo']) ?></span>
            <span class="category-card__desc"><?= e($cat['desc']) ?></span>
            <span class="category-card__cta">
              Ver precios y fotos
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </span>
          </span>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php foreach ($categorias as $slug => $cat): ?>
<div class="modal-overlay" id="modal-<?= e($slug) ?>">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-<?= e($slug) ?>-title">
    <button class="modal__close" type="button" data-modal-close aria-label="Cerrar">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>

    <?php if (!empty($cat['fotos'])): ?>
      <div class="modal__gallery-wrap">
        <button class="modal__gallery-nav modal__gallery-nav--prev" type="button" data-gallery-prev aria-label="Foto anterior">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg>
        </button>
        <div class="modal__gallery" data-gallery>
          <?php foreach ($cat['fotos'] as $foto): ?>
            <img src="<?= asset('img/' . $foto) ?>" alt="Diseño de <?= e($cat['titulo']) ?> realizado en <?= e(BUSINESS_NAME) ?>" loading="lazy">
          <?php endforeach; ?>
        </div>
        <button class="modal__gallery-nav modal__gallery-nav--next" type="button" data-gallery-next aria-label="Foto siguiente">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg>
        </button>
      </div>
    <?php else: ?>
      <div class="modal__gallery--empty">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><?= $cat['icon'] ?></svg>
      </div>
    <?php endif; ?>

    <div class="modal__body">
      <h2 class="modal__title" id="modal-<?= e($slug) ?>-title"><?= e($cat['titulo']) ?></h2>
      <p class="modal__desc"><?= e($cat['desc']) ?></p>

      <div class="price-list">
        <?php foreach ($cat['items'] as $i => $item): ?>
          <div class="price-list__item">
            <span class="price-list__dot" style="background:<?= $dotColors[$i % count($dotColors)] ?>"></span>
            <span class="price-list__name">
              <?= e($item['nombre']) ?>
              <?php if (!empty($item['nota'])): ?><span class="price-list__note"><?= e($item['nota']) ?></span><?php endif; ?>
            </span>
            <span class="price-list__price"><?= e($item['precio']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <a class="btn btn--whatsapp btn--block" href="<?= whatsapp_link('Hola, me interesa el servicio de ' . $cat['titulo']) ?>" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16 3C9 3 3.2 8.7 3.2 15.7c0 2.5.7 4.8 1.9 6.8L3 29l6.7-2c1.9 1.1 4.1 1.6 6.3 1.6 7 0 12.8-5.7 12.8-12.7C28.8 8.7 23 3 16 3zm0 23.2c-2 0-3.9-.5-5.6-1.5l-.4-.2-4 1.1 1.1-3.9-.3-.4a10.4 10.4 0 0 1-1.7-5.6C5.1 9.8 10 5 16 5s10.9 4.8 10.9 10.7S22 26.2 16 26.2zm6-8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.8 8.8 0 0 1-4.4-3.8c-.3-.5.3-.5.9-1.7.1-.2 0-.4 0-.5l-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.2 3.4 5.4 4.7.7.3 1.3.5 1.8.7.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>
        <span>Consultar por WhatsApp</span>
      </a>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
