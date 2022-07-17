self.addEventListener('install', function () {
    console.debug('SW: Install');
});

self.addEventListener('activate', function (event) {
    console.debug('SW: Activate');
});

self.addEventListener('fetch', function (event) {
    console.debug('SW: Fetch');
});
