<?php
include __DIR__ . '/funciones.php';

$themeConfig = load_json_data('theme/config.json', []);
$themeColors = $themeConfig['colores'] ?? [];
$themeEffects = $themeConfig['efectos'] ?? [];
$headerConfig = load_json_data('header/config.json', []);

$headerLogo = $headerConfig['logo'] ?? [];
$headerMenu = $headerConfig['menu'] ?? [];
$headerCta = $headerConfig['botonCita'] ?? [];

$headerLogoIcon = $headerLogo['icono'] ?? 'bi bi-heart-pulse-fill';
$headerLogoIsImage = preg_match('/\.(svg|png|jpe?g|gif|webp)(\?.*)?$/i', $headerLogoIcon) === 1 || strpos($headerLogoIcon, '/') !== false;
$headerLogoText = $headerLogo['texto'] ?? $clinic_name;
$headerLogoHref = $headerLogo['href'] ?? 'index';
$headerLogoTitle = $headerLogo['title'] ?? 'Ir al inicio';
$headerCtaText = $headerCta['texto'] ?? 'Cita';
$headerCtaTarget = $headerCta['target'] ?? '_blank';
$headerCtaTitle = $headerCta['title'] ?? 'Agendar cita por WhatsApp';
$headerCtaHref = $headerCta['href'] ?? wa_link($headerCta['mensaje'] ?? 'Hola, quiero agendar una cita.');

