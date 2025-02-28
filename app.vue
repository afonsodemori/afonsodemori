<script setup>
const { locale } = useI18n();

useHead({
  htmlAttrs: {
    lang: `${locale.value}`,
  },
  link: [
    { rel: 'apple-touch-icon', href: '/static/icons/favicon-192.png' },
    { rel: 'manifest', href: '/static/manifest.json' },
    { rel: 'icon', href: '/favicon.ico' },
  ],
});

if (import.meta.client && 'serviceWorker' in navigator) {
  navigator.serviceWorker
    .getRegistrations()
    .then(registrations => registrations.forEach(registration => registration.unregister()));
}

if (import.meta.window && 'caches' in window) {
  caches.keys().then(cacheNames => cacheNames.forEach(cacheName => caches.delete(cacheName)));
}

if (['afonso.dev', 'afonsodemori.com'].includes(useRequestURL().host)) {
  console.debug = () => {};
  console.info = () => {};
  console.log = () => {};
  console.error = () => {};
}
</script>

<template>
  <div>
    <NuxtRouteAnnouncer />
    <NuxtPage />
  </div>
</template>
