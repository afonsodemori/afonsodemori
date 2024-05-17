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

                const response = cachedResponse ?? await updateCache(request, cacheKey);

                if (cachedResponse) {
                    // if response was cache, refresh cache async
                    updateCache(request, cacheKey).then(() => {
                    });
                }

                return response;
            })
    );
});

function updateCache(request, cacheKey) {
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
