(function (global) {
    if (!global) {
        return;
    }

    const baseKeywords = 'diseño web, tienda virtual, landing pages, primer paso digital, seo administrado, web administrada';
    const defaultImage = 'logos/logo.jpg';

    const config = {
        index: {
            title: 'Primer Paso Digital | Contrata tu presencia en Internet',
            metaDescription: 'Resumen de servicios digitales: páginas web y tiendas virtuales que despiertan curiosidad y llevan al cliente directo a WhatsApp.',
            keywords: baseKeywords,
            ogImage: defaultImage
        },
        servicios: {
            title: 'Servicios y Planes | Primer Paso Digital',
            metaDescription: 'Detalle de servicios administrados y planes con precios claros para lanzar tu página web o tienda virtual lista para convertir.',
            keywords: `${baseKeywords}, servicios administrados, planes web`,
            ogImage: defaultImage
        },
        ventajas: {
            title: 'Ventajas | Primer Paso Digital',
            metaDescription: 'Ventajas de invertir en tu página: curiosidad inmediata, recorrido guiado, CTA insistente y SEO base listo desde el día uno.',
            keywords: `${baseKeywords}, ventajas competitivas, argumentos comerciales`,
            ogImage: defaultImage
        },
        planes: {
            title: 'Planes y Precios | Primer Paso Digital',
            metaDescription: 'Planes Esencial, Conversión y Full Tienda: sitios y tiendas administradas listas para publicar y enlazadas a WhatsApp.',
            keywords: `${baseKeywords}, planes y precios, tienda virtual administrada`,
            ogImage: defaultImage
        },
        contacto: {
            title: 'Contacto | Primer Paso Digital | Contacta con nosotros',
            metaDescription: 'Formulario y medios de contacto para escribirnos por correo, WhatsApp o agendar una reunión rápida con nuestro equipo.',
            keywords: `${baseKeywords}, contacto, soporte web`,
            ogImage: defaultImage
        }
    };

    global.Web2AgentConfig = config;
})(typeof window !== 'undefined' ? window : null);
