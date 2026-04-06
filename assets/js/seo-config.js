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
        contacto: {
            title: 'Contacto | Primer Paso Digital | Contacta con nosotros',
            metaDescription: 'Formulario y medios de contacto para escribirnos por correo, WhatsApp o agendar una reunión rápida con nuestro equipo.',
            keywords: `${baseKeywords}, contacto, soporte web`,
            ogImage: defaultImage
        }
    };

    global.Web2AgentConfig = config;
})(typeof window !== 'undefined' ? window : null);
