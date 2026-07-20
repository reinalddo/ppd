<?php
/** Espera (opcional) $currentPage: 'inicio' | 'servicios' | 'contacto' */
$currentPage = $currentPage ?? 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($pageTitle) ? e($pageTitle) . ' | ' . BUSINESS_NAME : e(BUSINESS_NAME) ?></title>
<meta name="description" content="<?= e($pageDescription ?? BUSINESS_CATEGORY . '. ' . BUSINESS_ADDRESS) ?>">
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#F6EDE1">
<link rel="icon" type="image/webp" href="<?= asset('img/logo.webp') ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>
<body>

<a class="skip-link" href="#main">Saltar al contenido</a>

<header class="site-header" id="siteHeader">
  <div class="container site-header__inner">
    <a class="brand" href="<?= u('') ?>" aria-label="<?= e(BUSINESS_NAME) ?> — Inicio">
      <img class="brand__logo" src="<?= asset('img/logo.webp') ?>" alt="<?= e(BUSINESS_NAME) ?>" width="640" height="640">
    </a>

    <nav class="nav" id="siteNav">
      <ul class="nav__list">
        <li><a href="<?= u('') ?>" class="<?= $currentPage === 'inicio' ? 'is-active' : '' ?>">Inicio</a></li>
        <li><a href="<?= u('servicios') ?>" class="<?= $currentPage === 'servicios' ? 'is-active' : '' ?>">Servicios</a></li>
        <li><a href="<?= u('contacto') ?>" class="<?= $currentPage === 'contacto' ? 'is-active' : '' ?>">Contacto</a></li>
      </ul>
    </nav>

    <div class="site-header__actions">
      <a class="btn btn--whatsapp btn--sm" href="<?= whatsapp_link('Hola, quiero más información sobre sus servicios') ?>" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M16 3C9 3 3.2 8.7 3.2 15.7c0 2.5.7 4.8 1.9 6.8L3 29l6.7-2c1.9 1.1 4.1 1.6 6.3 1.6 7 0 12.8-5.7 12.8-12.7C28.8 8.7 23 3 16 3zm0 23.2c-2 0-3.9-.5-5.6-1.5l-.4-.2-4 1.1 1.1-3.9-.3-.4a10.4 10.4 0 0 1-1.7-5.6C5.1 9.8 10 5 16 5s10.9 4.8 10.9 10.7S22 26.2 16 26.2zm6-8c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.8 8.8 0 0 1-4.4-3.8c-.3-.5.3-.5.9-1.7.1-.2 0-.4 0-.5l-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.5s1.1 2.9 1.3 3.1c.2.2 2.2 3.4 5.4 4.7.7.3 1.3.5 1.8.7.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>
        <span>WhatsApp</span>
      </a>
      <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="siteNav" aria-label="Abrir menú de navegación">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<main id="main">
