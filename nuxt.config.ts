import i18n from '@nuxtjs/i18n';

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  modules: ['@nuxtjs/i18n'],
  i18n: {
    strategy: 'prefix',
    defaultLocale: 'en',
    locales: [
      { code: 'en', iso: 'en-US', name: 'English' },
      { code: 'es', iso: 'es-ES', name: 'Español' },
      { code: 'pt', iso: 'pt-BR', name: 'Português' },
    ],
    detectBrowserLanguage: {
      useCookie: true,
      fallbackLocale: 'en',
    },
    vueI18n: './i18n.config.ts',
  },
  css: ['~/assets/base.css'],
  nitro: {
    prerender: {
      autoSubfolderIndex: false,
      crawlLinks: true,
      ignore: ['/static/manifest.json'],
    },
  },
  routeRules: {
    // These are so links work in dev. Production links are compiled from https://afonso.dev/short
    '/in': { redirect: { to: 'https://www.linkedin.com/in/afonsodemori/', statusCode: 308 } },
    '/linkedin': { redirect: { to: 'https://www.linkedin.com/in/afonsodemori/', statusCode: 308 } },
    '/gh': { redirect: { to: 'https://github.com/afonsodemori', statusCode: 308 } },
    '/github': { redirect: { to: 'https://github.com/afonsodemori', statusCode: 308 } },
  },
});
