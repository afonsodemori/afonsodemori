<script setup lang="ts">
const { t } = useI18n();
const siteKey = '6Lf-vOoqAAAAALnFoIRmqBmaTWkG8PTvC2VB535S';
const form = ref({ name: '', email: '', subject: '', message: '' });
const loading = ref(false);
const success = ref();
const responseMessage = ref('');

useHead({
  script: [
    {
      src: `https://www.google.com/recaptcha/api.js?render=${siteKey}`,
      async: true,
      defer: true,
    },
  ],
});

async function onSubmit(event: Event) {
  event.preventDefault();
  loading.value = true;
  responseMessage.value = '';

  try {
    const token = await grecaptcha.execute(siteKey, { action: 'submit' });

    const res = await fetch('/contact/send', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ ...form.value, token }),
    });

    const data = await res.json();
    success.value = data.success;
    if (data.success) {
      form.value = { name: '', email: '', subject: '', message: '' };
    }
    responseMessage.value = t(data.message || data.error);
  } catch (error) {
    console.error(error);
    responseMessage.value = t('contact.form.unexpected');
  } finally {
    loading.value = false;
  }
}
</script>

<template>
  <form @submit="onSubmit">
    <div>
      <label>
        {{ t('contact.form.name') }}:
        <input v-model="form.name" type="text" name="name" required />
      </label>
    </div>
    <div>
      <label>
        {{ t('contact.form.email') }}:
        <input v-model="form.email" type="email" name="email" required />
      </label>
    </div>
    <div>
      <label>
        {{ t('contact.form.subject') }}:
        <input v-model="form.subject" type="text" name="subject" required />
      </label>
    </div>
    <div>
      <label>
        {{ t('contact.form.message') }}:
        <textarea v-model="form.message" name="message" required></textarea>
      </label>
    </div>

    <button type="submit" :disabled="loading">
      {{ loading ? t('contact.form.submitting') : t('contact.form.submit') }}
    </button>
  </form>

  <span v-if="responseMessage" :class="success ? 'result success' : 'result error'">
    {{ responseMessage }}
  </span>
</template>

<style scoped>
label {
  display: block;
  text-align: left;
}

input,
textarea {
  transition: 200ms;
  margin-bottom: 1rem;
  width: 100%;
  padding: 0.75rem;
  border: 0;
  border-radius: 5px;
  font: inherit;
  color: #000;
  box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.5);
}

textarea {
  height: 300px;
  resize: vertical;
}

input:focus,
textarea:focus {
  outline: none;
  box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.5);
}

button {
  transition: 200ms;
  font: inherit;
  color: #fff;
  border-radius: 5px;
  border: 0;
  padding: 0.75rem 1rem;
  background-color: var(--primary);
}

button:hover {
  cursor: pointer;
  transform: scale(1.1);
}

button:disabled {
  background-color: rgba(255, 255, 255, 0.2);
}

.result {
  margin: 1rem;
  display: inline-block;
  border-radius: 3px;
  padding: 0.25rem 1rem;
  color: white;
}

.success {
  background-color: rgba(43, 151, 31, 0.75);
}

.error {
  background-color: rgba(151, 31, 31, 0.75);
}

@media (prefers-color-scheme: dark) {
  input,
  textarea {
    color: inherit;
    box-shadow: 0 0 1px 0 white;
    background-color: rgba(0, 0, 0, 0.25);
  }

  input:focus,
  textarea:focus {
    box-shadow: 0 0 3px 0 white;
    background-color: rgba(0, 0, 0, 0.5);
  }
}
</style>
