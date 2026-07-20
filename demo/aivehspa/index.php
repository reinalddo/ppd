<?php
require_once __DIR__ . '/includes/helpers.php';
$currentPage = 'inicio';
$pageTitle = null;
$pageDescription = BUSINESS_CATEGORY . '. Manicura, pedicura spa, cejas y limpieza facial en San Cristóbal. Agenda por WhatsApp.';
include __DIR__ . '/includes/header.php';

$manicuraPhotos = [
    ['file' => 'manicura-fucsia.webp', 'nombre' => 'Fucsia sólido', 'desc' => 'Esmaltado semipermanente en un tono vibrante de una sola pieza.'],
    ['file' => 'manicura-holografico.webp', 'nombre' => 'Cromado holográfico', 'desc' => 'Efecto espejo con destellos multicolor, aplicado en polvo cromado.'],
    ['file' => 'manicura-floral-nude.webp', 'nombre' => 'Nude con flores', 'desc' => 'Base nude con líneas finas y una flor 3D hecha a mano.'],
    ['file' => 'manicura-negro-glitter.webp', 'nombre' => 'Negro con glitter', 'desc' => 'Negro mate combinado con glitter y punta francesa invertida.'],
    ['file' => 'manicura-terracota-dorado.webp', 'nombre' => 'Terracota con dorado', 'desc' => 'Tonos tierra con encapsulado dorado y diseño de estrella.'],
    ['file' => 'manicura-celeste-glitter.webp', 'nombre' => 'Celeste con glitter', 'desc' => 'Celeste sólido con un acento en glitter plateado.'],
    ['file' => 'manicura-ombre-durazno.webp', 'nombre' => 'Ombré durazno', 'desc' => 'Degradado suave de durazno a blanco con flor 3D.'],
    ['file' => 'manicura-chocolate.webp', 'nombre' => 'Chocolate sólido', 'desc' => 'Esmaltado clásico en un marrón chocolate de alto brillo.'],
    ['file' => 'manicura-francesa-dorada.webp', 'nombre' => 'Francesa dorada', 'desc' => 'French clásica reinventada con línea dorada y perlas.'],
    ['file' => 'manicura-marmol-rosa.webp', 'nombre' => 'Mármol rosa', 'desc' => 'Efecto mármol en rosa con un acento blanco esmerilado.'],
];
?>

<!-- HERO -->
<section class="hero" style="--hero-bg: url('<?= asset('img/hero/hero-inicio-bg.webp') ?>')">
  <div class="container hero__inner">
    <div class="hero__content reveal">
      <p class="eyebrow">Aiveh Spa · San Cristóbal</p>
      <h1>El arte de cuidarte, uña por uña</h1>
      <p class="hero__lead">Manicura, pedicura spa, cejas y faciales en San Cristóbal — técnica, creatividad y productos de calidad en cada cita.</p>
      <div class="hero__actions">
        <a class="btn btn--whatsapp btn--lg" href="<?= whatsapp_link('Hola, quiero agendar una cita') ?>" target="_blank" rel="noopener noreferrer">
          <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16 3C9 3 3.2 8.7 3.2 15.7c0 2.5.7 4.8 1.9 6.8L3 29l6.7-2c1.9 1.1 4.1 1.6 6.3 1.6 7 0 12.8-5.7 12.8-12.7C28.8 8.7 23 3 16 3zm0 23.2c-2 0-3.9-.5-5.6-1.5l-.4-.2-4 1.1 1.1-3.9-.3-.4a10.4 10.4 0 0 1-1.7-5.6C5.1 9.8 10 5 16 5s10.9 4.8 10.9 10.7S22 26.2 16 26.2zm6-8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.8 8.8 0 0 1-4.4-3.8c-.3-.5.3-.5.9-1.7.1-.2 0-.4 0-.5l-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.2 3.4 5.4 4.7.7.3 1.3.5 1.8.7.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>
          <span>Agenda por WhatsApp</span>
        </a>
        <a class="btn btn--ghost btn--lg" href="<?= u('servicios') ?>" style="color:var(--crema); border-color:rgba(246,237,225,.4);">Ver servicios y precios</a>
      </div>
    </div>

    <div class="swatch-cluster reveal">
      <div class="swatch-cluster__item swatch-cluster__item--1"><img src="<?= asset('img/manicura/manicura-fucsia.webp') ?>" alt="Manicura color fucsia brillante" loading="eager"></div>
      <div class="swatch-cluster__item swatch-cluster__item--2"><img src="<?= asset('img/manicura/manicura-holografico.webp') ?>" alt="Manicura cromada holográfica" loading="eager"></div>
      <div class="swatch-cluster__item swatch-cluster__item--3"><img src="<?= asset('img/manicura/manicura-floral-nude.webp') ?>" alt="Manicura nude con diseño floral" loading="eager"></div>
      <div class="swatch-cluster__item swatch-cluster__item--4"><img src="<?= asset('img/manicura/manicura-terracota-dorado.webp') ?>" alt="Manicura terracota con detalles dorados" loading="eager"></div>
      <div class="swatch-cluster__item swatch-cluster__item--5"><img src="<?= asset('img/manicura/manicura-negro-glitter.webp') ?>" alt="Manicura negra con glitter" loading="eager"></div>
    </div>
  </div>
