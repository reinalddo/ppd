# Primer Paso Digital (PPD) — Sitio nuevo

Marca freelance de desarrollo web con sede en San Cristóbal, Táchira, Venezuela. Ofrece páginas web y tiendas virtuales para negocios en toda Venezuela. Este sitio se construye **desde cero** en la raíz de este repo (`PPDV2`). El sitio anterior vive respaldado en `/back` — no se toca, no se reutiliza como base.

## Stack y convenciones

- HTML5 + CSS3 + JavaScript vanilla. Sin framework, sin build step, sin dependencias de npm.
- Mobile-first: se escribe el CSS base para mobile y se amplía con `min-width` media queries.
- Sitio principal: una sola página (`index.html`) con scroll y anclas por sección.
- Demos: multipágina, 4 archivos HTML propios por demo (`index.html`, `quienes-somos.html`, `servicios.html`, `contacto.html`), sin compartir CSS/JS con el sitio principal ni entre demos (cada uno es una identidad visual aislada).
- Nombres de archivo y carpetas en minúsculas, sin espacios ni acentos (`quienes-somos.html`, no `quiénes-somos.html`).
- CSS: una variable `:root` por token de color/tipografía de cada sistema de diseño (ver abajo). Nada de colores/fuentes hardcodeados sueltos en reglas individuales.
- JS vanilla solo donde aporta (nav móvil, scroll spy, animaciones de entrada). Debe respetar `prefers-reduced-motion`.
- Todo el sitio debe quedar listo para subir a hosting estático tal cual (rutas relativas, sin variables de entorno).

## SEO

**Meta description (home):** "Creamos páginas web y tiendas virtuales para negocios en San Cristóbal y toda Venezuela. Diseño profesional, entrega rápida, precios accesibles. Cotiza por WhatsApp."

**Palabras clave principales** (usar en título, meta description, H1/H2 y cuerpo de la página principal):
páginas web San Cristóbal · diseño web Táchira · páginas web Venezuela · desarrollo web San Cristóbal Táchira · tienda virtual Venezuela

**Long-tail** (repartir en subtítulos y copy de secciones):
páginas web para negocios en San Cristóbal · diseño web económico Venezuela · tienda virtual para negocio pequeño Táchira · desarrollador web freelance Venezuela

Las demos (`/demos/`) no compiten por estas keywords — llevan `<meta name="robots" content="noindex">` porque son material de muestra, no páginas de negocio real.

## Flujo de imágenes (sin generación IA en este entorno)

No hay skill/MCP de generación de imágenes disponible. El usuario genera cada imagen manualmente en **Flow** a partir de prompts que yo entrego. Flujo por bloque de trabajo:

1. Carpetas de destino ya creadas (`assets/img/<sección>/`, `demos/<rubro>/img/`).
2. Por cada imagen entrego una tabla: ruta destino, nombre de archivo exacto, relación de aspecto, prompt sugerido (en la dirección estética del rubro/sección).
3. El usuario genera en Flow y coloca el archivo con el nombre/ruta exacto.
4. Hasta que el archivo real exista, el layout reserva el espacio (contenedor con el aspect-ratio correcto) — **nunca** placeholder genérico ni stock. Se sigue avanzando con otras partes mientras tanto.

