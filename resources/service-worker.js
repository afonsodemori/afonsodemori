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

self.addEventListener('activate', function (event) {
    console.debug('SW: Activate');
});

self.addEventListener('fetch', function (event) {
    const request = event.request;
    const urlWithoutQuery = new URL(request.url.split('?')[0]);

    event.respondWith(
        caches.match(urlWithoutQuery)
            .then(cachedResponse => {

                return fetch(request)
                    .then(response => {
                        if (!response || response.status !== 200 || response.type !== 'basic') {
                            // invalid response
                            return response;
                        }

                        // clone the response since it can only be read once
                        const responseToCache = response.clone();

                        // cache the fetched response for offline use
                        caches.open(cacheName)
                            .then(cache => {
                                cache.put(urlWithoutQuery, responseToCache);
                            })
                        ;

                        return response;
                    })
                    .catch(() => {
                        if (!cachedResponse) {
                            // TODO: no cached version, show offline page
                        }

                        // offline, use the cached version
                        return cachedResponse;
                    });
            })
    );
});
