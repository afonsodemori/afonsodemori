<script setup lang="ts">
const props = defineProps({
  links: {
    type: Array as () => string[],
    required: true,
  },
});

const localePath = useLocalePath();
</script>

<template>
  <footer>
    <div class="container">
      <ul>
        <li v-for="link in links" :key="link">
          <a
            v-if="$t(`links.${link}.isExternal`) === 'true'"
            :href="`${$t(`links.${link}.destination`)}`"
            :title="`${$t(`links.${link}.title`)}`"
            target="_blank"
          >
            {{ $t(`links.${link}.text`) }}
            <span class="underline"></span>
          </a>
          <NuxtLink
            v-else
            :to="localePath($t(`links.${link}.destination`))"
            :title="$t(`links.${link}.title`)"
          >
            {{ $t(`links.${link}.text`) }}
            <span class="underline"></span>
          </NuxtLink>
        </li>
      </ul>
    </div>
  </footer>
</template>

<style scoped>
footer {
  margin-bottom: 4em;
  text-align: center;
}

footer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

footer li {
  display: inline-flex;
  margin: 0;
  padding: 0;
}

footer a {
  margin: 0.5em;
}
</style>
