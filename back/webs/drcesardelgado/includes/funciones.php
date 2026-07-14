<?php
if (!function_exists('load_json_data')) {
	function load_json_data($relativePath, $default = []) {
		static $cache = [];

		$basePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'json';
		$normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($relativePath, '/\\'));
		$fullPath = $basePath . DIRECTORY_SEPARATOR . $normalizedPath;

		if (array_key_exists($fullPath, $cache)) {
			return $cache[$fullPath];
		}

		if (!is_file($fullPath)) {
			return $cache[$fullPath] = $default;
		}

		$contents = file_get_contents($fullPath);
		if ($contents === false) {
			return $cache[$fullPath] = $default;
		}

		$decoded = json_decode($contents, true);
		if (!is_array($decoded)) {
			return $cache[$fullPath] = $default;
		}

		return $cache[$fullPath] = $decoded;
	}
}

if (!function_exists('load_json_collection')) {
	function load_json_collection($relativeDir) {
		static $cache = [];

		$basePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'json';
		$normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, trim($relativeDir, '/\\'));
		$fullPath = $basePath . DIRECTORY_SEPARATOR . $normalizedPath;

		if (array_key_exists($fullPath, $cache)) {
			return $cache[$fullPath];
		}

		if (!is_dir($fullPath)) {
			return $cache[$fullPath] = [];
		}

		$items = [];
		$files = scandir($fullPath);
		if ($files === false) {
			return $cache[$fullPath] = [];
		}

		foreach ($files as $file) {
			if ($file === '.' || $file === '..') {
				continue;
			}

			$filePath = $fullPath . DIRECTORY_SEPARATOR . $file;
			if (!is_file($filePath) || strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) !== 'json') {
				continue;
			}

			$contents = file_get_contents($filePath);
			if ($contents === false) {
				continue;
			}

			$decoded = json_decode($contents, true);
			if (!is_array($decoded)) {
				continue;
			}

			$items[] = $decoded;
		}

		return $cache[$fullPath] = $items;
	}
}

if (!function_exists('app_base_url')) {
	function app_base_url() {
		static $baseUrl = null;

		if ($baseUrl !== null) {
			return $baseUrl;
		}

		$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
		$directory = str_replace('\\', '/', dirname($scriptName));

		if ($directory === '/' || $directory === '.' || $directory === '\\') {
			$directory = '';
		}

		$directory = rtrim($directory, '/');
		$baseUrl = $directory === '' ? '/' : $directory;

		return $baseUrl;
	}
}

if (!function_exists('project_url')) {
	function project_url($path = '') {
		$path = (string) $path;

		if ($path === '' || $path === './') {
			return app_base_url() === '/' ? '/' : app_base_url() . '/';
		}

		if (preg_match('/^(?:[a-z][a-z0-9+.-]*:|\/\/|#)/i', $path)) {
			return $path;
		}

		$baseUrl = app_base_url();
		$normalizedPath = ltrim($path, '/');

		if ($baseUrl === '/') {
			return '/' . $normalizedPath;
		}

		return $baseUrl . '/' . $normalizedPath;
	}
}

if (!function_exists('asset_url')) {
	function asset_url($path = '') {
		return project_url($path);
	}
}

if (!function_exists('resolve_link_href')) {
	function resolve_link_href($link, $fallback = '#') {
		if (is_string($link)) {
			return project_url($link);
		}

		if (!is_array($link)) {
			return $fallback;
		}

		if (($link['tipo'] ?? '') === 'whatsapp') {
			return wa_link($link['mensaje'] ?? '');
		}

		return project_url($link['href'] ?? $fallback);
	}
}

if (!function_exists('resolve_link_target')) {
	function resolve_link_target($link, $default = '_self') {
		if (!is_array($link)) {
			return $default;
		}

		if (($link['tipo'] ?? '') === 'whatsapp') {
			return $link['target'] ?? '_blank';
		}

		return $link['target'] ?? $default;
	}
}

$siteConfig = load_json_data('site/config.json', []);

$clinic_name = $siteConfig['nombre'] ?? 'Clinica Salud';
$clinic_tagline = $siteConfig['eslogan'] ?? 'Atencion integral con calidad humana';
$clinic_phone = $siteConfig['telefonoWhatsapp'] ?? '584241234567';
$clinic_phone_display = $siteConfig['telefonoPrincipal']['texto'] ?? '+58 424 123 4567';
$clinic_tel_display = $siteConfig['telefonoAlterno']['texto'] ?? '0276 345 6789';
$clinic_email_display = $siteConfig['correo']['texto'] ?? 'citas@clinicasalud.com';
$clinic_address = $siteConfig['direccion'] ?? 'Av. Principal de Pueblo Nuevo, Edif. Salud, Piso 2. San Cristobal, Tachira.';
$clinic_favicon = $siteConfig['favicon'] ?? 'https://cdn-icons-png.flaticon.com/512/2966/2966327.png';

if (!function_exists('wa_link')) {
	function wa_link($text = '') {
		global $clinic_phone;
		$base = 'https://wa.me/' . $clinic_phone;
		if ($text === '') {
			return $base;
		}

		return $base . '?text=' . rawurlencode($text);
	}
}
