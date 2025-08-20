// service-worker.js
// This script will run in the background, separate from your web page.
// It handles caching and offline functionality.

const CACHE_NAME = 'iqra-test-prep-cache-v1'; // Cache version. Change this to trigger updates.
const urlsToCache = [
    '/', // Cache the homepage
    '/purchase',
    '/buy-now',
    '/faqs',
    '/testimonials',
    '/free-test',
    '/free-quiz',
    '/free-driver-quiz',
    '/canadian-citizenship-prep',
    '/about',
    '/terms-of-use',
    '/policy',
    '/disclaimer',
    '/cookie-policy',
    '/copyright',
    '/contactus',
    '/css/app.css', // Assuming you compile your main CSS into app.css
    '/js/app.js',   // Assuming you compile your main JS into app.js
    // Add other critical static assets here
    '/images/logo.png',
    '/images/toronto-skyline.png',
    '/images/car.png',
    '/images/amina.jpg',
    // PWA icons - ensure these paths are correct
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
    '/images/icons/icon-maskable-512x512.png'
];

// --- Install Event ---
// This event is fired when the service worker is installed.
// It typically caches static assets.
self.addEventListener('install', (event) => {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                console.log('Opened cache');
                // Add all the assets to the cache
                return cache.addAll(urlsToCache);
            })
            .catch((error) => {
                console.error('Failed to cache:', error);
            })
    );
});

// --- Fetch Event ---
// This event is fired when the browser makes a request.
// It intercepts requests and serves cached content if available.
self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                // Cache hit - return response
                if (response) {
                    return response;
                }
                // If not in cache, fetch from network
                return fetch(event.request)
                    .then((networkResponse) => {
                        // Check if we received a valid response
                        if (!networkResponse || networkResponse.status !== 200 || networkResponse.type !== 'basic') {
                            return networkResponse;
                        }
                        // IMPORTANT: Clone the response. A response is a stream
                        // and can only be consumed once. We must clone it so that
                        // both the browser and the cache can consume it.
                        const responseToCache = networkResponse.clone();

                        caches.open(CACHE_NAME)
                            .then((cache) => {
                                // Only cache GET requests
                                if (event.request.method === 'GET') {
                                    cache.put(event.request, responseToCache);
                                }
                            });
                        return networkResponse;
                    })
                    .catch((error) => {
                        console.error('Fetch failed for:', event.request.url, error);
                        // Optionally, return an offline page here
                        // For example: return caches.match('/offline.html');
                    });
            })
    );
});

// --- Activate Event ---
// This event is fired when the service worker is activated.
// It's used to clean up old caches.
self.addEventListener('activate', (event) => {
    const cacheWhitelist = [CACHE_NAME]; // Only keep the current cache version

    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        // Delete old caches
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
