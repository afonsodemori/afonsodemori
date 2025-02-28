<script setup lang="ts">
const props = defineProps({
  h1HasLink: {
    type: Boolean,
    default: false,
  },
});

const route = useRoute();
const localePath = useLocalePath();
</script>

<template>
  <header>
    <div class="container">
      <div class="code"><span class="open">&lt;</span><span class="close">/&gt;</span></div>
      <h1>
        <template v-if="h1HasLink">Afonso <span class="nowrap">de Mori</span></template>
        <NuxtLink v-else :to="localePath('/')">Afonso <span class="nowrap">de Mori</span></NuxtLink>
      </h1>
      <h2>{{ $t('about.title') }}</h2>
    </div>
  </header>
</template>

<style scoped>
header h1,
header h2,
header .code {
  line-height: 1.1em;
}

header {
  margin-top: 2em;
}

a {
  font-weight: 900;
  color: inherit;
}

a:hover {
  text-decoration: underline;
}

.home header {
  margin-top: 5em;
}

header div.code {
  font-weight: 900;
  font-size: 3.5em;
  font-style: normal;
}

header .open {
  color: var(--primary);
}

header .close {
  color: var(--secondary);
}

header h1 {
  margin: 0.1em auto;
  font-weight: 900;
  font-size: 4em;
}

header h2 {
  margin: 0;
  font-size: 1.5em;
  font-weight: 300;
}
</style>
