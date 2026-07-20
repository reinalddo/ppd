<?php
require_once __DIR__ . '/config.php';

/** URL amigable dentro del sitio, ej. u('servicios') -> /demo/aivehspa/servicios */
function u(string $path = ''): string {
    $path = ltrim($path, '/');
    return BASE_PATH . '/' . $path;
}

/** Ruta a un asset (css/js/img), respeta la carpeta real del proyecto. */
function asset(string $path): string {
    return u('assets/' . ltrim($path, '/'));
}

/** Link de WhatsApp con mensaje prellenado y codificado. */
function whatsapp_link(string $message = ''): string {
    $url = 'https://wa.me/' . WHATSAPP_NUMBER;
    if ($message !== '') {
        $url .= '?text=' . rawurlencode($message);
    }
    return $url;
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
