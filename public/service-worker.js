// public/service-worker.js

const CACHE_VERSION = 'v5'; // bump this whenever you deploy new assets
const CACHE_NAME = `iqra-test-prep-cache-${CACHE_VERSION}`;

// Core files to precache
const PRECACHE_ASSETS = [
    '/',
    '/offline.html',
    '/css/app.css',
    '/js/app.js',
    '/images/logo.png',
];

// Install event: cache essential assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_ASSETS);
        })
    );
    self.skipWaiting(); // activate new SW immediately
});

// Activate event: remove old caches
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) =>
            Promise.all(
                keys
                    .filter((key) => key !== CACHE_NAME)
                    .map((key) => caches.delete(key))
            )
        )
    );
    self.clients.claim();
});

// Fetch event: network-first for dynamic, cache-first for static
self.addEventListener('fetch', (event) => {
    const request = event.request;

    // Skip non-GET requests (like POST for login)
    if (request.method !== 'GET') {
        return;
    }

    if (request.destination === 'document') {
        // Network-first for pages
        event.respondWith(
            fetch(request)
                .then((response) => {
                    const copy = response.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
                    return response;
                })
                .catch(() => {
                    return caches.match(request).then((cached) => cached || caches.match('/offline.html'));
                })
        );
    } else {
        // Cache-first for static assets (css/js/images)
        event.respondWith(
            caches.match(request).then((cached) => {
                return (
                    cached ||
                    fetch(request)
                        .then((response) => {
                            const copy = response.clone();
                            caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
                            return response;
                        })
                        .catch(() => {
                            // fallback image if needed
                            if (request.destination === 'image') {
                                return caches.match('/images/logo.png');
                            }
                        })
                );
            })
        );
    }
});
