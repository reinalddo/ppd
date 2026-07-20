<?php
/**
 * Datos del negocio. Todo lo que cambia por cliente vive aquí.
 * Fuente: docs/ (logo, listas de precios, capturas de horario/dirección
 * de Google Business) proporcionados por el cliente, 2026-07-20.
 */

define('BUSINESS_NAME', 'Aiveh Spa');
define('BUSINESS_CATEGORY', 'Salón de belleza · Belleza, cosmética y cuidado personal');

define('WHATSAPP_NUMBER', '584147381845');
define('WHATSAPP_DISPLAY', '+58 414-7381845');

define('BUSINESS_ADDRESS', 'Edificio Morca, Local 03, Barrio Obrero, San Cristóbal, Táchira');
// Se busca por nombre de negocio (no por la dirección de texto): el negocio
// ya tiene ficha de Google Business, y una búsqueda por dirección en este
// edificio hacía match con "Compu Morca", otro comercio del mismo edificio.
define('BUSINESS_MAPS_QUERY', 'Aiveh Spa, Barrio Obrero, San Cristóbal, Táchira');

// Horario inferido de la captura de Google Business (el resumen "abierto
// ahora" mostraba 09:00-19:00 y la lista visible partía en martes, por lo
// que se asume que ese resumen correspondía al lunes). Confirmar con el
// cliente antes de publicar si el negocio aprueba la compra.
define('BUSINESS_HOURS', [
    ['dia' => 'Lunes', 'horas' => '09:00 – 19:00'],
    ['dia' => 'Martes', 'horas' => '09:00 – 19:00'],
    ['dia' => 'Miércoles', 'horas' => '09:00 – 19:00'],
    ['dia' => 'Jueves', 'horas' => '09:00 – 18:00'],
    ['dia' => 'Viernes', 'horas' => '09:00 – 19:00'],
    ['dia' => 'Sábado', 'horas' => '09:00 – 18:00'],
    ['dia' => 'Domingo', 'horas' => 'Cerrado'],
]);

// Redes sociales: el cliente aún no tiene los enlaces — se muestran los
// íconos (para que se vea completo) pero sin href hasta que los pase.
define('SOCIAL_FACEBOOK', null);
define('SOCIAL_INSTAGRAM', null);

/**
 * Base de rutas: se calcula desde la carpeta real del script, así que los
 * enlaces funcionan igual en /demo/aivehspa/ que si esta carpeta se copia
 * a un proyecto individual en la raíz de otro dominio.
 */
define('BASE_PATH', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'));
