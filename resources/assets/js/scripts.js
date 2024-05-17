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

function replaceLowQualityResume() {
    document.querySelectorAll('picture[class^="page-"]').forEach(picture => {
        const source = picture.children[0];
        const img = picture.children[1];

        img.addEventListener('load', () => {
            img.parentElement.classList.remove('blur');
        });

        source.srcset = source.srcset.replace('-low', '');
        img.src = img.src.replace('-low', '');
    });
}

function eventsToDownloadResume() {
    const selectElements = document.querySelectorAll('select.download-cv');
    selectElements.forEach(select => {
        select.addEventListener('change', event => {
            const [language, format] = event.target.value.split('-');
            const fileUrl = `/docs/cv-${language}-afonso_de_mori.${format}?download`;

            const tempLink = document.createElement('a');
            tempLink.href = fileUrl;

            document.body.appendChild(tempLink);
            tempLink.click();
            document.body.removeChild(tempLink);

            event.target.value = '';
        });
    });
}

window.addEventListener('load', () => {
    updateDefaultLocale();
    registerServiceWorker();
    replaceLowQualityResume();
    eventsToDownloadResume();
});
