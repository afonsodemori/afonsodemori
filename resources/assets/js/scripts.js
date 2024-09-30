const host = new URL(window.location).host;
if (['afonso.dev', 'afonsodemori.com'].includes(host)) {
    console.debug = () => {
    };
    console.info = () => {
    };
    console.log = () => {
    };
    console.error = () => {
    };
}

function updateDefaultLocale() {
    const availableLanguages = ['en', 'es', 'pt'];
    const documentLang = document.documentElement.lang ?? null;
    if (availableLanguages.indexOf(documentLang) >= 0) {
        localStorage.setItem('locale', documentLang);
    }
}

function registerServiceWorker() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('/service-worker.js')
            .then((registration) => {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch((error) => {
                console.error('Service Worker registration failed:', error);
            });
    }
}

function addEventsToResumesSelects() {
    document.querySelectorAll('.selected-option').forEach(element => {
        element.addEventListener('click', event => {
            event.stopPropagation();
            const body = document.body;
            const active = document.querySelector('.selected-option.active');

            if (active) {
                active.classList.remove('active')
            } else {
                const select = event.target;
                select.classList.add('active');
                const removeActiveClass = () => select.classList.remove('active');
                select.addEventListener('mouseleave', removeActiveClass, {once: true});
                body.addEventListener('click', removeActiveClass, {once: true});
            }
        });
    });
}

function addEventsToDownloadResumes() {
    const selectElements = document.querySelectorAll('ul.download-cv a');
    selectElements.forEach(anchor => {
        anchor.addEventListener('click', event => {
            event.preventDefault();
            window.location.href = event.target.href + '?download';
        });
    });
}

window.addEventListener('load', () => {
    updateDefaultLocale();
    registerServiceWorker();
    addEventsToResumesSelects();
    addEventsToDownloadResumes();
});
