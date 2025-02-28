<script setup lang="ts">
const { locale } = useI18n();
const cvText = ref('');

const modifyHTML = () => {
  setTimeout(() => {
    document.querySelectorAll<HTMLAnchorElement>('#page a').forEach((a, index) => {
      if (index === 0) a.href = `/${locale.value}/contact`;
      else if (index !== 0 && index !== 3) a.setAttribute('target', '_blank');
    });
  }, 0);
};

watchEffect(async () => {
  let module: any;

  try {
    module = await import(`../i18n/cv.generated.${locale.value}.ts`);
  } catch (error) {
    module = await import(`../i18n/cv.placeholder.${locale.value}.ts`);
  }

  cvText.value = module.default.html;
});

watch(cvText, modifyHTML);
</script>

<template>
  <main class="container cv">
    <article id="page" v-html="cvText"></article>
  </main>
</template>

<style scoped>
.container.cv {
  max-width: 980px;
}

#page {
  transition-duration: 200ms;
  border-radius: 1rem;
  margin: 0 -1.5rem;
  padding: 3rem 3rem 5rem 3rem;
  min-height: 50vh;
  font: 300 1rem/1.6 Inter, sans-serif;
  color: #000;
  text-align: justify;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  background-color: rgba(255, 255, 255, 0.5);
}

/* Reset deep HTML */
:deep(a) {
  font-weight: normal;
  text-decoration: underline;
}

:deep(a:hover) {
  text-decoration: none;
}

:deep(h1),
:deep(h2),
:deep(h3),
:deep(h4) {
  margin: 0;
  padding: 0;
  font: inherit;
  font-weight: normal;
}

:deep(strong),
:deep(h2 strong),
:deep(h3 strong) {
  font-weight: normal;
}

:deep(ul) {
  margin: 0;
  padding: 0;
  text-align: justify;
}

/* Layout changers */
:deep(.contact-separator:first-of-type) {
  display: block;
}

:deep(.contact-separator) {
  display: none;
}

:deep(span.icon:first-of-type) {
  margin-top: 2rem;
  margin-left: 0;
}

:deep(span.icon) {
  display: inline-block;
  margin-left: 1.25rem;
  width: 12px;
  height: 12px;
}

/* Define CSS normally */
:deep(h1) {
  font-size: 2rem;
  line-height: 1.2;
  font-weight: 700;
}

:deep(h2) {
  margin: 2rem 0 0.75rem 0;
  font-size: 1.6rem;
}

:deep(strong),
:deep(h2 strong),
:deep(h3 strong) {
  font-weight: 600;
}

:deep(h4) {
  opacity: 0.55;
}

:deep(ul) {
  margin: 1rem 0 2rem 2.5rem;
}

:deep(em:last-of-type) {
  display: block;
  opacity: 0.5;
  margin-top: 3rem;
  text-align: right;
  filter: grayscale(1);
}

@media screen and (prefers-color-scheme: dark) {
  #page {
    color: rgba(255, 255, 255, 0.8);
    background-color: rgba(0, 0, 0, 0.25);
    /* border: 1px solid rgba(255, 255, 255, 0.2); */
    box-shadow: 0 0 1px 0 rgba(255, 255, 255, 0.75);
  }

  :deep(h4) {
    opacity: 0.7;
  }

  :deep(span.icon) {
    opacity: 0.6;
    filter: invert(1);
  }

  :deep(em:last-of-type) {
    opacity: 0.7;
  }
}

@media screen and (max-width: 850px) {
  :deep(span.icon) {
    margin-left: 0.75rem;
  }
}

@media screen and (max-width: 800px) {
  #page {
    padding: 2rem 1rem;
  }
}

@media screen and (max-width: 750px) {
  #page {
    margin: auto -1rem;
    text-align: left;
  }

  :deep(span.icon) {
    margin-left: 0;
  }

  :deep(span.icon:first-of-type) {
    margin-top: 1.25rem;
  }

  :deep(.contact-separator) {
    display: block;
    height: 0.75rem;
  }

  :deep(ul) {
    margin-left: 1.5rem;
    text-align: left;
  }
}

@media print {
  :global(html) {
    font-size: 10pt;
  }

  /* TODO: check how to do this without affecting home */
  :global(header) {
    display: none;
  }

  :global(.grecaptcha-badge) {
    display: none !important;
  }

  :deep(span.icon:first-of-type) {
    margin-top: 1.5rem;
  }

  :deep(a) {
    color: #0000ee;
    text-decoration: underline;
    background: none;
  }

  :deep(h2:first-of-type) {
    margin-top: 2rem;
  }

  :deep(h1) {
    margin-bottom: 0.25rem;
    font-weight: normal;
  }

  :deep(h2) {
    margin-top: 1.5rem;
    font-size: 1.3rem;
  }

  :deep(h3) {
    font-size: 1.1rem;
  }

  :deep(ul) {
    margin-top: 0.5rem;
    margin-bottom: 1.5rem;
  }

  .container,
  .container.cv,
  #page {
    font-family: Arial, sans-serif;
    line-height: 1.4;
    margin: auto;
    padding: 0;
    max-width: 100%;
    width: 100%;
    box-shadow: none;
    background: none;
  }
}
</style>
