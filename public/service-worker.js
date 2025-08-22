// Service Worker for IQRA Canada Test Prep
// Version must be bumped when cache logic changes
const CACHE_VERSION = 'v9'; // Ensure this is 'v9'
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

    // Combine dynamically injected assets with core fallbacks
    const assetsToCache = (self.PRECACHE_ASSETS || []).concat(CORE_ASSETS);

    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(assetsToCache)
                .then(() => console.log('[SW] Precached core + Vite assets'))
                .catch(err => console.error('[SW] Precache failed', err));
        })
    );

    // Forces the waiting service worker to become the active service worker.
    // This ensures the new SW takes control immediately after installation.
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
                // Filter out all caches except the current one (CACHE_NAME)
                keys.filter(key => key !== CACHE_NAME).map(key => {
                    console.log(`[SW] Deleting old cache: ${key}`);
                    return caches.delete(key);
                })
            );
        })
    );

    // Immediately takes control of any clients (tabs/windows) that were opened
    // before the Service Worker was activated.
    self.clients.claim();
    console.log('[SW] Activated and claimed clients.');
});

// -----------------------------------------------------------------------------
// Fetch Event: Cache strategy
// -----------------------------------------------------------------------------
self.addEventListener('fetch', (event) => {
    const request = event.request;

    // --- 1: Skip non-GET requests ---
    // Critical: POST, PUT, DELETE, etc., should always go to the network.
    // This prevents Service Worker from interfering with form submissions and redirects.
    if (request.method !== 'GET') {
        // console.log(`[SW] Bypassing non-GET request: ${request.url}`);
        return; // Let the browser handle it directly (no event.respondWith())
    }

    // --- 2: Navigation (documents - HTML pages): Network-first, with network-successful cache, fallback to offline.html ---
    // Always try the network first to get the freshest content and correctly handle redirects.
    // If successful, cache the response for potential future offline use.
    // Only fall back to offline.html if the network is completely unavailable.
    if (request.mode === 'navigate' || request.destination === 'document') {
        event.respondWith(
            fetch(request)
                .then(networkResponse => {
                    // If the network request was successful (e.g., 200 OK) and it's a basic response,
                    // cache it for future offline use. This helps ensure if the user goes offline,
                    // they can still access recently visited HTML pages.
                    if (networkResponse.ok && networkResponse.type === 'basic') {
                        const responseClone = networkResponse.clone(); // Clone to cache and return simultaneously
                        caches.open(CACHE_NAME).then(cache => {
                            cache.put(request, responseClone);
                        });
                    }
                    return networkResponse; // Always return the network response if successful
                })
                .catch(() => {
                    // If network fails for a navigation request, serve the offline page.
                    // Ensure '/offline.html' is in CORE_ASSETS or PRECACHE_ASSETS.
                    console.log(`[SW] Network failed for navigation, serving offline page for: ${request.url}`);
                    return caches.match('/offline.html');
                })
        );
        return; // Important: Return here to prevent other fetch logic from running
    }

    // --- 3: Static assets (CSS, JS, images, fonts, etc.): Cache-first, then network ---
    // For all other GET requests, try to serve from cache first.
    // If not in cache, go to network, cache the response (if valid), and then return it.
    event.respondWith(
        caches.match(request).then(cachedResponse => {
            // If the asset is found in the cache, return it immediately.
            if (cachedResponse) {
                // console.log(`[SW] Serving from cache: ${request.url}`);
                return cachedResponse;
            }

            // If not in cache, fetch from the network.
            return fetch(request)
                .then(networkResponse => {
                    // Check if the response is valid (e.g., 200 OK) and cacheable.
                    // Do not cache opaque responses, 3xx redirects, or network errors.
                    if (networkResponse.ok && (networkResponse.type === 'basic' || networkResponse.type === 'cors')) {
                        const responseClone = networkResponse.clone(); // Clone response for caching
                        caches.open(CACHE_NAME).then((cache) => {
                            cache.put(request, responseClone);
                        });
                    }
                    // console.log(`[SW] Serving from network and caching: ${request.url}`);
                    return networkResponse; // Return the network response
                })
                .catch(() => {
                    // --- Fallback for failed network requests for specific asset types ---
                    // If network fails for an image, try to serve a placeholder image.
                    if (request.destination === 'image') {
                        // Ensure this fallback image ('/images/logo.png') is precached in CORE_ASSETS.
                        console.log(`[SW] Network failed for image, serving logo fallback: ${request.url}`);
                        return caches.match('/images/logo.png');
                    }
                    // For other failed asset types, if not found in cache and network fails,
                    // return a generic error response or let the browser handle it.
                    console.warn(`[SW] Network failed for asset: ${request.url}`);
                    return new Response(null, { status: 503, statusText: 'Service Unavailable (Offline Asset)' });
                });
        })
    );
});
