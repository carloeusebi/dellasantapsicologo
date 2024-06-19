var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/maskable_icon_x48.png',
    '/images/icons/maskable_icon_x72.png',
    '/images/icons/maskable_icon_x96.png',
    '/images/icons/maskable_icon_x128.png',
    '/images/icons/maskable_icon_x192.png',
    '/images/icons/maskable_icon_x384.png',
    '/images/icons/maskable_icon_x512.png',
    '/images/icons/splash-640x1136.png',
    '/images/icons/splash-750x1334.png',
    '/images/icons/splash-828x1792.png',
    '/images/icons/splash-1125x2436.png',
    '/images/icons/splash-1242x2208.png',
    '/images/icons/splash-1242x2688.png',
    '/images/icons/splash-1536x2048.png',
    '/images/icons/splash-1668x2224.png',
    '/images/icons/splash-1668x2388.png',
    '/images/icons/splash-2048x2732.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            }),
    );
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName)),
            );
        }),
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            }),
    );
});
