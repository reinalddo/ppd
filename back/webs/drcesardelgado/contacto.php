<?php
include 'includes/funciones.php';

$contactoConfig = load_json_data('contacto/config.json', []);
$header = $contactoConfig['header'] ?? [];
$info = $contactoConfig['informacion'] ?? [];
$mapa = $contactoConfig['mapa'] ?? [];
$formulario = $contactoConfig['formulario'] ?? [];

$nameField = $formulario['campos']['nombre'] ?? [];
$serviceField = $formulario['campos']['servicio'] ?? [];
$messageField = $formulario['campos']['mensaje'] ?? [];

$pageTitle = $contactoConfig['pageTitle'] ?? ('Contacto - ' . $clinic_name);
include 'includes/header.php';
?>

<main>
    <header class="py-5 bg-dark position-relative" style="background-image: url('<?php echo htmlspecialchars(asset_url($header['fondo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>'); background-size: cover; background-position: center;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-75"></div>
        <div class="container position-relative text-center text-white py-5">
            <h1 class="display-3 fw-bold"><?php echo htmlspecialchars($header['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="lead mx-auto" style="max-width: 700px;"><?php echo htmlspecialchars($header['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    </header>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="mb-5">
                        <h3 class="fw-bold text-primary mb-4"><?php echo htmlspecialchars($info['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>

                        <?php foreach (($info['items'] ?? []) as $item): ?>
                            <div class="d-flex align-items-start mb-4">
                                <div class="bg-white p-3 rounded-circle shadow-sm text-primary me-3">
                                    <i class="<?php echo htmlspecialchars($item['icono'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($item['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <?php foreach (($item['lineas'] ?? []) as $line): ?>
                                        <p class="text-muted mb-0"><?php echo htmlspecialchars($line, ENT_QUOTES, 'UTF-8'); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if (!array_key_exists('visible', $mapa) || !empty($mapa['visible'])): ?>
                        <div class="rounded-4 overflow-hidden shadow-sm border">
                            <iframe src="<?php echo htmlspecialchars($mapa['src'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" width="100%" height="<?php echo htmlspecialchars($mapa['height'] ?? '300', ENT_QUOTES, 'UTF-8'); ?>" style="border:0;" allowfullscreen="" loading="lazy" title="<?php echo htmlspecialchars($mapa['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></iframe>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-4"><?php echo htmlspecialchars($formulario['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
                            <form id="whatsappForm">
                                <div class="mb-3">
                                    <label for="<?php echo htmlspecialchars($nameField['id'] ?? 'nombre', ENT_QUOTES, 'UTF-8'); ?>" class="form-label fw-bold"><?php echo htmlspecialchars($nameField['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" id="<?php echo htmlspecialchars($nameField['id'] ?? 'nombre', ENT_QUOTES, 'UTF-8'); ?>" placeholder="<?php echo htmlspecialchars($nameField['placeholder'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="<?php echo htmlspecialchars($serviceField['id'] ?? 'servicio', ENT_QUOTES, 'UTF-8'); ?>" class="form-label fw-bold"><?php echo htmlspecialchars($serviceField['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></label>
                                    <select class="form-select form-select-lg bg-light border-0" id="<?php echo htmlspecialchars($serviceField['id'] ?? 'servicio', ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php foreach (($serviceField['opciones'] ?? []) as $option): ?>
                                            <option value="<?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($option, ENT_QUOTES, 'UTF-8'); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="<?php echo htmlspecialchars($messageField['id'] ?? 'mensaje', ENT_QUOTES, 'UTF-8'); ?>" class="form-label fw-bold"><?php echo htmlspecialchars($messageField['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></label>
                                    <textarea class="form-control bg-light border-0" id="<?php echo htmlspecialchars($messageField['id'] ?? 'mensaje', ENT_QUOTES, 'UTF-8'); ?>" rows="<?php echo (int) ($messageField['rows'] ?? 4); ?>" placeholder="<?php echo htmlspecialchars($messageField['placeholder'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill fw-bold shadow hover-lift" title="<?php echo htmlspecialchars($formulario['boton']['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    <i class="bi bi-whatsapp me-2"></i> <?php echo htmlspecialchars($formulario['boton']['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                </button>
                                <p class="text-center text-muted small mt-3"><?php echo htmlspecialchars($formulario['ayuda'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.getElementById('whatsappForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var nombre = document.getElementById('<?php echo htmlspecialchars($nameField['id'] ?? 'nombre', ENT_QUOTES, 'UTF-8'); ?>').value.trim();
    var servicio = document.getElementById('<?php echo htmlspecialchars($serviceField['id'] ?? 'servicio', ENT_QUOTES, 'UTF-8'); ?>').value.trim();
    var mensaje = document.getElementById('<?php echo htmlspecialchars($messageField['id'] ?? 'mensaje', ENT_QUOTES, 'UTF-8'); ?>').value.trim();

    if (!nombre || !mensaje) {
        alert('<?php echo htmlspecialchars($formulario['mensajes']['validacion'] ?? 'Completa los campos requeridos.', ENT_QUOTES, 'UTF-8'); ?>');
        return;
    }

    var telefono = '<?php echo htmlspecialchars($clinic_phone, ENT_QUOTES, 'UTF-8'); ?>';
    var texto = 'Hola, mi nombre es *' + nombre + '*.' + '\n' +
                'Estoy interesado en: *' + servicio + '*.' + '\n\n' +
                'Mensaje: ' + mensaje;

    var url = 'https://wa.me/' + telefono + '?text=' + encodeURIComponent(texto);
    window.open(url, '_blank');
});
</script>

<?php include 'includes/footer.php'; ?>