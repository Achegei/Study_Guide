// public/service-worker.js

// IMPORTANT: Bump this version number whenever you make changes to PRECACHE_ASSETS
// or significant changes to the caching logic to ensure users get the latest SW.
const CACHE_VERSION = 'v7'; // Increased from v6 to v7 to ensure update
const CACHE_NAME = `iqra-test-prep-cache-${CACHE_VERSION}`;

// Core files and pages to precache during installation.
// Ensure these paths are correct for your Laravel/Vite setup (e.g., /build/assets/...)
const PRECACHE_ASSETS = [
    '/', // Your main homepage
    '/offline.html', // Your custom offline page
    '/css/app.css',  // Verify this path; if using Vite, it might be e.g., '/build/assets/app-xxxxxxxx.css'
    '/js/app.js',    // Verify this path; if using Vite, it might be e.g., '/build/assets/app-xxxxxxxx.js'
    '/images/logo.png', // Your logo image
    // Add other essential static pages or assets that should be available offline immediately.
    // Examples: '/login', '/register', '/buy-now', etc., if they are static HTML.
    // If they are dynamically generated, they will be covered by the fetch listener's network-first strategy (or bypassed).
];

// -----------------------------------------------------------------------------
// Install Event: Caches essential assets during Service Worker installation.
// -----------------------------------------------------------------------------
self.addEventListener('install', (event) => {
    console.log(`[Service Worker] Installing version: ${CACHE_VERSION}`);
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log('[Service Worker] Pre-caching core assets...');
            return cache.addAll(PRECACHE_ASSETS)
                .then(() => {
                    console.log('[Service Worker] All core assets precached successfully.');
                })
                .catch(error => {
                    console.error('[Service Worker] Pre-caching failed for some assets:', error);
                    // This detailed logging helps identify which specific assets failed to load
                    // by attempting to match them in cache immediately after addAll.
                    // Note: `addAll` is atomic; if one fails, all fail. This is for post-mortem.
                    Promise.all(PRECACHE_ASSETS.map(asset => caches.match(asset)))
                        .then(responses => {
                            PRECACHE_ASSETS.forEach((asset, index) => {
                                if (!responses[index]) {
                                    console.warn(`[Service Worker] Failed to cache: ${asset}`);
                                }
                            });
                        });
                    // Re-throw the error to indicate installation failure if essential assets can't be cached.
                    throw error;
                });
        })
    );
    // Forces the waiting service worker to become the active service worker.
    // This allows the new SW to control clients immediately rather than waiting
    // for all controlled tabs to close. Useful during development/updates.
    self.skipWaiting();
});

// -----------------------------------------------------------------------------
// Activate Event: Cleans up old caches to save space and prevent stale content.
// -----------------------------------------------------------------------------
self.addEventListener('activate', (event) => {
    console.log(`[Service Worker] Activating version: ${CACHE_VERSION}`);
    event.waitUntil(
        caches.keys().then((keys) =>
            Promise.all(
                keys
                    .filter((key) => key !== CACHE_NAME) // Keep only the current cache
                    .map((key) => {
                        console.log(`[Service Worker] Deleting old cache: ${key}`);
                        return caches.delete(key); // Delete old caches
                    })
            )
        )
    );
    // Immediately takes control of any clients (tabs/windows) that were opened
    // before the Service Worker was activated.
    self.clients.claim();
    console.log('[Service Worker] Activated and claimed clients.');
});

// -----------------------------------------------------------------------------
// Fetch Event: Intercepts network requests and serves content from cache or network.
// -----------------------------------------------------------------------------
self.addEventListener('fetch', (event) => {
    const request = event.request;
    // console.log(`[Service Worker] Fetching: ${request.url}`);

    // --- STRATEGY 1: Direct Network Bypass for Non-GET Requests ---
    // Critical: POST, PUT, DELETE, etc., should always go to the network.
    // This prevents Service Worker from interfering with form submissions and redirects.
    if (request.method !== 'GET') {
        // console.log(`[Service Worker] Bypassing non-GET request: ${request.url}`);
        return; // Let the browser handle it directly (no event.respondWith())
    }

    // --- STRATEGY 2: Direct Network Bypass for Navigation Requests (HTML Documents) ---
    // This is the key change to fix redirect issues on iOS/Safari and other browsers.
    // For main document requests (HTML pages), we explicitly let the browser handle them directly.
    // This ensures that HTTP redirects (like after login/password change) are followed natively by the browser,
    // which Service Worker's event.respondWith() can sometimes interfere with.
    if (request.mode === 'navigate' || request.destination === 'document') {
        // console.log(`[Service Worker] Bypassing navigation/document request for native browser handling: ${request.url}`);
        // If the network request fails for a document, we can then serve an offline page.
        event.respondWith(
            fetch(request).catch(() => {
                // If the network is down for a document, try to serve the offline page.
                // Ensure '/offline.html' is in PRECACHE_ASSETS.
                return caches.match('/offline.html');
            })
        );
        return; // Allow the browser to proceed directly with the network request
    }

    // --- STRATEGY 3: Cache-First, then Network for Other Static Assets ---
    // For all other GET requests (CSS, JS, images, fonts, etc.), try to serve from cache first.
    // If not in cache, go to network, cache the response, and then return it.
    event.respondWith(
        caches.match(request).then((cachedResponse) => {
            // If the asset is found in the cache, return it immediately.
            if (cachedResponse) {
                // console.log(`[Service Worker] Serving from cache: ${request.url}`);
                return cachedResponse;
            }

            // If not in cache, fetch from the network.
            return fetch(request)
                .then((networkResponse) => {
                    // console.log(`[Service Worker] Serving from network and caching: ${request.url}`);
                    // Check if the response is valid (e.g., 200 OK) and cacheable.
                    // Do not cache opaque responses, 3xx redirects, or network errors.
                    if (networkResponse.ok && networkResponse.type === 'basic' || networkResponse.type === 'cors') {
                        const responseClone = networkResponse.clone(); // Clone response for caching
                        caches.open(CACHE_NAME).then((cache) => {
                            cache.put(request, responseClone);
                        });
                    }
                    return networkResponse; // Return the network response
                })
                .catch(() => {
                    // --- Fallback for failed network requests for specific asset types ---
                    // If network fails for an image, try to serve a placeholder image.
                    if (request.destination === 'image') {
                        // Ensure this fallback image is precached.
                        // console.log(`[Service Worker] Network failed for image, serving logo fallback: ${request.url}`);
                        return caches.match('/images/logo.png'); // Fallback image
                    }
                    // For other failed asset types, just return a network error response.
                    // This allows the browser to show its default broken icon or handle the error.
                    // console.warn(`[Service Worker] Network failed for asset: ${request.url}`);
                    return new Response(null, { status: 503, statusText: 'Service Unavailable (Offline Asset)' });
                });
        })
    );
});
