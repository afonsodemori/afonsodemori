const availableLanguages = ['en', 'es', 'pt'];
const url = new URL(window.location);

function checkMainDomainConnectivity() {
    const keepDomain = url.searchParams.get('keep');
    if (keepDomain !== null) {
        localStorage.setItem('keepDomain', (keepDomain !== '0').toString());
    }

    if (
        url.host !== 'afonso.dev'
        && url.host.substring(url.host.indexOf('.')) !== '.afonsodemori.pages.dev'
        && localStorage.getItem('keepDomain') !== 'true'
    ) {
        fetch('https://afonso.dev/health-check')
            .then(response => {
                if (response.status === 200) {
                    response.text().then(text => {
                        if (text.includes('OK')) {
                            const url = new URL(window.location);
                            url.host = 'afonso.dev';
                            url.port = '443';
                            window.location = url;
                        }
                    });
                }
            })
            .catch(() => {
            });
    }
}

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
    checkMainDomainConnectivity();
    updateDefaultLocale();
    registerServiceWorker();
});