$themePrimary = htmlspecialchars($themeColors['primary'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8');
$themeAccent = htmlspecialchars($themeColors['accent'] ?? '#33aeff', ENT_QUOTES, 'UTF-8');
$themeWarning = htmlspecialchars($themeColors['warning'] ?? '#ffc107', ENT_QUOTES, 'UTF-8');
$themeSuccess = htmlspecialchars($themeColors['success'] ?? '#198754', ENT_QUOTES, 'UTF-8');
$themeDanger = htmlspecialchars($themeColors['danger'] ?? '#dc3545', ENT_QUOTES, 'UTF-8');
$themeDark = htmlspecialchars($themeColors['dark'] ?? '#111827', ENT_QUOTES, 'UTF-8');
$themeLight = htmlspecialchars($themeColors['light'] ?? '#f8f9fa', ENT_QUOTES, 'UTF-8');
$themeSurface = htmlspecialchars($themeColors['surface'] ?? '#ffffff', ENT_QUOTES, 'UTF-8');
$themeNavbarText = htmlspecialchars($themeColors['navbarText'] ?? '#ffffff', ENT_QUOTES, 'UTF-8');
$themeNavbarHover = htmlspecialchars($themeColors['navbarHover'] ?? '#ffc107', ENT_QUOTES, 'UTF-8');
$themeNavbarScrolled = htmlspecialchars($themeColors['navbarScrolled'] ?? '#0d6efd', ENT_QUOTES, 'UTF-8');
$themeFooterBg = htmlspecialchars($themeColors['footerBg'] ?? '#111827', ENT_QUOTES, 'UTF-8');
$themeFooterText = htmlspecialchars($themeColors['footerText'] ?? '#f8f9fa', ENT_QUOTES, 'UTF-8');
$themeNavbarShadow = htmlspecialchars($themeEffects['navbarShadow'] ?? '0 4px 10px rgba(0,0,0,0.2)', ENT_QUOTES, 'UTF-8');
$themeCardShadow = htmlspecialchars($themeEffects['cardShadow'] ?? '0 1rem 3rem rgba(0,0,0,.175)', ENT_QUOTES, 'UTF-8');
$themeTextShadow = htmlspecialchars($themeEffects['textShadow'] ?? '0 2px 4px rgba(0,0,0,0.3)', ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') : htmlspecialchars($clinic_name, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="icon" href="<?php echo htmlspecialchars(asset_url($clinic_favicon), ENT_QUOTES, 'UTF-8'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="<?php echo htmlspecialchars(asset_url('css/estilos.css'), ENT_QUOTES, 'UTF-8'); ?>" rel="stylesheet">

    <style>
        :root {
            --primary: <?php echo $themePrimary; ?>;
            --accent: <?php echo $themeAccent; ?>;
            --warning: <?php echo $themeWarning; ?>;
            --success: <?php echo $themeSuccess; ?>;
            --danger: <?php echo $themeDanger; ?>;
            --dark: <?php echo $themeDark; ?>;
            --light: <?php echo $themeLight; ?>;
            --surface: <?php echo $themeSurface; ?>;
            --navbar-text: <?php echo $themeNavbarText; ?>;
            --navbar-hover: <?php echo $themeNavbarHover; ?>;
            --navbar-scrolled: <?php echo $themeNavbarScrolled; ?>;
            --footer-bg: <?php echo $themeFooterBg; ?>;
            --footer-text: <?php echo $themeFooterText; ?>;
            --navbar-shadow: <?php echo $themeNavbarShadow; ?>;
            --card-shadow: <?php echo $themeCardShadow; ?>;
            --text-shadow-soft: <?php echo $themeTextShadow; ?>;
        }

        /* 1. SCROLL SUAVE */
        html { scroll-behavior: smooth !important; }

        /* 2. PARALLAX */
        .parallax-section {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 500px;
            display: flex;
            align-items: center;
        }
        @media (max-width: 768px) { .parallax-section { background-attachment: scroll; } }

        /* 3. HOVER LIFT (Tarjetas) */
        .hover-lift { transition: all 0.3s ease; }
        .hover-lift:hover { transform: translateY(-10px); box-shadow: var(--card-shadow)!important; }
        
        /* 4. MENÚ INTELIGENTE (La solución al problema) */
        .navbar {
            transition: all 0.4s ease-in-out;
            padding: 1.2rem 0; /* Espaciado inicial */
            background-color: transparent; /* Transparente al principio */
        }
        
        /* Estado SCROLLED (Cuando bajas) */
        .navbar.scrolled {
            padding: 0.8rem 0;
            background-color: var(--navbar-scrolled) !important;
            box-shadow: var(--navbar-shadow);
        }

        /* Letras del Menú */
        .nav-link {
            color: var(--navbar-text) !important;
            font-weight: 600; /* Letra más gordita */
            font-size: 1.05rem;
            margin-left: 10px;
            text-shadow: var(--text-shadow-soft);
            transition: color 0.3s ease;
        }
        
        /* Efecto al pasar el mouse por los links */
        .nav-link:hover {
            color: var(--navbar-hover) !important;
            transform: scale(1.05);
        }
        
        /* Logo */
        .navbar-brand {
            display: inline-flex;
            align-items: center;
            font-size: 1.5rem;
            text-shadow: var(--text-shadow-soft);
        }

        .brand-mark {
            width: 28px;
            height: 28px;
            object-fit: contain;
        }

    /* FIX PARA MÓVILES: Fondo sólido al desplegar el menú */
        @media (max-width: 991px) {
            .home-hero {
                padding-top: 88px;
            }

            .home-hero .container {
                padding-top: 1.5rem;
            }

            .navbar-collapse {
                background-color: var(--navbar-scrolled);
                padding: 20px;
                border-radius: 15px; /* Bordes redondeados */
                margin-top: 15px; /* Separación del logo */
                box-shadow: 0 10px 30px rgba(0,0,0,0.3); /* Sombra para que flote */
                border: 1px solid rgba(255,255,255,0.1);
            }
            
            /* Ajuste para que el botón de Cita no quede pegado */
            .navbar-nav .btn {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo htmlspecialchars(project_url($headerLogoHref), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($headerLogoTitle, ENT_QUOTES, 'UTF-8'); ?>">
            <?php if ($headerLogoIsImage): ?>
                <img src="<?php echo htmlspecialchars(asset_url($headerLogoIcon), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($headerLogoText, ENT_QUOTES, 'UTF-8'); ?>" class="brand-mark me-2">
            <?php else: ?>
                <i class="<?php echo htmlspecialchars($headerLogoIcon, ENT_QUOTES, 'UTF-8'); ?> me-2"></i>
            <?php endif; ?>
            <?php echo htmlspecialchars($headerLogoText, ENT_QUOTES, 'UTF-8'); ?>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php foreach ($headerMenu as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo htmlspecialchars(project_url($item['href'] ?? 'index'), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($item['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <?php if (!empty($item['icono'])): ?><i class="<?php echo htmlspecialchars($item['icono'], ENT_QUOTES, 'UTF-8'); ?> me-1"></i><?php endif; ?> <?php echo htmlspecialchars($item['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-light text-primary fw-bold rounded-pill px-4 shadow-sm mt-2 mt-lg-0" href="<?php echo htmlspecialchars(project_url($headerCtaHref), ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlspecialchars($headerCtaTarget, ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($headerCtaTitle, ENT_QUOTES, 'UTF-8'); ?>">
                        <i class="bi bi-whatsapp"></i> <?php echo htmlspecialchars($headerCtaText, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>