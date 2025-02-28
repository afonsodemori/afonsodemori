<script setup lang="ts">
useHead({
  title: 'Error 404 - Page not found',
});
</script>

<template>
  <header>
    <div class="container">
      <div class="code"><span class="open">:</span><span class="close">-(</span></div>
      <h1>Page not found</h1>
      <p>The page you're looking for was not found in this route.</p>
    </div>
  </header>
  <FooterNavigation :links="['home', 'resume', 'contact']" />
</template>

<style scoped>
h1 {
  margin: 0.1em auto;
  font-weight: 900;
  font-size: 4em;
}

div.code {
  font-weight: 900;
  font-size: 3.5em;
  font-style: normal;
}

.open {
  color: var(--primary);
}

.close {
  color: var(--secondary);
}
</style>
