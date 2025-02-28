<script setup lang="ts">
const route = useRoute();
const { locale } = useI18n();

const switchLanguage = (lang: 'en' | 'es' | 'pt') => {
  locale.value = lang;
  const newPath = `/${lang}${route.fullPath.replace(/^\/[a-z]{2}/, '')}`;
  navigateTo(newPath);
};
</script>

<template>
  <div class="language">
    <a v-if="locale !== 'en'" @click="switchLanguage('en')" title="See in English">English</a>
    <a v-if="locale !== 'es'" @click="switchLanguage('es')" title="Ver en español">Español</a>
    <a v-if="locale !== 'pt'" @click="switchLanguage('pt')" title="Ver em Português">Português</a>
  </div>
</template>

<style scoped>
.language {
  position: absolute;
  top: 0;
  right: 0;
  text-align: right;
  font-size: 0.8em;
  margin-right: 0.5em;
  cursor: pointer;
}

.language a {
  display: inline-block;
  padding: 0.5em;
  font-weight: 400;
  color: #676f79;
  text-decoration: underline;
  background-image: none;
}

@media (hover: hover) {
  .language a:hover {
    color: #000;
    text-decoration-thickness: 2px;
  }
}

@media (prefers-color-scheme: dark) {
  .language a {
    color: rgba(255, 255, 255, 0.4);
  }

  @media (hover: hover) {
    .language a:hover {
      color: #fff;
    }
  }
}
</style>
