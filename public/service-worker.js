const staticDev = "/keeuangan"
const assets = [
  "/app/index.html",
  "/apple-touch-icon.png",
  "/apple-touch-icon-57x57.png",
  "/apple-touch-icon-72x72.png",
  "/apple-touch-icon-76x76.png",
  "/apple-touch-icon-114x114.png",
  "/apple-touch-icon-120x120.png",
  "/apple-touch-icon-144x144.png",
  "/apple-touch-icon-152x152.png",
  "/apple-touch-icon-180x180.png",
  "/favicon.ico",
  "/favicon.png",
  "/js/**.js",
  "/css/**.css"
]

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(staticDev).then(cache => {
      cache.addAll(assets)
    })
  )
})
self.addEventListener("fetch", fetchEvent => {
  fetchEvent.respondWith(
    caches.match(fetchEvent.request).then(res => {
      return res || fetch(fetchEvent.request)
    })
  )
})