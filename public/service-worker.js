// Service Worker for IQRA Canada Test Prep
// Version must be bumped when cache logic changes
const CACHE_VERSION = 'v9';
const CACHE_NAME = `iqra-test-prep-cache-${CACHE_VERSION}`;

// PRECACHE_ASSETS is dynamically injected from Blade layout (see app.blade.php)
// Fallbacks that we always want cached:
const CORE_ASSETS = [
    '/offline.html',
    '/images/logo.png',
];

// -----------------------------------------------------------------------------
// Install Event: Precache essential assets
// -----------------------------------------------------------------------------
self.addEventListener('install', (event) => {
    console.log(`[SW] Installing version: ${CACHE_VERSION}`);

    const assetsToCache = (self.PRECACHE_ASSETS || []).concat(CORE_ASSETS);

    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(assetsToCache)
                .then(() => console.log('[SW] Precached core + Vite assets'))
                .catch(err => console.error('[SW] Precache failed', err));
        })
    );

    self.skipWaiting();
});

// -----------------------------------------------------------------------------
// Activate Event: Clean up old caches
// -----------------------------------------------------------------------------
self.addEventListener('activate', (event) => {
    console.log(`[SW] Activating version: ${CACHE_VERSION}`);

    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.filter(key => key !== CACHE_NAME).map(key => {
                    console.log(`[SW] Deleting old cache: ${key}`);
                    return caches.delete(key);
                })
            );
        })
    );

    self.clients.claim();
    console.log('[SW] Activated and claimed clients.');
});

// -----------------------------------------------------------------------------
// Fetch Event: Cache strategy
// -----------------------------------------------------------------------------
self.addEventListener('fetch', (event) => {
    const request = event.request;

    // --- 1: Skip non-GET requests ---
    if (request.method !== 'GET') return;

    // --- 2: Navigation (documents): Network-first, fallback to offline.html ---
    if (request.mode === 'navigate' || request.destination === 'document') {
        event.respondWith(
            fetch(request).catch(() => caches.match('/offline.html'))
        );
        return;
    }

    // --- 3: Static assets (CSS, JS, images, fonts, etc.): Cache-first ---
    event.respondWith(
        caches.match(request).then(cached => {
            if (cached) return cached;

            return fetch(request)
                .then(networkResponse => {
                    if (
                        networkResponse.ok &&
                        (networkResponse.type === 'basic' || networkResponse.type === 'cors')
                    ) {
                        const clone = networkResponse.clone();
                        caches.open(CACHE_NAME).then(cache => cache.put(request, clone));
                    }
                    return networkResponse;
                })
                .catch(() => {
                    if (request.destination === 'image') {
                        return caches.match('/images/logo.png');
                    }
                    return new Response('Service Unavailable', { status: 503 });
                });
        })
    );
});
