// service-worker.js
// This script will run in the background, separate from your web page.
// It handles caching and offline functionality.

const CACHE_NAME = 'iqra-test-prep-cache-v2'; // Cache version. Change this to trigger updates.
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
// --- Fetch Event ---
self.addEventListener('fetch', (event) => {
    const url = new URL(event.request.url);

    // ❌ Skip caching for auth & API requests
    if (
        url.pathname.startsWith('/login') ||
        url.pathname.startsWith('/register') ||
        url.pathname.startsWith('/logout') ||
        url.pathname.startsWith('/password') || // forgot/reset password
        url.pathname.startsWith('/sanctum') ||  // Laravel Sanctum
        url.pathname.startsWith('/api')         // API calls
    ) {
        return; // Let the network handle these
    }

    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                if (response) {
                    return response;
                }

                return fetch(event.request)
                    .then((networkResponse) => {
                        if (!networkResponse || networkResponse.status !== 200 || networkResponse.type !== 'basic') {
                            return networkResponse;
                        }

                        const responseToCache = networkResponse.clone();

                        caches.open(CACHE_NAME).then((cache) => {
                            if (event.request.method === 'GET') {
                                cache.put(event.request, responseToCache);
                            }
                        });

                        return networkResponse;
                    })
                    .catch((error) => {
                        console.error('Fetch failed for:', event.request.url, error);
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
