<script setup lang="ts">
const { t } = useI18n();

useSeoMeta({
  ogImage: 'https://github.com/afonsodemori.png',
});

useHead({
  title: computed(() => t('head.home.title')),
  meta: [
    { name: 'description', content: computed(() => t('head.home.meta.description')) },
    { name: 'keywords', content: computed(() => t('head.home.meta.keywords')) },
  ],
  link: [
    { rel: 'alternate', hreflang: 'en', href: 'https://afonso.dev/en' },
    { rel: 'alternate', hreflang: 'es', href: 'https://afonso.dev/es' },
    { rel: 'alternate', hreflang: 'pt', href: 'https://afonso.dev/pt' },
  ],
});
</script>

<template>
  <div class="home">
    <LanguageSelector />

    <Header :h1-has-link="true" />

    <article>
      <div class="container">
        <p>{{ $t('about.bio') }}</p>
      </div>
    </article>

    <FooterNavigation :links="['resume', 'linkedin', 'github', 'contact']" />
  </div>
</template>

<style scoped>
@media screen and (min-width: 1200px) {
  div.home {
    zoom: 130%;
  }
}

article p {
  font-size: 1.1em;
}

@media print {
  header {
    display: unset;
  }
}
</style>
