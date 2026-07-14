<?php
$footerConfig = load_json_data('footer/config.json', []);

$footerBrand = $footerConfig['marca'] ?? [];
$footerLinks = $footerConfig['enlaces'] ?? [];
$footerSocial = $footerConfig['social'] ?? [];
$footerSchedule = $footerConfig['horario'] ?? [];
$footerCopyright = $footerConfig['copyright'] ?? 'Todos los derechos reservados.';

$footerBrandName = $footerBrand['nombre'] ?? $clinic_name;
$footerBrandDescription = $footerBrand['descripcion'] ?? $clinic_tagline;
$footerBrandHref = $footerBrand['href'] ?? 'index';
$siteConfig = load_json_data('site/config.json', []);
$footerPrimaryPhone = $siteConfig['telefonoPrincipal'] ?? ['texto' => $clinic_phone_display, 'href' => 'tel:+' . $clinic_phone, 'title' => 'Llamar'];
$footerSecondaryPhone = $siteConfig['telefonoAlterno'] ?? ['texto' => $clinic_tel_display, 'href' => '#', 'title' => 'Numero alterno'];
$footerLocations = $siteConfig['sedes'] ?? [];
$footerPhones = $siteConfig['telefonos'] ?? [];
$footerEmails = $siteConfig['correos'] ?? [];
?>

<footer class="bg-dark text-light py-5" style="background-color: var(--footer-bg) !important; color: var(--footer-text) !important;">
	<div class="container">
		<div class="row">
            <div class="col-md-4 mb-4">
                <a class="navbar-brand fw-bold text-decoration-none text-light" href="<?php echo htmlspecialchars(project_url($footerBrandHref), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($footerBrandName, ENT_QUOTES, 'UTF-8'); ?></a>
                <p class="mt-3 mb-2"><?php echo htmlspecialchars($footerBrandDescription, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php if (!empty($footerLocations)): ?>
                    <h5 class="mt-4 mb-3">Sedes de Consulta</h5>
                    <ul class="list-unstyled mb-0 small">
                        <?php foreach ($footerLocations as $location): ?>
                            <li class="mb-2">
                                <strong><?php echo htmlspecialchars($location['ciudad'] ?? '', ENT_QUOTES, 'UTF-8'); ?>:</strong>
                                <?php echo htmlspecialchars($location['lugar'] ?? '', ENT_QUOTES, 'UTF-8'); ?><?php echo !empty($location['detalle']) ? ', ' . htmlspecialchars($location['detalle'], ENT_QUOTES, 'UTF-8') : ''; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="mb-1"><?php echo htmlspecialchars($clinic_address, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="mb-1">Tel: <a href="<?php echo htmlspecialchars(project_url($footerPrimaryPhone['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($footerPrimaryPhone['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($footerPrimaryPhone['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
                    <p class="mb-0">Tel: <a href="<?php echo htmlspecialchars(project_url($footerSecondaryPhone['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($footerSecondaryPhone['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($footerSecondaryPhone['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
                <?php endif; ?>
            </div>

			<div class="col-md-4 mb-4">
				<h5>Enlaces Rápidos</h5>
				<ul class="list-unstyled">
                    <?php foreach ($footerLinks as $link): ?>
                        <li><a href="<?php echo htmlspecialchars(project_url($link['href'] ?? 'index'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($link['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($link['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
				</ul>
			</div>

			<div class="col-md-4 mb-4">
				<h5>Contacto</h5>
                <?php if (!empty($footerPhones)): ?>
                    <p class="mb-2"><strong>Teléfonos:</strong></p>
                    <ul class="list-unstyled small mb-3">
                        <?php foreach ($footerPhones as $phone): ?>
                            <li class="mb-1">
                                <a href="<?php echo htmlspecialchars(project_url($phone['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($phone['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars(($phone['sede'] ?? '') . ' - ' . ($phone['texto'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="mb-1">Tel: <a href="<?php echo htmlspecialchars(project_url($footerPrimaryPhone['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($footerPrimaryPhone['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($footerPrimaryPhone['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
                    <p class="mb-3">Tel: <a href="<?php echo htmlspecialchars(project_url($footerSecondaryPhone['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($footerSecondaryPhone['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($footerSecondaryPhone['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
                <?php endif; ?>

                <?php if (!empty($footerEmails)): ?>
                    <p class="mb-2"><strong>Correos:</strong></p>
                    <ul class="list-unstyled small mb-3">
                        <?php foreach ($footerEmails as $email): ?>
                            <li class="mb-1">
                                <a href="<?php echo htmlspecialchars(project_url($email['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-light" title="<?php echo htmlspecialchars($email['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($email['texto'] ?? '', ENT_QUOTES, 'UTF-8'); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($footerSocial)): ?>
                    <p class="mb-2"><strong>Redes:</strong></p>
                    <p>
                        <?php foreach ($footerSocial as $social): ?>
                            <a href="<?php echo htmlspecialchars(project_url($social['href'] ?? '#'), ENT_QUOTES, 'UTF-8'); ?>" class="text-light me-3" aria-label="<?php echo htmlspecialchars($social['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($social['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                <i class="bi bi-<?php echo htmlspecialchars($social['red'] ?? '', ENT_QUOTES, 'UTF-8'); ?> fs-5"></i>
                            </a>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($footerSchedule)): ?>
                    <p class="mb-0"><strong>Horario:</strong><br><?php echo htmlspecialchars(implode(' | ', $footerSchedule), ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>
			</div>
		</div>

		<div class="border-top border-secondary mt-4 pt-3 text-center">
            <small class="d-block">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($footerBrandName, ENT_QUOTES, 'UTF-8'); ?>. <?php echo htmlspecialchars($footerCopyright, ENT_QUOTES, 'UTF-8'); ?></small>
		</div>
	</div>
</footer>

<!-- Bootstrap 5 Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Selecciona enlaces que inician con #
    var links = document.querySelectorAll('a[href^="#"]');
    
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener("click", function(e) {
            var targetId = this.getAttribute("href");
            
            // 1. Si es un enlace vacío (#), evitamos que salte arriba
            if (targetId === "#") {
                e.preventDefault();
                return;
            }

            var targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault(); // Detenemos el salto automático
                
                // 2. Configuración de la animación manual
                var targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                var startPosition = window.pageYOffset;
                var headerOffset = 70; // Espacio para el menú fijo
                var distance = targetPosition - startPosition - headerOffset;
                var duration = 800; // Duración en milisegundos (0.8 segundos)
                var startTime = null;

                // 3. Función matemática de suavizado (Ease In-Out)
                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    var timeElapsed = currentTime - startTime;
                    
                    // Calcula cuánto mover en este cuadro
                    var run = ease(timeElapsed, startPosition, distance, duration);
                    
                    window.scrollTo(0, run);

                    if (timeElapsed < duration) requestAnimationFrame(animation);
                }

                // Fórmula de aceleración para que se sienta natural
                function ease(t, b, c, d) {
                    t /= d / 2;
                    if (t < 1) return c / 2 * t * t + b;
                    t--;
                    return -c / 2 * (t * (t - 2) - 1) + b;
                }

                requestAnimationFrame(animation);
            }
        });
    }
});
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // Duración de la animación en milisegundos
    once: true // Que se anime solo la primera vez que bajas
  });
</script>


<script>
    // Script para cambiar color del menú al bajar
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>


