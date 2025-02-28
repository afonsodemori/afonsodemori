<script setup lang="ts">
const { t, locale } = useI18n();
import { ref, onUnmounted } from 'vue';

useSeoMeta({
  ogImage: `/static/images/og-image-${locale.value}.jpg`,
});

useHead({
  title: computed(() => t('head.cv.title')),
  meta: [
    { name: 'description', content: computed(() => t('head.cv.meta.description')) },
    { name: 'keywords', content: computed(() => t('head.cv.meta.keywords')) },
  ],
  link: [
    { rel: 'alternate', hreflang: 'en', href: 'https://afonso.dev/en/curriculum' },
    { rel: 'alternate', hreflang: 'es', href: 'https://afonso.dev/es/curriculum' },
    { rel: 'alternate', hreflang: 'pt', href: 'https://afonso.dev/pt/curriculum' },
  ],
});

const downloadButtons = ['first', 'second', 'third'];
const downloadExt = ['pdf', 'docx', 'txt', 'md'];

const activeOption = ref<HTMLElement | null>(null);

const buttonClick = (event: Event) => {
  event.stopPropagation();
  const target = event.target as HTMLElement;

  if (activeOption.value) {
    activeOption.value.classList.remove('active');
    activeOption.value = null;
  } else {
    const element = target.parentElement as HTMLElement;
    element?.classList.add('active');
    activeOption.value = element;

    const removeActiveClass = () => {
      element.classList.remove('active');
      activeOption.value = null;
    };

    target.addEventListener('mouseleave', removeActiveClass, { once: true });
    document.body.addEventListener('click', removeActiveClass, { once: true });
  }
};

onUnmounted(() => {
  if (activeOption.value) activeOption.value.classList.remove('active');
});
</script>

<template>
  <LanguageSelector />

  <Header />

  <section style="margin-bottom: 0" aria-hidden="true">
    <div class="container">
      <p style="margin: 0">{{ $t('cv.label') }}:</p>

      <ul v-for="key of downloadButtons" class="select">
        <li :class="{ 'root-option': true, primary: key === 'first' }" @click="buttonClick">
          {{ $t(`cv.${key}.label`) }} ▾
          <ul class="menu">
            <li v-for="ext of downloadExt">
              <a :href="`/docs/cv-${$t(`cv.${key}.locale`)}-afonso_de_mori.${ext}`">
                {{ $t(`cv.${key}.${ext}`) }}
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </section>

  <section aria-hidden="true">
    {{ $t('cv.seeAlso') }}:
    <a target="_blank" href="/linkedin" :title="$t('links.linkedin.title')">
      LinkedIn
      <span class="underline"></span>
    </a>
    -
    <a target="_blank" href="/github" :title="$t('links.github.title')">
      GitHub
      <span class="underline"></span>
    </a>
  </section>

  <ResumePage />

  <FooterNavigation :links="['home', 'linkedin', 'github', 'contact']" />
</template>

<style scoped>
.select {
  cursor: pointer;
  margin: 0.3em;
  padding: 0;
  list-style: none;
  position: relative;
  display: inline-flex;
  user-select: none;
}

.select:hover .root-option {
  transform: scale(1.07);
}

.select.active {
  z-index: 1;
}

.root-option {
  padding: 10px;
  border: 1px solid var(--secondary);
  color: var(--secondary);
  border-radius: 4px;
  transition: transform 0.2s ease-in-out;
  background-color: var(--background-color);
}

.select.active .menu {
  display: block;
}

.menu {
  margin-top: 10px;
  margin-left: -10px;
  border: 1px solid var(--secondary);
  border-radius: 4px;
  padding: 5px 0;
  list-style: none;
  background: var(--background-color);
  position: absolute;
  display: none;
}

.root-option.primary ul {
  border: 1px solid var(--primary);
}

.root-option.primary ul a {
  color: var(--primary);
}

.menu a {
  padding: 1em;
  color: var(--secondary);
  text-align: left;
  white-space: nowrap;
  text-decoration: none;
  font-weight: inherit;
  display: block;
  background: none;
}

.root-option.primary ul a:hover {
  background: var(--primary);
  color: var(--background-color);
}

.menu a:hover {
  background: var(--secondary);
  color: var(--background-color);
}

.root-option.primary {
  border-color: var(--primary);
  border-radius: 4px;
  color: var(--background-color);
  font-weight: 400;
  background-color: var(--primary);
}

@media screen and (prefers-color-scheme: dark) {
  .root-option {
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    background-color: rgba(255, 255, 255, 0.05);
  }

  .menu {
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(8px);
  }

  .root-option.primary ul {
    border: 1px solid rgba(255, 255, 255, 0.75);
  }

  .root-option.primary ul a {
    color: inherit;
  }

  .menu a:hover,
  .root-option.primary ul a:hover {
    background: rgba(255, 255, 255, 0.75);
    color: black;
  }

  .menu a {
    color: white;
  }

  .menu a:hover {
    background: rgba(255, 255, 255, 0.75);
    color: black;
  }

  .root-option.primary {
    border-color: rgba(255, 255, 255, 0.75);
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
  }
}
</style>
