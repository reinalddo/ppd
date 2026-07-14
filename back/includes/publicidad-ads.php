<?php
$isEmbedded = defined('PPD_PUBLICIDAD_ADS_EMBED');

$escape = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$plans = [
    [
        'title' => 'Plan Inicial',
        'subtitle' => 'Esencial para comenzar',
        'featured' => false,
        'organic_price' => '$50',
        'organic_features' => [
            '<span class="highlight">4 Reels (Max 30 seg)</span> / Historias',
            '<span class="highlight">4 Posts de Imagen</span> (1 semanal)',
            'Gestión de Facebook e Instagram',
        ],
        'ads_price' => '$90',
        'ads_badge' => 'PUBLICIDAD 2 DÍAS/SEMANA',
        'ads_features' => [
            '<span class="highlight">Todo lo anterior</span> incluido',
            'Campaña para <span class="highlight">atraer clientes</span>',
            'Opción de <span class="highlight">Imagen o Video</span> (30 seg)',
        ],
        'whatsapp_url' => 'https://wa.me/584247238716?text=Hola!%20Deseo%20contratar%20el%20Plan%20Inicial',
    ],
    [
        'title' => 'Plan Intermedio',
        'subtitle' => 'Mayor frecuencia y alcance',
        'featured' => true,
        'organic_price' => '$95',
        'organic_features' => [
            '<span class="highlight">8 Reels (Max 30 seg)</span> / Historias',
            '<span class="highlight">8 Posts Informativos</span> (2 semanales)',
            'Gestión de Facebook e Instagram',
        ],
        'ads_price' => '$195',
        'ads_badge' => 'PUBLICIDAD 4 DÍAS/SEMANA',
        'ads_features' => [
            '<span class="highlight">Todo lo anterior</span> incluido',
            'Campaña para <span class="highlight">atraer clientes</span>',
            'Opción de <span class="highlight">Imagen o Video</span> (30 seg)',
        ],
        'whatsapp_url' => 'https://wa.me/584247238716?text=Hola!%20Me%20interesa%20el%20Plan%20Intermedio',
    ],
    [
        'title' => 'Plan Avanzado',
        'subtitle' => 'Liderazgo total de mercado',
        'featured' => false,
        'organic_price' => '$150',
        'organic_features' => [
            '<span class="highlight">16 Reels (Max 30 seg)</span> / Historias',
            '<span class="highlight">16 Posts Informativos</span> (4 semanales)',
            'Gestión de Facebook e Instagram',
        ],
        'ads_price' => '$300',
        'ads_badge' => 'PUBLICIDAD TODOS LOS DÍAS',
        'ads_features' => [
            '<span class="highlight">Todo lo anterior</span> incluido',
            'Campaña para <span class="highlight">atraer clientes</span>',
            'Opción de <span class="highlight">Imagen o Video</span> (30 seg)',
        ],
        'whatsapp_url' => 'https://wa.me/584247238716?text=Hola!%20Quiero%20contratar%20el%20Plan%20Avanzado',
    ],
];

$demoUrl = 'https://tienda.tvirtualshop.com/';

