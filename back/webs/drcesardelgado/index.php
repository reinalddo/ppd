<?php
include 'includes/funciones.php';

$inicioConfig = load_json_data('inicio/config.json', []);
$hero = $inicioConfig['hero'] ?? [];
$beneficios = $inicioConfig['beneficios']['items'] ?? [];
$nosotros = $inicioConfig['nosotros'] ?? [];
$especialidades = $inicioConfig['especialidades'] ?? [];
$testimonios = $inicioConfig['testimonios'] ?? [];
$cta = $inicioConfig['cta'] ?? [];

$pageTitle = $inicioConfig['pageTitle'] ?? ('Inicio - ' . $clinic_name);
include 'includes/header.php';
?>

<main class="overflow-hidden">
    <section class="home-hero position-relative d-flex align-items-center" style="min-height: 90vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('<?php echo htmlspecialchars(asset_url($hero['fondo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>'); background-size: cover; background-position: center;"></div>
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: <?php echo htmlspecialchars($hero['overlay'] ?? 'linear-gradient(135deg, rgba(0,98,230,0.92), rgba(51,174,255,0.85))', ENT_QUOTES, 'UTF-8'); ?>;"></div>

        <div class="container position-relative z-1 text-white">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 fw-bold rounded-pill shadow-sm text-uppercase ls-2">
                        <?php echo htmlspecialchars($hero['badge'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <h1 class="display-3 fw-bold mb-3 lh-sm"><?php echo strip_tags($hero['titulo'] ?? '', '<br>'); ?></h1>
                    <p class="lead mb-4 opacity-90" style="max-width: 500px;">
                        <?php echo htmlspecialchars($hero['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="<?php echo htmlspecialchars(resolve_link_href($hero['botonPrimario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($hero['botonPrimario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($hero['botonPrimario']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-light btn-lg px-5 text-primary fw-bold shadow hover-lift rounded-pill">
                            <?php echo htmlspecialchars($hero['botonPrimario']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                        <a href="<?php echo htmlspecialchars(resolve_link_href($hero['botonSecundario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($hero['botonSecundario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($hero['botonSecundario']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-light btn-lg px-5 fw-bold rounded-pill">
                            <?php echo htmlspecialchars($hero['botonSecundario']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <img src="<?php echo htmlspecialchars(asset_url($hero['imagen']['url'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($hero['imagen']['alt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid" style="max-height: 600px; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3)); transform: scale(1.1); margin-bottom: -50px;">
                </div>
            </div>
        </div>

        <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0;">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 60px; fill: #ffffff;">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>
    </section>

    <section class="py-5 bg-white position-relative" style="z-index: 10;">
        <div class="container">
            <div class="row g-4 mt-2">
                <?php foreach ($beneficios as $index => $item): ?>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo (int) ($index * 100); ?>">
                        <div class="d-flex align-items-center p-4 bg-light rounded-4 border hover-lift transition-all">
                            <div class="<?php echo htmlspecialchars($item['iconoFondo'] ?? 'bg-primary', ENT_QUOTES, 'UTF-8'); ?> text-white p-3 rounded-circle me-3">
                                <i class="<?php echo htmlspecialchars($item['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                                <small class="text-muted"><?php echo htmlspecialchars($item['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="<?php echo htmlspecialchars(asset_url($nosotros['imagen']['url'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid rounded-4 shadow-lg" alt="<?php echo htmlspecialchars($nosotros['imagen']['alt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="position-absolute bottom-0 end-0 bg-white p-4 rounded-3 shadow-lg m-4 border-start border-5 border-primary" style="max-width: 200px;">
                            <h2 class="text-primary fw-bold display-4 mb-0"><?php echo htmlspecialchars($nosotros['estadistica']['valor'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                            <p class="small text-muted mb-0 fw-bold"><?php echo htmlspecialchars($nosotros['estadistica']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                    <h6 class="text-primary fw-bold text-uppercase ls-2"><?php echo htmlspecialchars($nosotros['pretitle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h6>
                    <h2 class="display-5 fw-bold mb-4"><?php echo htmlspecialchars($nosotros['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="lead text-muted mb-4"><?php echo htmlspecialchars($nosotros['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

                    <ul class="list-unstyled mb-4">
                        <?php foreach (($nosotros['items'] ?? []) as $item): ?>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo htmlspecialchars(resolve_link_href($nosotros['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($nosotros['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($nosotros['boton']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary rounded-pill px-4 fw-bold"><?php echo htmlspecialchars($nosotros['boton']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h6 class="text-primary fw-bold text-uppercase ls-2"><?php echo htmlspecialchars($especialidades['pretitle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h6>
                <h2 class="display-5 fw-bold"><?php echo htmlspecialchars($especialidades['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>

            <div class="row g-4">
                <?php foreach (($especialidades['items'] ?? []) as $index => $item): ?>
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="<?php echo (int) ($index * 100); ?>">
                        <?php if (!empty($item['destacado'])): ?>
                            <a href="<?php echo htmlspecialchars(resolve_link_href($item['href'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm h-100 bg-primary text-white text-decoration-none d-flex align-items-center justify-content-center hover-lift text-center p-4">
                                <div>
                                    <i class="<?php echo htmlspecialchars($item['icono'] ?? 'bi bi-grid-fill', ENT_QUOTES, 'UTF-8'); ?> fs-1 mb-3"></i>
                                    <h4 class="fw-bold"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h4>
                                    <span class="btn btn-outline-light rounded-pill btn-sm mt-3"><?php echo htmlspecialchars($item['textoAccion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                </div>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo htmlspecialchars(resolve_link_href($item['href'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm h-100 text-decoration-none hover-lift overflow-hidden">
                                <div class="overflow-hidden" style="height: 200px;">
                                    <img src="<?php echo htmlspecialchars(asset_url($item['imagen'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top transition-scale" alt="<?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" style="object-fit: cover; height: 100%; width: 100%;">
                                </div>
                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <span class="<?php echo htmlspecialchars($item['claseAccion'] ?? 'text-primary', ENT_QUOTES, 'UTF-8'); ?> small fw-bold"><?php echo htmlspecialchars($item['textoAccion'] ?? '', ENT_QUOTES, 'UTF-8'); ?> <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if (!array_key_exists('visible', $testimonios) || !empty($testimonios['visible'])): ?>
        <section class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h5 class="text-primary fw-bold text-uppercase"><?php echo htmlspecialchars($testimonios['pretitle'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                    <h2 class="fw-bold"><?php echo htmlspecialchars($testimonios['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                </div>
                <div class="row g-4">
                    <?php foreach (($testimonios['items'] ?? []) as $index => $item): ?>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?php echo (int) (($index + 1) * 100); ?>">
                            <div class="p-4 bg-light rounded-4 h-100 border shadow-sm position-relative">
                                <i class="bi bi-quote fs-1 text-primary position-absolute top-0 end-0 me-3 mt-2 opacity-25"></i>
                                <div class="text-warning mb-3"><?php echo htmlspecialchars($item['estrellas'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                <p class="fst-italic text-muted mb-4">"<?php echo htmlspecialchars($item['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"</p>
                                <div class="d-flex align-items-center">
                                    <div class="<?php echo htmlspecialchars($item['inicialFondo'] ?? 'bg-primary', ENT_QUOTES, 'UTF-8'); ?> text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-3" style="width: 45px; height: 45px;"><?php echo htmlspecialchars($item['inicial'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                    <div>
                                        <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($item['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h6>
                                        <small class="text-muted"><?php echo htmlspecialchars($item['cargo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="py-5 position-relative text-white" style="background: <?php echo htmlspecialchars($cta['fondo'] ?? 'linear-gradient(135deg, #0062E6, #33AEFF)', ENT_QUOTES, 'UTF-8'); ?>;">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="container position-relative z-1 text-center py-4" data-aos="zoom-in">
            <h2 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($cta['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
            <p class="lead mb-4 opacity-90"><?php echo htmlspecialchars($cta['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?php echo htmlspecialchars(resolve_link_href($cta['botonWhatsapp'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($cta['botonWhatsapp'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($cta['botonWhatsapp']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow hover-lift border border-2 border-white">
                    <i class="bi bi-whatsapp me-2"></i> <?php echo htmlspecialchars($cta['botonWhatsapp']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </a>

                <a href="<?php echo htmlspecialchars(resolve_link_href($cta['botonSecundario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($cta['botonSecundario'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($cta['botonSecundario']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-bold hover-lift">
                    <?php echo htmlspecialchars($cta['botonSecundario']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>