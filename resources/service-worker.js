const cacheName = 'offline-access';

self.addEventListener('install', event => {
    console.debug('SW: Install');
    event.waitUntil(
        caches.open(cacheName)
            .then(cache => {
                const urls = [
                    '/',
                    '/cv',
                    '/assets/style.css',
                    '/assets/js/scripts.js',
                    '/assets/inter-variable.woff2',
                    '/favicon.ico',
                    '/app.manifest',
                    '/assets/icons/favicon-192.png',
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

                return cache.addAll(urls);
            })
    );
});

self.addEventListener('activate', () => {
    console.debug('SW: Activate');
});

self.addEventListener('fetch', event => {
    const request = event.request;
    const cacheKey = new URL(request.url.split('?')[0]);

    event.respondWith(
        caches
            .match(cacheKey)
            .then(async cachedResponse => {

                const response = cachedResponse ?? await warmCache(request, cacheKey);

                if (cachedResponse) {
                    // if response was cache, refresh cache async
                    warmCache(request, cacheKey).then(() => {
                    });
                }

                const downloadResponse = convertResponseIfDownload(request, response, cacheKey);

                return downloadResponse || response;
            })
    );
});

function warmCache(request, cacheKey) {
    return fetch(request, cacheKey)
        .then(response => {
            if (!response || response.status !== 200 || response.type !== 'basic') {
                // invalid response
                return response;
            }

            // clone the response since it can only be read once
            const responseToCache = response.clone();

            // cache the fetched response for offline use
            caches
                .open(cacheName)
                .then(cache => {
                    cache.put(cacheKey, responseToCache).then();
                })
                .catch(() => {
                });

            return response;
        })
        .catch(() => {
            // TODO: Offline?
        });
}

function convertResponseIfDownload(request, response, cacheKey) {
    if (!request.url.endsWith('?download')) {
        return;
    }

    const originalFilename = cacheKey.pathname.split('/').pop();
    const basename = originalFilename.slice(0, originalFilename.lastIndexOf('.'));
    const extension = originalFilename.split('.').pop();
    const downloadableExtensions = ['pdf', 'txt', 'docx', 'odt'];

    if (!downloadableExtensions.includes(extension)) {
        return;
    }

    const language = originalFilename.match(/^cv-(es|pt)-/)?.[1] ?? 'en';
    let monthNames = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
    if (language === 'es') {
        monthNames = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sept', 'oct', 'nov', 'dic'];
    } else if (language === 'pt') {
        monthNames = ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'];
    }

    const now = new Date();
    const year = now.getFullYear();
    const month = monthNames[now.getMonth()];
    const formattedDate = `${month}${year}`;

    // Clone the response
    const clonedResponse = response.clone();

    const filename = `${basename}-${formattedDate}.${extension}`;
    const headers = new Headers(clonedResponse.headers);
    headers.append('Content-Disposition', `attachment; filename="${filename}"`);

    return new Response(clonedResponse.body, {
        status: clonedResponse.status,
        statusText: clonedResponse.statusText,
        headers: headers
    });
}
