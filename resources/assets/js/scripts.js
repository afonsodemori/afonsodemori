const availableLanguages = ['en', 'es', 'pt'];

function updateDefaultLocale() {
    const documentLang = document.documentElement.lang ?? null;
    if (availableLanguages.indexOf(documentLang) >= 0) {
        localStorage.setItem('locale', documentLang);
    }
}

function registerServiceWorker() {
    if (navigator && navigator.serviceWorker) {
        navigator.serviceWorker.register('/service-worker.js');
    }
}

window.addEventListener('load', () => {
    updateDefaultLocale();
    registerServiceWorker();
});

const selectElements = document.querySelectorAll('select.download-cv');
selectElements.forEach(select => {
    select.addEventListener('change', event => {
        const [language, format] = event.target.value.split('-');
        const fileUrl = `/docs/cv-${language}-afonso_de_mori.${format}`;

        const tempLink = document.createElement('a');
        tempLink.href = fileUrl;
        tempLink.download = '';

        document.body.appendChild(tempLink);
        tempLink.click();
        document.body.removeChild(tempLink);

        event.target.value = '';
    });
});
