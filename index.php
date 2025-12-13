<?php
$year = date('Y');
$siteName = 'Primer Paso Digital';

$sectionMap = [
    'inicio' => [
        'file' => __DIR__ . '/sections/inicio.php',
        'title' => 'Primer Paso Digital | Sitios que despiertan curiosidad',
        'description' => 'Resumen de servicios digitales: páginas web y tiendas virtuales que despiertan curiosidad y llevan al cliente directo a WhatsApp.'
    ],
    'servicios-planes' => [
        'file' => __DIR__ . '/sections/servicios-planes.php',
        'title' => 'Servicios y Planes | Primer Paso Digital',
        'description' => 'Detalle de servicios y planes con precios claros para lanzar tu página web o tienda virtual orientada a conversiones.'
    ],
    'contacto' => [
        'file' => __DIR__ . '/sections/contacto.php',
        'title' => 'Contacto | Primer Paso Digital',
        'description' => 'Formulario y medios de contacto para escribirnos por correo, WhatsApp o agendar una reunión rápida.'
    ],
];

$sectionSlugs = array_keys($sectionMap);
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
$basePath = rtrim($scriptDir, '/');
if ($basePath === '.' || $basePath === '/') {
    $basePath = '';
}

$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$normalizedPath = trim(str_replace('\\', '/', $requestUri), '/');
$normalizedBase = trim($basePath, '/');
if ($normalizedBase !== '' && strpos($normalizedPath, $normalizedBase) === 0) {
    $normalizedPath = trim(substr($normalizedPath, strlen($normalizedBase)), '/');
}

$sectionParam = $_GET['section'] ?? '';
$currentSection = 'inicio';
if ($sectionParam && in_array($sectionParam, $sectionSlugs, true)) {
    $currentSection = $sectionParam;
} elseif ($normalizedPath && in_array($normalizedPath, $sectionSlugs, true)) {
    $currentSection = $normalizedPath;
}

$activeConfig = $sectionMap[$currentSection];

$pathFor = static function (string $slug = 'inicio') use ($basePath, $sectionSlugs): string {
    $slug = in_array($slug, $sectionSlugs, true) ? $slug : 'inicio';
    $slugPath = $slug === 'inicio' ? '' : '/' . $slug;
    $prefix = $basePath === '' ? '' : $basePath;
    $url = $prefix . $slugPath;
    return $url === '' ? '/' : $url;
};

$assetPath = static function (string $relative) use ($basePath): string {
    $relative = ltrim($relative, '/');
    $prefix = $basePath === '' ? '' : rtrim($basePath, '/') . '/';
    return $prefix . $relative;
};

$canonicalUrl = $pathFor($currentSection);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($activeConfig['title'], ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($activeConfig['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="agencia digital, diseño web, seo, desarrollo web, automatizaciones, marketing digital">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($activeConfig['title'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($activeConfig['description'], ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($assetPath('logos/logo.jpg'), ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#06090f">
    <link rel="icon" href="<?php echo htmlspecialchars($assetPath('logos/logo.jpg'), ENT_QUOTES, 'UTF-8'); ?>" type="image/jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/main.css">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Primer Paso Digital",
            "url": "<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>",
            "logo": "<?php echo htmlspecialchars($assetPath('logos/logo.jpg'), ENT_QUOTES, 'UTF-8'); ?>",
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "sales",
                "email": "hola@primerpasodigital.com",
                "areaServed": "LATAM"
            },
            "sameAs": [
                "https://www.instagram.com/primerpasodigital",
                "https://www.linkedin.com/company/primerpasodigital"
            ]
        }
    </script>
</head>
<body data-active-section="<?php echo htmlspecialchars($currentSection, ENT_QUOTES, 'UTF-8'); ?>">
    <header>
        <div class="wrapper navbar">
            <a class="brand" href="<?php echo htmlspecialchars($pathFor('inicio'), ENT_QUOTES, 'UTF-8'); ?>">
                <img src="logos/logo.png" alt="Identidad visual de <?php echo $siteName; ?>">
                <span><?php echo $siteName; ?></span>
            </a>
            <button class="menu-toggle" type="button" aria-label="Abrir navegación">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4 7H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M4 12H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M4 17H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
            <nav aria-label="Navegación principal">
                <ul>
                    <li><a data-section="inicio" href="<?php echo htmlspecialchars($pathFor('inicio'), ENT_QUOTES, 'UTF-8'); ?>">Inicio</a></li>
                    <li><a data-section="servicios-planes" href="<?php echo htmlspecialchars($pathFor('servicios-planes'), ENT_QUOTES, 'UTF-8'); ?>">Servicios y Planes</a></li>
                    <li><a data-section="contacto" href="<?php echo htmlspecialchars($pathFor('contacto'), ENT_QUOTES, 'UTF-8'); ?>">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <?php
        $sectionFile = $activeConfig['file'];
        if (is_file($sectionFile)) {
            include $sectionFile;
        } else {
            http_response_code(404);
            echo '<div class="wrapper"><p>No encontramos esta sección.</p></div>';
        }
        ?>
    </main>

    <footer>
        <div class="wrapper">
            <p>© <?php echo $year; ?> <?php echo $siteName; ?> · Estrategia, diseño y tecnología para lanzamientos digitales.</p>
        </div>
    </footer>

    <a class="whatsapp-floating" href="https://wa.me/573000000000?text=Hola%20Primer%20Paso%20Digital%2C%20quiero%20hablar" target="_blank" rel="noopener" aria-label="Escríbenos por WhatsApp">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
        <span>WhatsApp</span>
    </a>

    <script src="assets/js/main.js" defer></script>
</body>
</html>
