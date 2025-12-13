<div class="wrapper single-section">
    <section id="contacto" class="section reveal" aria-labelledby="contacto-title">
        <p class="eyebrow">Contacto</p>
        <h2 id="contacto-title">Tienes el WhatsApp y el inbox abiertos.</h2>
        <p class="lead">Dime qué necesitas y te respondo en menos de 24 horas. Puedes escribir, llamar o agendar una reunión express.</p>

        <div class="contact-grid">
            <form action="https://api.tvirtualshop.com/enviar-formulario.php" method="POST" class="contact-form">
                <input type="hidden" name="enviar_a_email" value="contacto@primerpasodigital.com">
                <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars(($siteBaseUrl ?? '') . '/gracias.php', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="asunto_correo" value="Nuevo Lead - Web PPD">
                <input type="hidden" name="web_nombre" value="Primer Paso Digital Notificaciones">
                <label>
                    <span>Nombre y empresa</span>
                    <input type="text" name="nombre" placeholder="Ej. Ana · Kinevo" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" placeholder="Tu correo electrónico" required>
                </label>
                <label>
                    <span>WhatsApp</span>
                    <input type="tel" name="whatsapp" placeholder="Ej. +58 424 723 87 16">
                </label>
                <label>
                    <span>¿Qué necesitas?</span>
                    <textarea name="mensaje" rows="4" placeholder="Quiero una tienda que motive a mis clientes a escribir"></textarea>
                </label>
                <button class="cta" type="submit">Enviar mensaje</button>
            </form>
            <div class="contact-methods">
                <article class="contact-method">
                    <p class="badge">WhatsApp</p>
                    <h3>Chat directo</h3>
                    <p>Respondo rápido para entender tu proyecto y compartirte los siguientes pasos.</p>
                    <a class="whatsapp-link" href="https://wa.me/584247238716?text=Hola%20PPD%2C%20quiero%20hablar%20de%20mi%20sitio" target="_blank" rel="noopener">Abrir WhatsApp</a>
                </article>
                <article class="contact-method">
                    <p class="badge">Email</p>
                    <h3>contacto@primerpasodigital.com</h3>
                    <p>Si prefieres detallar tus requerimientos por correo, responde con toda la información posible.</p>
                    <a class="link-arrow" href="mailto:contacto@primerpasodigital.com">Escríbeme</a>
                </article>
                <article class="contact-method" style="display: none;">
                    <p class="badge">Llamada express</p>
                    <h3>Agenda 15 minutos</h3>
                    <p>Elige un horario rápido y resolvemos dudas por videollamada.</p>
                    <a class="link-arrow" href="https://cal.com/primerpasodigital/15min" target="_blank" rel="noopener">Agendar ahora</a>
                </article>
            </div>
        </div>
    </section>
</div>

