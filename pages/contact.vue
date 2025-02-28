<script setup lang="ts">
const { t } = useI18n();

useHead({
  title: computed(() => t('head.contact.title')),
  meta: [
    { name: 'description', content: computed(() => t('head.contact.meta.description')) },
    { name: 'keywords', content: computed(() => t('head.contact.meta.keywords')) },
  ],
  link: [
    { rel: 'alternate', hreflang: 'en', href: 'https://afonso.dev/en/contact' },
    { rel: 'alternate', hreflang: 'es', href: 'https://afonso.dev/es/contact' },
    { rel: 'alternate', hreflang: 'pt', href: 'https://afonso.dev/pt/contact' },
  ],
});
</script>

<template>
  <LanguageSelector />

  <Header />

  <section class="container">
    <ContactForm />
  </section>

  <FooterNavigation :links="['home', 'resume', 'linkedin', 'github']" />
</template>

<style scoped></style>
