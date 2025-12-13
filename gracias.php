<?php
$siteName = 'Primer Paso Digital';
$year = date('Y');
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
$basePath = rtrim($scriptDir, '/');
if ($basePath === '.' || $basePath === '/') {
    $basePath = '';
}
$homeUrl = $basePath === '' ? '/' : $basePath . '/';
$assetPath = static function (string $relative) use ($basePath): string {
    $relative = ltrim($relative, '/');
    $prefix = $basePath === '' ? '' : rtrim($basePath, '/') . '/';
    return $prefix . $relative;
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias | <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="<?php echo htmlspecialchars($assetPath('logos/logo.jpg'), ENT_QUOTES, 'UTF-8'); ?>" type="image/jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($assetPath('assets/css/main.css'), ENT_QUOTES, 'UTF-8'); ?>">
</head>
<body class="thanks-body">
    <main class="thanks-main">
        <section class="thanks-card" aria-labelledby="thanks-title">
            <div class="thanks-icon" aria-hidden="true">
                <span class="checkmark"></span>
            </div>
            <p class="eyebrow">Mensaje recibido</p>
            <h1 id="thanks-title">¡Gracias por contactarnos!</h1>
            <p class="thanks-lead">Hemos recibido tu mensaje. Un miembro del equipo te responderá en menos de 24 horas con los siguientes pasos.</p>
            <a class="cta thanks-btn" href="<?php echo htmlspecialchars($homeUrl, ENT_QUOTES, 'UTF-8'); ?>">Volver al inicio</a>
        </section>
        <p class="thanks-note">© <?php echo $year; ?> <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>. Todos los derechos reservados.</p>
    </main>
</body>
</html>