$renderStandaloneCard = static function (array $plan) use ($escape, $demoUrl): void {
    ?>
    <div class="card<?php echo $plan['featured'] ? ' featured' : ''; ?>">
        <div class="card-header"<?php echo $plan['featured'] ? ' style="background: #eef2ff;"' : ''; ?>>
            <span class="plan-title"><?php echo $escape($plan['title']); ?></span>
            <p class="desc-text-header"><?php echo $escape($plan['subtitle']); ?></p>
        </div>
        <div class="plan-option organic-section">
            <div class="option-header">
                <span style="font-size: 0.8rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Opción Orgánica</span>
                <span class="price"><?php echo $escape($plan['organic_price']); ?><small>/mes</small></span>
            </div>
            <ul class="features-list">
                <?php foreach ($plan['organic_features'] as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="plan-option ads-section">
            <div class="option-header">
                <div style="display: flex; flex-direction: column;">
                    <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary); text-transform: uppercase;">Opción Full Ads</span>
                    <span class="ads-badge"><?php echo $escape($plan['ads_badge']); ?></span>
                </div>
                <span class="price"><?php echo $escape($plan['ads_price']); ?><small>/mes</small></span>
            </div>
            <ul class="features-list">
                <?php foreach ($plan['ads_features'] as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="store-gift-footer">
            🎁 REGALO: TIENDA VIRTUAL <br>
            <a href="<?php echo $escape($demoUrl); ?>" target="_blank" rel="noopener">Ver Demo aquí</a>
        </div>
        <a href="<?php echo $escape($plan['whatsapp_url']); ?>" class="btn-whatsapp" target="_blank" rel="noopener">Consultar por WhatsApp</a>
    </div>
    <?php
};

$renderEmbeddedCard = static function (array $plan) use ($escape, $demoUrl): void {
    ?>
    <article class="ppd-publicidad-ads__card<?php echo $plan['featured'] ? ' ppd-publicidad-ads__card--featured' : ''; ?>">
        <div class="ppd-publicidad-ads__card-header"<?php echo $plan['featured'] ? ' style="background: #eef2ff;"' : ''; ?>>
            <span class="ppd-publicidad-ads__plan-title"><?php echo $escape($plan['title']); ?></span>
            <p class="ppd-publicidad-ads__plan-subtitle"><?php echo $escape($plan['subtitle']); ?></p>
        </div>
        <div class="ppd-publicidad-ads__option ppd-publicidad-ads__option--organic">
            <div class="ppd-publicidad-ads__option-header">
                <span class="ppd-publicidad-ads__option-label">Opción Orgánica</span>
                <span class="ppd-publicidad-ads__price"><?php echo $escape($plan['organic_price']); ?><small>/mes</small></span>
            </div>
            <ul class="ppd-publicidad-ads__features">
                <?php foreach ($plan['organic_features'] as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="ppd-publicidad-ads__option ppd-publicidad-ads__option--ads">
            <div class="ppd-publicidad-ads__option-header">
                <div class="ppd-publicidad-ads__option-stack">
                    <span class="ppd-publicidad-ads__option-label ppd-publicidad-ads__option-label--accent">Opción Full Ads</span>
                    <span class="ppd-publicidad-ads__badge"><?php echo $escape($plan['ads_badge']); ?></span>
                </div>
                <span class="ppd-publicidad-ads__price"><?php echo $escape($plan['ads_price']); ?><small>/mes</small></span>
            </div>
            <ul class="ppd-publicidad-ads__features">
                <?php foreach ($plan['ads_features'] as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="ppd-publicidad-ads__gift-footer">
            🎁 REGALO: TIENDA VIRTUAL <br>
            <a href="<?php echo $escape($demoUrl); ?>" target="_blank" rel="noopener">Ver Demo aquí</a>
        </div>
        <a href="<?php echo $escape($plan['whatsapp_url']); ?>" class="ppd-publicidad-ads__whatsapp" target="_blank" rel="noopener">Consultar por WhatsApp</a>
    </article>
    <?php
};

if (!$isEmbedded):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicidad para tu Negocio en Redes Sociales - TVirtualShop</title>
    <link rel="icon" type="image/jpeg" href="../logos/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --success: #25d366;
            --warning: #f59e0b;
            --dark: #0f172a;
            --light: #f8fafc;
            --white: #ffffff;
            --gray-bg: #f1f5f9;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
        }

        .main-title {
            font-size: clamp(1.8rem, 5vw, 2.8rem);
            font-weight: 800;
            color: var(--primary);
            margin: 0;
            text-transform: uppercase;
        }

        .promo-banner {
            background: var(--warning);
            color: var(--dark);
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 700;
            display: inline-block;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .intro-text {
            max-width: 800px;
            margin: 0 auto 20px auto;
            color: #475569;
            font-size: 1.1rem;
        }

        .security-note {
            background: #fef2f2;
            color: #dc2626;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 700;
            display: inline-block;
            border: 2px solid #fecaca;
            margin-bottom: 30px;
        }

        .cards-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            align-items: stretch;
        }

        .card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            border: 1px solid #e2e8f0;
            width: 100%;
            max-width: 370px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .card-header {
            padding: 25px 20px;
            text-align: center;
            background: var(--gray-bg);
            border-bottom: 1px solid #e2e8f0;
            border-radius: 24px 24px 0 0;
        }

        .plan-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
        }

        .desc-text-header { font-size: 0.8rem; color: #64748b; margin: 5px 0 0; }

        .plan-option {
            padding: 25px;
            width: 100%;
        }

        .organic-section { background-color: var(--white); }
        .ads-section { background: #eff6ff; border-top: 1px solid #dbeafe; border-bottom: 1px solid #dbeafe; }

        .option-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            white-space: nowrap;
        }

        .price small { font-size: 0.9rem; color: #94a3b8; font-weight: 400; }

        .ads-badge {
            background: #10b981;
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            margin-top: 5px;
            display: inline-block;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
            color: #475569;
        }

        .features-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 8px;
        }

        .features-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: 900;
        }

        .highlight { font-weight: 600; color: var(--dark); }

        .store-gift-footer {
            background: var(--dark);
            color: white;
            padding: 20px;
            text-align: center;
            font-weight: 600;
            font-size: 0.95rem;
            margin-top: auto;
        }

        .store-gift-footer a { color: var(--warning); text-decoration: underline; }

        .btn-whatsapp {
            display: block;
            margin: 20px 25px 30px;
            background: var(--success);
            color: white;
            text-align: center;
            padding: 16px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn-whatsapp:hover { background: #1faf54; }

        .featured { border: 2.5px solid var(--primary); }

        @media (max-width: 768px) {
            .card { max-width: 100%; }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1 class="main-title">Publicidad para tu negocio en redes sociales</h1>
        <div class="promo-banner">🎁 ¡TODOS NUESTROS PLANES INCLUYEN UNA TIENDA VIRTUAL DE REGALO!</div>
        <p class="intro-text">
            Hoy en día, un negocio que no está en redes sociales es invisible. Estar presente te permite conectar con miles de clientes potenciales, construir confianza y vender 24/7.
        </p>
        <div class="security-note">🔒 IMPORTANTE: NO SE REQUIEREN CLAVES DE ACCESO DE SUS REDES SOCIALES</div>
    </header>

    <div class="cards-wrapper">
        <?php foreach ($plans as $plan): ?>
            <?php $renderStandaloneCard($plan); ?>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
<?php
return;
endif;
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    .ppd-publicidad-ads {
        margin-top: 2.5rem;
        scroll-margin-top: 7rem;
    }

    .ppd-publicidad-ads,
    .ppd-publicidad-ads * {
        box-sizing: border-box;
    }

    .ppd-publicidad-ads {
        font-family: 'Poppins', sans-serif;
        background-color: #f8fafc;
        color: #0f172a;
        border-radius: 32px;
    }

    .ppd-publicidad-ads__container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .ppd-publicidad-ads__header {
        text-align: center;
        margin-bottom: 50px;
    }

    .ppd-publicidad-ads__title {
        font-size: clamp(1.8rem, 5vw, 2.8rem);
        font-weight: 800;
        color: #2563eb;
        margin: 0;
        text-transform: uppercase;
        line-height: 1.1;
    }

    .ppd-publicidad-ads__banner {
        background: #f59e0b;
        color: #0f172a;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        display: inline-block;
        margin: 20px 0;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .ppd-publicidad-ads__intro {
        max-width: 800px;
        margin: 0 auto 20px;
        color: #475569;
        font-size: 1.1rem;
    }

    .ppd-publicidad-ads__note {
        background: #fef2f2;
        color: #dc2626;
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: 700;
        display: inline-block;
        border: 2px solid #fecaca;
    }

    .ppd-publicidad-ads__cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        align-items: stretch;
    }

    .ppd-publicidad-ads__card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        border: 1px solid #e2e8f0;
        width: 100%;
        max-width: 370px;
        position: relative;
        overflow: hidden;
    }

    .ppd-publicidad-ads__card--featured {
        border: 2.5px solid #2563eb;
    }

    .ppd-publicidad-ads__card-header {
        padding: 25px 20px;
        text-align: center;
        background: #f1f5f9;
        border-bottom: 1px solid #e2e8f0;
    }

    .ppd-publicidad-ads__plan-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2563eb;
        text-transform: uppercase;
    }

    .ppd-publicidad-ads__plan-subtitle {
        font-size: 0.8rem;
        color: #64748b;
        margin: 5px 0 0;
    }

    .ppd-publicidad-ads__option {
        padding: 25px;
        width: 100%;
    }

    .ppd-publicidad-ads__option--ads {
        background: #eff6ff;
        border-top: 1px solid #dbeafe;
        border-bottom: 1px solid #dbeafe;
    }

    .ppd-publicidad-ads__option-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 15px;
    }

    .ppd-publicidad-ads__option-stack {
        display: flex;
        flex-direction: column;
    }

    .ppd-publicidad-ads__option-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
    }

    .ppd-publicidad-ads__option-label--accent {
        color: #2563eb;
    }

    .ppd-publicidad-ads__price {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0f172a;
        white-space: nowrap;
    }

    .ppd-publicidad-ads__price small {
        font-size: 0.9rem;
        color: #94a3b8;
        font-weight: 400;
    }

    .ppd-publicidad-ads__badge {
        background: #10b981;
        color: #ffffff;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-top: 5px;
        display: inline-block;
    }

    .ppd-publicidad-ads__features {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.9rem;
        color: #475569;
    }

    .ppd-publicidad-ads__features li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 8px;
    }

    .ppd-publicidad-ads__features li::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #2563eb;
        font-weight: 900;
    }

    .ppd-publicidad-ads__features .highlight {
        font-weight: 600;
        color: #0f172a;
    }

    .ppd-publicidad-ads__gift-footer {
        background: #0f172a;
        color: #ffffff;
        padding: 20px;
        text-align: center;
        font-weight: 600;
        font-size: 0.95rem;
        margin-top: auto;
    }

    .ppd-publicidad-ads__gift-footer a {
        color: #f59e0b;
        text-decoration: underline;
    }

    .ppd-publicidad-ads__whatsapp {
        display: block;
        margin: 20px 25px 30px;
        background: #25d366;
        color: #ffffff;
        text-align: center;
        padding: 16px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        transition: background 0.3s ease;
    }

    .ppd-publicidad-ads__whatsapp:hover,
    .ppd-publicidad-ads__whatsapp:focus-visible {
        background: #1faf54;
    }

    @media (max-width: 768px) {
        .ppd-publicidad-ads__card {
            max-width: 100%;
        }

        .ppd-publicidad-ads__note {
            display: block;
        }

        .ppd-publicidad-ads__option-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<section id="gestion-redes-ads" class="ppd-publicidad-ads reveal" aria-labelledby="gestion-redes-ads-title">
    <div class="ppd-publicidad-ads__container">
        <div class="ppd-publicidad-ads__header">
            <h2 id="gestion-redes-ads-title" class="ppd-publicidad-ads__title">Publicidad para tu negocio en redes sociales</h2>
            <div class="ppd-publicidad-ads__banner">🎁 ¡TODOS NUESTROS PLANES INCLUYEN UNA TIENDA VIRTUAL DE REGALO!</div>
            <p class="ppd-publicidad-ads__intro">Hoy en día, un negocio que no está en redes sociales es invisible. Estar presente te permite conectar con miles de clientes potenciales, construir confianza y vender 24/7.</p>
            <div class="ppd-publicidad-ads__note">🔒 IMPORTANTE: NO SE REQUIEREN CLAVES DE ACCESO DE SUS REDES SOCIALES</div>
        </div>

        <div class="ppd-publicidad-ads__cards" aria-label="Planes de gestión de redes sociales y ADS">
            <?php foreach ($plans as $plan): ?>
                <?php $renderEmbeddedCard($plan); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
