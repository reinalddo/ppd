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

## Sistemas de diseño — Demos por rubro

Cada demo es un negocio ficticio pero creíble, con identidad visual propia. No comparten paleta, tipografía ni componentes entre sí ni con el sitio principal.

### 1. Veterinaria — "Veterinaria El Roble"
Consultorio veterinario de barrio, cálido y confiable.
- **Firma visual:** anillos de árbol (tree rings) como motivo de divisor de sección — ligado al nombre "El Roble" y a la idea de años de confianza/crecimiento. Ilustraciones de línea suave de mascotas entre hojas, no fotos.
- **Paleta:** `--musgo #3E4A34` (texto/dark) · `--tierra #B5652D` (acento cálido) · `--crema #F6EFE1` (fondo) · `--hoja #8A9B6E` (secundario) · `--miel #D9A441` (CTA)
- **Tipografía:** Display **Fraunces** (serif suave y orgánica) · Cuerpo **Karla** (redondeada, amigable) · misma familia en versalitas para tags.
- **Layout:** tarjetas muy redondeadas, formas de "blob" (SVG) detrás de secciones, imágenes recortadas en circular tipo medallón.

### 2. Videojuegos — "Ping Alto Gaming"
Café gaming / arena de esports en San Cristóbal — el nombre es un guiño al chiste típico latinoamericano sobre el mal ping a servidores internacionales.
- **Firma visual:** marquesina de gabinete arcade enmarcando el hero, overlay de scanlines CRT sutil, glitch cromático solo en hover (no ambiental/constante), microcopy tipo "INSERT COIN" en vez de "Empezar".
- **Paleta:** `--void #0B0E14` (fondo) · `--panel #151B26` (paneles) · `--crt-cyan #2FF6E1` · `--crt-magenta #FF3D8A` · `--arcade-yellow #FFD23F`
- **Tipografía:** Display **Chakra Petch** (titulares) · Acentos/badges **Press Start 2P** (solo textos muy cortos, ilegible en párrafos) · Cuerpo **Space Grotesk** · Datos/precios en **JetBrains Mono** (estilo marcador de puntaje).
- **Layout:** grid tipo panel de arcade, bordes con esquinas cortadas (clip-path), nada de bordes redondeados.

### 3. Medicina — "Centro Médico San Rafael"
Clínica ambulatoria, transmite confianza y precisión clínica.
- **Firma visual:** línea de pulso (EKG) que "aplana" en una regla horizontal como divisor de sección — sutil, no decorativo de sobra. Iconografía médica en línea simple (una sola línea, sin relleno de color), fondo tipo papel de gráfico/ficha clínica muy sutil.
- **Paleta:** `--clinico #14456B` (texto/marca) · `--cielo #E8F1F6` (fondo) · `--blanco #FFFFFF` · `--menta #3FA796` (acento salud) · `--grafito #2B333A` (texto secundario)
- **Tipografía:** Display **Newsreader** (serif restrained, transmite trayectoria/confianza) · Cuerpo **IBM Plex Sans** · Datos (horarios, cifras) **IBM Plex Mono**.
- **Layout:** mucho espacio en blanco, grid preciso, tarjetas con borde de 1px, sin sombras pesadas.

### 4. Empresarial — "Meridiano & Asociados"
Consultora corporativa seria, editorial, minimalista.
- **Firma visual:** wordmark vertical rotado corriendo por el margen (como el lomo de un informe anual), folios (números de página) grandes estilo reporte, una sola franja/acento rojo editorial usada con extrema moderación (una regla, una palabra por página) — no hairlines por todos lados tipo periódico genérico.
- **Paleta:** `--negro #111111` · `--hueso #F7F5F0` (fondo) · `--gris #6B6B6B` · `--acento #A6192E` (rojo editorial, uso puntual)
- **Tipografía:** Display **Archivo** (grotesca, peso alto, expandida) · Cuerpo **Source Serif 4** (serif editorial — inversión deliberada: titulares en sans, cuerpo en serif, para diferenciarse de Medicina) · Utilitaria **IBM Plex Mono** (folios, notas al pie).
- **Layout:** grid asimétrico, márgenes generosos, sin esquinas redondeadas, jerarquía tipográfica marcada en vez de color.

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
│   ├── veterinaria/   (index.html, quienes-somos.html, servicios.html, contacto.html, img/)
│   ├── videojuegos/   (ídem, img/)
│   ├── medicina/      (ídem, img/)
│   └── empresarial/   (ídem, img/)
└── back/  (respaldo del sitio anterior — no tocar)
```