</section>

<!-- QUÉ HACEMOS -->
<section class="section" id="que-hacemos">
  <div class="container">
    <header class="section__head section__head--center reveal">
      <p class="eyebrow">Qué hacemos</p>
      <h2>Todo lo que tu cuidado personal necesita</h2>
      <p class="section__sub">Cuatro especialidades, un mismo nivel de detalle.</p>
    </header>

    <div class="grid grid--4">
      <?php
      $queHacemos = [
          ['foto' => 'servicios/que-hacemos-pedicura.webp', 'icon' => '<path d="M18 42c-4 0-7-3-7-8 0-6 2-10 2-16 0-5 2-9 7-9s6 4 6 8c0 5-1 7-1 12 0 4 2 6 2 9 0 3-3 4-9 4z"/><circle cx="16" cy="8" r="1.4" fill="currentColor" stroke="none"/><circle cx="20.5" cy="5.5" r="1.4" fill="currentColor" stroke="none"/><circle cx="25" cy="5.5" r="1.4" fill="currentColor" stroke="none"/><circle cx="28.5" cy="8" r="1.4" fill="currentColor" stroke="none"/>', 'titulo' => 'Pedicura Spa', 'desc' => 'Básica o Deluxe, con exfoliación, parafina y piedras calientes.'],
          ['foto' => 'servicios/que-hacemos-manicura.webp', 'icon' => '<path d="M14 44v-8c0-2-2-10-2-14 0-2 1-3 2-3s2 1 2 3v8"/><path d="M16 30v-14c0-2 1-3 2.2-3s2.2 1 2.2 3v12"/><path d="M20.4 28V12c0-2 1-3 2.2-3s2.2 1 2.2 3v16"/><path d="M24.8 28v-11c0-2 1-3 2.2-3s2.2 1 2.2 3v13"/><path d="M29.2 30c0-2 1-4 3-4s4 2 4 5v6c0 5-3 7-3 7H18"/>', 'titulo' => 'Manicura', 'desc' => 'Semipermanente, PolyGel, acrílico, esculpidas y más.'],
          ['foto' => 'servicios/que-hacemos-cejas.webp', 'icon' => '<path d="M6 27c4-11 15-16 22-11"/><path d="M31 15l11-7"/><path d="M42 8l0 4"/><path d="M38 8l4 0"/>', 'titulo' => 'Cejas y Depilación', 'desc' => 'Perfilado de cejas, depilación de bozo y axila.'],
          ['foto' => 'servicios/que-hacemos-facial.webp', 'icon' => '<path d="M24 8c8 0 14 6 14 14 0 9-6 18-14 18S10 31 10 22c0-8 6-14 14-14z"/><path d="M24 8V4"/><circle cx="19" cy="20" r="1.2" fill="currentColor" stroke="none"/><circle cx="29" cy="20" r="1.2" fill="currentColor" stroke="none"/><path d="M20 27c1.5 1.5 6.5 1.5 8 0"/>', 'titulo' => 'Limpieza Facial', 'desc' => 'Limpieza profunda con aparatología especializada.'],
      ];
      foreach ($queHacemos as $item):
        $fotoExists = is_file(__DIR__ . '/assets/img/' . $item['foto']);
      ?>
      <div class="summary-card reveal">
        <?php if ($fotoExists): ?>
          <img class="summary-card__photo" src="<?= asset('img/' . $item['foto']) ?>" alt="<?= e($item['titulo']) ?> en <?= e(BUSINESS_NAME) ?>" loading="lazy">
        <?php else: ?>
          <svg class="summary-card__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $item['icon'] ?></svg>
        <?php endif; ?>
        <h3><?= e($item['titulo']) ?></h3>
        <p><?= e($item['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- POR QUÉ ELEGIRNOS -->
<section class="section section--carbon">
  <div class="container">
    <header class="section__head reveal">
      <p class="eyebrow">Por qué Aiveh Spa</p>
      <h2>Cada detalle, cuidado como se merece</h2>
    </header>
    <div class="grid grid--4">
      <div class="reason reveal">
        <p class="reason__num">01</p>
        <h3>Diseños a tu medida</h3>
        <p>Desde looks clásicos hasta arte 3D — cada set es distinto.</p>
      </div>
      <div class="reason reveal">
        <p class="reason__num">02</p>
        <h3>Productos de calidad</h3>
        <p>Sistemas profesionales de PolyGel, acrílico y semipermanente.</p>
      </div>
      <div class="reason reveal">
        <p class="reason__num">03</p>
        <h3>Ambiente relajado</h3>
        <p>Un espacio cómodo en Barrio Obrero, pensado para desconectar.</p>
      </div>
      <div class="reason reveal">
        <p class="reason__num">04</p>
        <h3>Resultados que se notan</h3>
        <p>La mejor prueba es lo que ves: mira nuestro trabajo abajo.</p>
      </div>
    </div>
  </div>
</section>

<!-- GALERÍA PREVIEW -->
<section class="section section--alt">
  <div class="container">
    <header class="section__head section__head--center reveal">
      <p class="eyebrow">Nuestro trabajo</p>
      <h2>Cada esmalte cuenta una historia</h2>
      <p class="section__sub">Una muestra de nuestros diseños de manicura más recientes.</p>
    </header>
  </div>
  <div class="swatch-strip reveal">
    <?php foreach ($manicuraPhotos as $photo): ?>
      <figure class="swatch-strip__item">
        <img src="<?= asset('img/manicura/' . $photo['file']) ?>" alt="Manicura <?= e($photo['nombre']) ?>, trabajo real de <?= e(BUSINESS_NAME) ?>" loading="lazy">
        <figcaption>
          <strong><?= e($photo['nombre']) ?></strong>
          <span><?= e($photo['desc']) ?></span>
        </figcaption>
      </figure>
    <?php endforeach; ?>
  </div>
  <p class="text-center reveal" style="margin-top:1.5rem;"><a class="link-arrow" href="<?= u('servicios') ?>" style="margin-inline:auto;">Ver servicios y precios →</a></p>
</section>

<!-- CTA FINAL -->
<section class="section text-center">
  <div class="container">
    <h2 style="font-family:var(--font-display); font-weight:600; font-size:clamp(1.9rem,4vw,2.6rem); margin-bottom:1rem;">¿Lista para tu próxima cita?</h2>
    <p style="max-width:48ch; margin-inline:auto; opacity:.8; margin-bottom:1.75rem;">Escríbenos por WhatsApp y te confirmamos disponibilidad al momento.</p>
    <a class="btn btn--whatsapp btn--lg" href="<?= whatsapp_link('Hola, quiero agendar una cita') ?>" target="_blank" rel="noopener noreferrer">
      <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16 3C9 3 3.2 8.7 3.2 15.7c0 2.5.7 4.8 1.9 6.8L3 29l6.7-2c1.9 1.1 4.1 1.6 6.3 1.6 7 0 12.8-5.7 12.8-12.7C28.8 8.7 23 3 16 3zm0 23.2c-2 0-3.9-.5-5.6-1.5l-.4-.2-4 1.1 1.1-3.9-.3-.4a10.4 10.4 0 0 1-1.7-5.6C5.1 9.8 10 5 16 5s10.9 4.8 10.9 10.7S22 26.2 16 26.2zm6-8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.8 8.8 0 0 1-4.4-3.8c-.3-.5.3-.5.9-1.7.1-.2 0-.4 0-.5l-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.2 3.4 5.4 4.7.7.3 1.3.5 1.8.7.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>
      <span>Escríbenos por WhatsApp</span>
    </a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
