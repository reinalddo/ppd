<?php
include 'includes/funciones.php';

$serviciosConfig = load_json_data('servicios/config.json', []);
$header = $serviciosConfig['header'] ?? [];
$cards = $serviciosConfig['cards'] ?? [];
$details = $serviciosConfig['detalles'] ?? [];
$planes = $serviciosConfig['planes'] ?? [];
$cta = $serviciosConfig['cta'] ?? [];

$pageTitle = $serviciosConfig['pageTitle'] ?? ('Servicios - ' . $clinic_name);
include 'includes/header.php';
?>

<main>
    <header class="py-5 bg-dark position-relative" style="background-image: url('<?php echo htmlspecialchars(asset_url($header['fondo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-75"></div>
        <div class="container position-relative text-center text-white py-5">
            <span class="badge bg-light text-primary mb-3 px-3 py-2 fw-bold rounded-pill"><?php echo htmlspecialchars($header['badge'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
            <h1 class="display-3 fw-bold"><?php echo htmlspecialchars($header['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="lead mx-auto mb-0" style="max-width: 700px;"><?php echo htmlspecialchars($header['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    </header>

    <section class="py-5 bg-light">
        <div class="container my-4">
            <div class="row g-4">
                <?php foreach ($cards as $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift" style="border-top: 5px solid <?php echo htmlspecialchars($item['borde'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?> !important;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="p-3 rounded-3 me-3" style="background: <?php echo htmlspecialchars($item['iconoFondo'] ?? 'rgba(13,110,253,0.1)', ENT_QUOTES, 'UTF-8'); ?>; color: <?php echo htmlspecialchars($item['iconoColor'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;">
                                        <i class="<?php echo htmlspecialchars($item['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-3"></i>
                                    </div>
                                    <h4 class="fw-bold mb-0"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h4>
                                </div>
                                <p class="text-muted mb-4"><?php echo htmlspecialchars($item['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                                <a href="#<?php echo htmlspecialchars($item['ancla'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none fw-bold stretched-link" style="color: <?php echo htmlspecialchars($item['linkColor'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;">
                                    Más información <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php foreach ($details as $detail): ?>
        <?php $isRight = ($detail['alineacion'] ?? 'left') === 'right'; ?>
        <section id="<?php echo htmlspecialchars($detail['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="parallax-section position-relative" style="background-image: url('<?php echo htmlspecialchars(asset_url($detail['fondo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>');">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: <?php echo htmlspecialchars($detail['overlay'] ?? 'rgba(17,24,39,0.78)', ENT_QUOTES, 'UTF-8'); ?>;"></div>

            <div class="container position-relative z-1 py-5" style="color: <?php echo htmlspecialchars($detail['textoColor'] ?? '#ffffff', ENT_QUOTES, 'UTF-8'); ?>;">
                <div class="row align-items-center">
                    <?php if ($isRight): ?><div class="col-lg-6"></div><?php endif; ?>

                    <div class="col-lg-6 <?php echo $isRight ? 'text-end' : ''; ?>">
                        <div class="d-flex align-items-center mb-3 <?php echo $isRight ? 'justify-content-end' : ''; ?>">
                            <?php if ($isRight): ?>
                                <h2 class="display-5 fw-bold mb-0 me-3"><?php echo htmlspecialchars($detail['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                                <i class="<?php echo htmlspecialchars($detail['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-1" style="color: <?php echo htmlspecialchars($detail['iconoColor'] ?? '#ffffff', ENT_QUOTES, 'UTF-8'); ?>;"></i>
                            <?php else: ?>
                                <i class="<?php echo htmlspecialchars($detail['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-1 me-3" style="color: <?php echo htmlspecialchars($detail['iconoColor'] ?? '#ffffff', ENT_QUOTES, 'UTF-8'); ?>;"></i>
                                <h2 class="display-5 fw-bold mb-0"><?php echo htmlspecialchars($detail['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                            <?php endif; ?>
                        </div>

                        <p class="lead mb-4 <?php echo !empty($detail['textoColor']) ? 'fw-bold' : ''; ?>"><?php echo htmlspecialchars($detail['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

                        <?php if (!empty($detail['lista'])): ?>
                            <ul class="list-unstyled mb-4 <?php echo $isRight ? 'd-inline-block text-end' : ''; ?>">
                                <?php foreach ($detail['lista'] as $item): ?>
                                    <li class="mb-2 fs-5">
                                        <?php if ($isRight): ?>
                                            <?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?> <i class="bi bi-check2-circle ms-2" style="color: <?php echo htmlspecialchars($detail['listaColor'] ?? '#ffffff', ENT_QUOTES, 'UTF-8'); ?>;"></i>
                                        <?php else: ?>
                                            <i class="bi bi-check2-circle me-2" style="color: <?php echo htmlspecialchars($detail['listaColor'] ?? '#ffffff', ENT_QUOTES, 'UTF-8'); ?>;"></i><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($detail['metricas'])): ?>
                            <div class="row g-3 mb-4">
                                <?php foreach ($detail['metricas'] as $metric): ?>
                                    <div class="col-6">
                                        <div class="rounded p-3 text-center bg-black bg-opacity-25" style="border: 1px solid <?php echo htmlspecialchars($metric['borde'] ?? '#198754', ENT_QUOTES, 'UTF-8'); ?>;">
                                            <h3 class="fw-bold mb-0"><?php echo htmlspecialchars($metric['valor'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
                                            <small><?php echo htmlspecialchars($metric['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($detail['pildoras'])): ?>
                            <div class="row g-3 mb-4">
                                <?php foreach ($detail['pildoras'] as $pill): ?>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center bg-white bg-opacity-10 p-3 rounded <?php echo $isRight ? 'justify-content-end text-end' : ''; ?>">
                                            <?php if ($isRight): ?>
                                                <span><?php echo htmlspecialchars($pill['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                                <i class="<?php echo htmlspecialchars($pill['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-2 ms-3"></i>
                                            <?php else: ?>
                                                <i class="<?php echo htmlspecialchars($pill['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-2 me-3"></i>
                                                <span><?php echo htmlspecialchars($pill['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($detail['aviso'])): ?>
                            <div class="alert alert-light d-inline-block text-danger fw-bold border-0 shadow-sm mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo htmlspecialchars($detail['aviso'], ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <a href="<?php echo htmlspecialchars(resolve_link_href($detail['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($detail['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo htmlspecialchars($detail['boton']['clases'] ?? 'btn btn-primary btn-lg rounded-pill px-5', ENT_QUOTES, 'UTF-8'); ?>">
                                <?php if (($detail['id'] ?? '') === 'urgencias'): ?><i class="bi bi-telephone-fill me-2"></i><?php endif; ?><?php echo htmlspecialchars($detail['boton']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </div>
                    </div>

                    <?php if (!$isRight): ?><div class="col-lg-6"></div><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php if (!array_key_exists('visible', $planes) || !empty($planes['visible'])): ?>
        <section class="py-5" style="background: linear-gradient(to bottom, #f8f9fa, #e9ecef);">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold display-5"><?php echo htmlspecialchars($planes['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="text-muted lead"><?php echo htmlspecialchars($planes['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>

                <div class="row justify-content-center align-items-center g-4">
                    <?php foreach (($planes['items'] ?? []) as $plan): ?>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-lg h-100 hover-lift <?php echo !empty($plan['destacado']) ? 'position-relative transform-scale' : ''; ?>" style="<?php echo !empty($plan['destacado']) ? 'z-index: 10; transform: scale(1.05); ' : ''; ?>border-top: 5px solid <?php echo htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?> !important; border-radius: 15px;">
                                <?php if (!empty($plan['badge'])): ?>
                                    <div class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary px-4 py-2 shadow-sm text-uppercase">
                                        <?php echo htmlspecialchars($plan['badge'], ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body p-5 text-center bg-white rounded-3" style="<?php echo !empty($plan['destacado']) ? 'border: 2px solid ' . htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8') . ';' : ''; ?>">
                                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: <?php echo !empty($plan['destacado']) ? '90px' : '80px'; ?>; height: <?php echo !empty($plan['destacado']) ? '90px' : '80px'; ?>; background: <?php echo htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>1a;">
                                        <i class="<?php echo htmlspecialchars($plan['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-1" style="color: <?php echo htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;"></i>
                                    </div>

                                    <h5 class="fw-bold mb-0" style="color: <?php echo htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;"><?php echo htmlspecialchars($plan['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <div class="my-3">
                                        <span class="<?php echo !empty($plan['destacado']) ? 'display-3' : 'display-4'; ?> fw-bold text-dark"><?php echo htmlspecialchars($plan['precio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                    </div>
                                    <p class="text-muted small mb-4"><?php echo htmlspecialchars($plan['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

                                    <ul class="list-unstyled text-start mx-auto mb-<?php echo !empty($plan['destacado']) ? '5' : '4'; ?>" style="max-width: 240px;">
                                        <?php foreach (($plan['caracteristicas'] ?? []) as $feature): ?>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill me-2" style="color: <?php echo htmlspecialchars($plan['color'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;"></i><?php echo htmlspecialchars($feature, ENT_QUOTES, 'UTF-8'); ?></li>
                                        <?php endforeach; ?>
                                        <?php foreach (($plan['caracteristicasNoIncluidas'] ?? []) as $feature): ?>
                                            <li class="mb-3 text-muted text-decoration-line-through"><i class="bi bi-x-circle me-2"></i><?php echo htmlspecialchars($feature, ENT_QUOTES, 'UTF-8'); ?></li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <a href="<?php echo htmlspecialchars(resolve_link_href($plan['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($plan['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo htmlspecialchars($plan['boton']['clases'] ?? 'btn btn-primary w-100 rounded-pill py-2 fw-bold', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($plan['boton']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold"><?php echo htmlspecialchars($cta['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
            <p class="lead mb-4"><?php echo htmlspecialchars($cta['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="<?php echo htmlspecialchars(resolve_link_href($cta['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars(resolve_link_target($cta['boton'] ?? []), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($cta['boton']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-light text-primary btn-lg fw-bold shadow"><?php echo htmlspecialchars($cta['boton']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>