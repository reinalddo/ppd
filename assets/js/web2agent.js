(function (window, document) {
    if (!window || !document) {
        return;
    }

    const config = window.Web2AgentConfig || {};

    const pathKeyMap = {
        '/': 'index',
        '': 'index',
        '/inicio': 'index',
        '/index.php': 'index',
        '/servicios': 'servicios',
        '/servicios-planes': 'servicios',
        '/ventajas': 'ventajas',
        '/planes': 'planes',
        '/contacto': 'contacto'
    };

    const normalizePath = () => {
        const pathName = window.location.pathname.replace(/\/+/g, '/');
        const sanitized = pathName.endsWith('/') && pathName.length > 1
            ? pathName.slice(0, -1)
            : pathName;
        return sanitized;
    };

    const resolveKey = () => {
        const path = normalizePath();
        return pathKeyMap[path] || pathKeyMap[path.toLowerCase()] || 'index';
    };

    const seoData = config[resolveKey()];
    if (!seoData) {
        return;
    }

    const ensureMeta = (selector, attributes) => {
        let element = document.head.querySelector(selector);
        if (!element) {
            element = document.createElement('meta');
            Object.keys(attributes).forEach(key => {
                if (key !== 'content') {
                    element.setAttribute(key, attributes[key]);
                }
            });
            document.head.appendChild(element);
        }
        if (attributes.content) {
            element.setAttribute('content', attributes.content);
        }
    };

    const resolveImage = source => {
        if (!source) {
            return '';
        }
        if (/^https?:\/\//i.test(source)) {
            return source;
        }
        const origin = window.location.origin || '';
        return `${origin}${source.startsWith('/') ? source : '/' + source}`;
    };

    document.title = seoData.title;

    ensureMeta('meta[name="description"]', { name: 'description', content: seoData.metaDescription });
    ensureMeta('meta[name="keywords"]', { name: 'keywords', content: seoData.keywords });
    ensureMeta('meta[property="og:title"]', { property: 'og:title', content: seoData.title });
    ensureMeta('meta[property="og:description"]', { property: 'og:description', content: seoData.metaDescription });
    ensureMeta('meta[property="og:image"]', { property: 'og:image', content: resolveImage(seoData.ogImage) });
    ensureMeta('meta[property="og:url"]', { property: 'og:url', content: window.location.href });
})(typeof window !== 'undefined' ? window : null, typeof document !== 'undefined' ? document : null);
