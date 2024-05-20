const cacheName = 'offline-access';

self.addEventListener('install', event => {
    console.debug('new service worker found');
    event.waitUntil(
        caches
            .open(cacheName)
            .then(cache => {
                const urls = [
                    '/',
                    '/cv/',
                    '/contact/',
                    '/assets/style.css?v={{hash}}',
                    '/assets/js/scripts.js?v={{hash}}',
                    '/assets/inter-variable.woff2',
                    '/favicon.ico',
                    '/app.manifest',
                    '/assets/icons/favicon-192.png',
                    '/offline',
                ];

                ['en', 'es', 'pt'].forEach(locale => {
                    [
                        '/{locale}',
                        '/cv/{locale}',
                        '/docs/cv-{locale}-afonso_de_mori.pdf',
                        '/docs/cv-{locale}-afonso_de_mori.docx',
                        '/docs/cv-{locale}-afonso_de_mori.txt',
                        '/docs/cv-{locale}-afonso_de_mori.odt',
                        '/docs/cv-{locale}-afonso_de_mori-low-1.webp',
                        '/docs/cv-{locale}-afonso_de_mori-low-2.webp',
                        '/docs/cv-{locale}-afonso_de_mori-1.webp',
                        '/docs/cv-{locale}-afonso_de_mori-2.webp',
                    ].forEach(url => {
                        urls.push(url.replace('{locale}', locale));
                    });
                });

                urls.forEach(url => {
                    cache.add(url)
                        .then(() => console.debug(`cache: ${url}`))
                        .catch(() => console.error(`cache: ${url}`));
                })
            })
    );
});

self.addEventListener('activate', () => {
    console.debug('new service worker activated');
});

self.addEventListener('fetch', event => {
    const request = event.request;
    const cacheKey = new URL(request.url);

    event.respondWith(
        caches
            .match(cacheKey)
            .then(async cachedResponse => {
                return cachedResponse || fetchOnline(request);
            })
            .then(response => {
                if (response.status !== 200) return response;
                return getDownloadResponse(request, response, cacheKey) || response;
            })
    );
});

function fetchOnline(request) {
    return fetch(request)
        .catch(async () => {
            const requestPathname = new URL(request.url).pathname;
            let redirectionUrl;

            if (['/in', '/linkedin'].includes(requestPathname)) {
                redirectionUrl = 'https://www.linkedin.com/in/afonsodemori';
            }

            if (['/gh', '/github'].includes(requestPathname)) {
                redirectionUrl = 'https://www.github.com/afonsodemori';
            }

            if (redirectionUrl) {
                return new Response(null, {
                    status: 301, headers: {
                        'Location': redirectionUrl
                    }
                });
            }

            const noQueryResponse = await caches.match(requestPathname);
            if (noQueryResponse) return noQueryResponse;

            return caches.match('/offline')
                .then(response => {
                    return new Response(response.body, {
                        status: 503,
                        headers: {
                            'Content-Type': 'text/html'
                        }
                    });
                });
        });
}

function getDownloadResponse(request, response, cacheKey) {
    const filename = getBasenameFromFilename(cacheKey);
    const extension = getExtensionFromFilename(filename);

    if (!isDownloadable(request.url, extension)) return;

    const language = getLanguageFromFilename(filename);
    const formattedDate = getFormattedDate(language);
    const downloadFilename = getFormattedFilename(language, formattedDate, extension);

    const clonedResponse = response.clone();
    const headers = new Headers(clonedResponse.headers);
    headers.append('Content-Disposition', `attachment; filename="${downloadFilename}"`);

    return new Response(clonedResponse.body, {
        status: clonedResponse.status,
        statusText: clonedResponse.statusText,
        headers: headers
    });
}

function isDownloadable(url, extension) {
    const downloadableExtensions = ['pdf', 'txt', 'docx', 'odt'];

    return url.endsWith('?download') && downloadableExtensions.includes(extension);
}

function getBasenameFromFilename(filename) {
    return filename.pathname.split('/').pop();
}

function getExtensionFromFilename(filename) {
    return filename.split('.').pop();
}

function getLanguageFromFilename(filename) {
    return filename.match(/^cv-(es|pt)-/)?.[1] ?? 'en';
}

function getTranslatedMonthsNames(language) {
    if (language === 'es')
        return ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    if (language === 'pt')
        return ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
}

function getFormattedDate(language) {
    const now = new Date();
    const year = now.getFullYear();
    const monthNames = getTranslatedMonthsNames(language);
    const month = monthNames[now.getMonth()];

    return `${month} ${year}`;
}

function getFormattedFilename(language, formattedDate, extension) {
    return `CV Afonso de Mori - ${language.toUpperCase()} - ${formattedDate}.${extension}`;
}
