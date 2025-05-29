const CACHE_NAME = 'portfolio-cache-v2'; // Incremented version for updates
const PRECACHE_ASSETS = [
  '/public/media/BG/bg-gif-resize.gif', // Smaller version for initial load
  '/public/media/BG/bg-gif.gif', 
];

// Install event: precache core assets
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(PRECACHE_ASSETS);
      })
      .then(() => self.skipWaiting()) // Activate new SW immediately
  );
});

// Activate event: clean up old caches
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheName !== CACHE_NAME) {
            return caches.delete(cacheName);
          }
        })
      );
    }).then(() => self.clients.claim()) // Take control of open clients
  );
});

// Fetch event: serve from cache, fallback to network, then cache new assets
self.addEventListener('fetch', event => {
  // For HTML pages, try network first (stale-while-revalidate strategy)
  if (event.request.mode === 'navigate') {
    event.respondWith(
      fetch(event.request)
        .then(response => {
          // If successful, cache it and return
          const responseToCache = response.clone();
          caches.open(CACHE_NAME).then(cache => {
            cache.put(event.request, responseToCache);
          });
          return response;
        })
        .catch(() => {
          // If network fails, try to serve from cache
          return caches.match(event.request);
        })
    );
    return;
  }

  // For other assets (CSS, JS, images), use cache-first strategy
  event.respondWith(
    caches.match(event.request)
      .then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse; // Serve from cache
        }
        // Not in cache, fetch from network
        return fetch(event.request).then(networkResponse => {
          // Cache the new asset for future use
          const responseToCache = networkResponse.clone();
          caches.open(CACHE_NAME).then(cache => {
            cache.put(event.request, responseToCache);
          });
          return networkResponse;
        });
      })
      .catch(error => {
        // Fallback for errors (e.g., offline page if specific asset types fail)
        // console.error('Fetch failed; returning offline page instead.', error);
        // return caches.match('/offline.html'); // You'd need an offline.html
      })
  );
});