**Reglas de contenido y formato de los prompts (corregido tras feedback, 2 rondas):**
- El contenido debe representar lo que se vende — **páginas web y tiendas virtuales para negocios**: laptops/tablets/teléfonos mostrando mockups de sitios web reales, interfaces, e-commerce, trabajo de diseño/desarrollo. Nada de paisajes, montañas ni metáfora de sendero — eso queda solo como elemento estructural hecho a mano (línea de scroll, tipografía), no como temática fotográfica.
- Estilo **realista/fotográfico** (fotografía de producto/lifestyle tech), no ilustración vectorial plana.
- Prompts siempre en **inglés** (Flow los procesa mejor).
- Flow no genera fondos transparentes → cada prompt debe pedir un **color de fondo sólido** que combine con la paleta correspondiente, nunca "transparent background".
- **Prompts extensos y muy específicos, nunca breves.** Pedir "abstract shapes/blocks" produce gráficos sin sentido — hay que describir el contenido real de la pantalla (fotos de productos concretos, botones con su función, badges de reseñas, mapas con pines, etc.) para que se vea una web de verdad, no un wireframe.
- **Usar personas reales con expresión y contexto de vida real** (dueño de negocio, cliente, veterinario, doctor, etc.), variando edad/género/escenario/dispositivo en cada imagen para que no se repitan entre sí (evitar "mano con celular" genérico repetido).
- Cada imagen debe comunicar su concepto sin ambigüedad a través de una escena/metáfora visual concreta (ej: visibilidad = aparecer primero en resultados de búsqueda; confianza = reseñas y badge verificado; disponibilidad = tienda física cerrada de noche pero el sitio web sigue "online"; alcance = pedido empacado + mapa con pines en varias ciudades).
- Texto en pantalla: permitir solo **etiquetas cortas (1-4 palabras)** tipo botón/headline/nombre — nunca párrafos — y decirlo explícito en el prompt para evitar texto largo distorsionado.
- Incluir siempre una nota anti-error: manos anatómicamente correctas, sin artefactos, alta resolución, estilo fotografía profesional (lente, profundidad de campo).

**Paso obligatorio de optimización (aprendido en producción, 2026-07-15):** Flow entrega PNG de ~2 MB c/u; servirlos así tumbó imágenes en producción (el CDN de Hostinger los recomprime al vuelo y bajo carga paralela devuelve HTTP 500 intermitentes — imágenes rotas al azar en cada recarga). Por eso **el HTML referencia siempre `.webp`, nunca `.png`**. Tras colocar un PNG nuevo de Flow, convertirlo con Pillow (`im.save(dst, "WEBP", quality=82, method=6)` — de ~2 MB baja a ~60-130 KB sin pérdida visible). El `og-image` es la excepción: va en **JPEG** (`og-image.jpg`, quality 85) por compatibilidad con crawlers de redes sociales. Los `.png` originales se conservan en el repo como fuente.

## Sistema de diseño — Sitio principal (PPD)

**Concepto:** "Sendero" — el nombre de la marca es literalmente *primer paso*. La identidad se apoya en la señalización de senderos de montaña andina (marcas de pintura en rocas/árboles que guían al caminante, curvas de nivel topográficas) como metáfora visual del recorrido digital de un negocio: cada sección del scroll es un tramo del camino, marcado con un waypoint.

- **Firma visual:** línea vertical de "sendero" (punteada) corre por el margen izquierdo (desktop) / arriba de cada sección (mobile), con un marcador tipo "hito" en cada sección; se dibuja progresivamente al hacer scroll (respeta `prefers-reduced-motion`: sin animación, línea estática). Fondo del hero con curvas de nivel topográficas sutiles en SVG.
- **Paleta:**
  | Token | Hex | Uso |
  |---|---|---|
  | `--ink` | `#16211D` | Texto, secciones oscuras |
  | `--niebla` | `#ECEEE7` | Fondo secciones claras |
  | `--sendero` | `#12544A` | Color de marca primario (teal profundo) |
  | `--marca` | `#F0A63A` | Acento (marca de sendero, ámbar) — CTAs, hitos, énfasis |
  | `--arcilla` | `#B5652D` | Acento secundario, uso puntual |
  | `--whatsapp` | `#25D366` | Solo para el botón/ícono de WhatsApp (color funcional reconocible, no decorativo) |
- **Tipografía:**
  - Display (titulares): **Bricolage Grotesque** — grotesca con carácter orgánico, uso en H1/H2 y números de hito.
  - Cuerpo: **Public Sans** — legible, cálida, buen soporte de acentos en español.
  - Utilitaria (micro-labels, coordenadas, footer): **Space Mono** — pequeñas etiquetas tipo "SAN CRISTÓBAL · TÁCHIRA" en el hero.
