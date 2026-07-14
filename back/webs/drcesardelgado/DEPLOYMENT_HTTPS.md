# Despliegue HTTPS para demo-salud-1.primerpasodigital.com

Resumen rápido
- El servidor debe tener un VirtualHost para `demo-salud-1.primerpasodigital.com` y un certificado TLS válido.
- Copia `.htaccess.prod` a `.htaccess` en producción (o adapta su contenido) para forzar HTTPS y habilitar las reglas de rewrite.

Pasos mínimos

1) DNS
- Asegúrate que `demo-salud-1.primerpasodigital.com` apunte por A record a la IP del servidor.

2) Preparar Apache (ej. Ubuntu/Debian)
- Instala módulos necesarios:

```bash
sudo a2enmod rewrite headers ssl
sudo systemctl restart apache2
```

- Asegúrate de que el `<Directory>` de tu `DocumentRoot` permite `AllowOverride All` para que `.htaccess` funcione.

Ejemplo de VirtualHost (HTTP -> redirige a HTTPS)

```apache
<VirtualHost *:80>
    ServerName demo-salud-1.primerpasodigital.com
    ServerAlias www.demo-salud-1.primerpasodigital.com
    DocumentRoot /var/www/demo-salud-1/public_html

    <Directory /var/www/demo-salud-1/public_html>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/demo-salud-1-error.log
    CustomLog ${APACHE_LOG_DIR}/demo-salud-1-access.log combined
</VirtualHost>
```

Ejemplo VirtualHost SSL (tras obtener certificados)

```apache
<IfModule mod_ssl.c>
<VirtualHost *:443>
    ServerName demo-salud-1.primerpasodigital.com
    ServerAlias www.demo-salud-1.primerpasodigital.com
    DocumentRoot /var/www/demo-salud-1/public_html

    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/demo-salud-1.primerpasodigital.com/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/demo-salud-1.primerpasodigital.com/privkey.pem
    Include /etc/letsencrypt/options-ssl-apache.conf

    <Directory /var/www/demo-salud-1/public_html>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/demo-salud-1-ssl-error.log
    CustomLog ${APACHE_LOG_DIR}/demo-salud-1-ssl-access.log combined
</VirtualHost>
</IfModule>
```

3) Obtener certificado (Let's Encrypt con certbot)

```bash
sudo apt update
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d demo-salud-1.primerpasodigital.com -d www.demo-salud-1.primerpasodigital.com
```

Esto configurará automáticamente los VirtualHosts SSL y renueva el certificado cada 90 días.

Si usas cPanel/DirectAdmin/otro hosting compartido: utiliza AutoSSL o el panel de certificados del proveedor.

4) Habilitar HSTS (opcional, cuidado)
- Una vez verificado que HTTPS funciona correctamente, puedes habilitar HSTS en `.htaccess` (descomenta la línea en `.htaccess.prod`). Ten en cuenta que HSTS causa que los navegadores forcen HTTPS para el dominio.

5) Pruebas
- HTTP (esperado redireccionamiento a HTTPS):
  `curl -I http://demo-salud-1.primerpasodigital.com`
- Comprobar redirección y certificado:
  `curl -I -L http://demo-salud-1.primerpasodigital.com`
  `curl -I https://demo-salud-1.primerpasodigital.com`
- Verificar cadena TLS:
  `openssl s_client -connect demo-salud-1.primerpasodigital.com:443 -servername demo-salud-1.primerpasodigital.com`

6) `.htaccess` y routing
- Nuestro proyecto usa `.htaccess` para:
  - ocultar `.php` en URLs (ej. `/nosotros` -> `nosotros.php`)
  - reenviar a `index.php` como fallback

- Copia `.htaccess.prod` a `.htaccess` en el DocumentRoot de producción después de verificar SSL.

Notas finales
- Asegúrate de que `includes/funciones.php` tenga los valores de producción correctos (`$clinic_phone`, `$clinic_phone_display`, etc.).
- Si tu servidor está detrás de un balanceador de carga que termina TLS, la condición `RewriteCond %{HTTP:X-Forwarded-Proto} !https` evita bucles.

Si quieres, hago:
- (A) un VirtualHost ejemplo ajustado a la ruta real del servidor si me das la ruta del DocumentRoot, o
- (B) te guío paso a paso en el servidor remoto (ssh) para obtener e instalar el certificado.
