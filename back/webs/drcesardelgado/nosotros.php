<?php
include 'includes/funciones.php';

$nosotrosConfig = load_json_data('nosotros/config.json', []);
$header = $nosotrosConfig['header'] ?? [];
$historia = $nosotrosConfig['historia'] ?? [];
$valores = $nosotrosConfig['valores'] ?? [];
$especialistas = $nosotrosConfig['especialistas'] ?? [];

$pageTitle = $nosotrosConfig['pageTitle'] ?? ('Nosotros - ' . $clinic_name);
include 'includes/header.php';
?>

<main>
    <header class="py-5 bg-dark position-relative" style="background-image: url('<?php echo htmlspecialchars(asset_url($header['fondo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>'); background-size: cover; background-position: center;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-75"></div>
        <div class="container position-relative py-5 text-center text-white">
            <h1 class="display-4 fw-bold"><?php echo htmlspecialchars($header['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="lead mx-auto" style="max-width: 700px;"><?php echo htmlspecialchars($header['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <h2><?php echo htmlspecialchars($historia['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                    <?php foreach (($historia['parrafos'] ?? []) as $paragraph): ?>
                        <p><?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="<?php echo htmlspecialchars(asset_url($historia['imagen']['url'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($historia['imagen']['alt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid rounded shadow-sm" style="width: 82%; max-width: 520px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold text-primary"><?php echo htmlspecialchars($valores['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                </div>
            </div>
            <div class="row g-4">
                <?php foreach (($valores['items'] ?? []) as $item): ?>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 text-center">
                            <div class="fs-1 text-primary mb-3">
                                <i class="<?php echo htmlspecialchars($item['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></i>
                            </div>
                            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($item['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold text-primary"><?php echo htmlspecialchars($especialistas['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="text-muted"><?php echo htmlspecialchars($especialistas['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
            <div class="row g-4 text-center">
                <?php foreach (($especialistas['items'] ?? []) as $item): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="bg-white rounded-3 p-4 shadow-sm h-100">
                            <?php if (!empty($item['imagen'])): ?>
                                <img src="<?php echo htmlspecialchars(asset_url($item['imagen'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['alt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="rounded-circle mb-3" width="120" height="120">
                            <?php else: ?>
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 120px; height: 120px; background: <?php echo htmlspecialchars($item['iconoFondo'] ?? 'rgba(13, 110, 253, 0.12)', ENT_QUOTES, 'UTF-8'); ?>;">
                                    <i class="<?php echo htmlspecialchars($item['icono'] ?? 'bi bi-geo-alt-fill', ENT_QUOTES, 'UTF-8'); ?> fs-1" style="color: <?php echo htmlspecialchars($item['iconoColor'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8'); ?>;"></i>
                                </div>
                            <?php endif; ?>
                            <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($item['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="text-primary mb-0"><?php echo htmlspecialchars($item['especialidad'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php if (!empty($item['detalle'])): ?>
                                <p class="text-muted small mb-0 mt-2"><?php echo htmlspecialchars($item['detalle'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>