- **Layout:** secciones alternan fondo oscuro (`--ink`) y claro (`--niebla`) como tramos de día/tarde en el camino. Tarjetas de portafolio y demos con esquinas suaves (no tan redondeadas como veterinaria, no cuadradas como empresarial).

## Demos y portafolio (alcance actualizado)

La sección "Portafolio" del sitio principal fusiona portafolio + demos en una sola (el usuario las unió porque ambas muestran páginas hechas y disponibles a la venta). Composición:

- **Destacado:** TiendaVirtualShop (`tienda.tvirtualshop.com`) con marco de navegador.
- **Veterinaria:** único demo construido localmente en `/demos/veterinaria/` (ver abajo).
- **Videojuegos:** enlaza al sitio externo en producción `https://virtualgaming.tvirtualshop.com/` — NO se construye demo local.
- **Medicina:** 3 enlaces externos: `https://demo-salud-1.primerpasodigital.com/`, `https://demo-salud-2.primerpasodigital.com/`, `https://demo-salud-3.primerpasodigital.com/` — NO se construye demo local.
- **Empresarial:** 2 proyectos reales en producción: `https://globalinduprod.com/` y `https://globalinduprodinternational.com/` — NO se construye demo local.
- **Blogs:** tarjeta que ofrece blogs con artículos redactados **diariamente y de forma automática con IA** (sin dedicar tiempo a redacción — ese es el pitch). Enlaces: `https://tech.tvirtualshop.com/` y `https://blog.tvirtualshop.com/`. Miniatura: `assets/img/demos/demo-blogs.png` (4:3, pendiente de generar en Flow).

Las tarjetas soportan varios enlaces por rubro (`.demo-card__links`, lista vertical de link-arrows).

### Demo local: Veterinaria — "Veterinaria El Roble"
Consultorio veterinario de barrio, fresco y confiable.
- **Firma visual:** anillos de árbol (tree rings) como motivo de divisor de sección — ligado al nombre "El Roble". Formas de "blob" (SVG) suaves detrás de secciones.
- **Paleta (actualizada tras feedback — el usuario pidió menos pastel, más azul/blanco/verde):** `--musgo #16483B` (verde profundo, texto/dark) · `--tierra #1D6FB8` (azul médico, acento primario — el nombre de la variable se conservó del sistema original) · `--crema #F5FAF8` (blanco verdoso, fondo) · `--crema-alt #E6F2F7` (celeste claro, fondo alterno) · `--hoja #4E9C7F` (verde medio) · `--miel #5BC48E` (verde claro, acentos sobre oscuro). Hex hardcodeados en SVGs de los HTML: anillos `#1D6FB8`/`#2E9E6B`, blobs `#A9D3C4`/`#7FB8DD`.
- **Tipografía:** Display **Fraunces** (serif suave y orgánica) · Cuerpo **Karla** (redondeada, amigable).
- **Layout:** tarjetas muy redondeadas, blobs SVG de fondo, mapa de Google Maps embebido en Contacto (`.map-embed`, iframe con `output=embed`).

Los sistemas de diseño que se habían definido para videojuegos/medicina/empresarial ("Ping Alto Gaming", "Centro Médico San Rafael", "Meridiano & Asociados") quedaron descartados al reemplazarse por enlaces externos; si algún día se necesita un demo local de esos rubros, rediseñar desde cero con frontend-design.

## Estructura de carpetas

```
PPDV2/
├── CLAUDE.md
├── index.html
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
│       ├── marca/        (logo, favicon, og-image)
│       ├── hero/
│       ├── servicios/
│       ├── ventajas/
│       ├── portafolio/
│       └── demos/        (miniaturas de las 4 tarjetas de demos)
├── demos/
│   └── veterinaria/   (index.html, quienes-somos.html, servicios.html, contacto.html, css/, js/, img/)
│       (videojuegos, medicina y empresarial enlazan a sitios externos — no hay demos locales)
└── back/  (respaldo del sitio anterior — no tocar)
```
