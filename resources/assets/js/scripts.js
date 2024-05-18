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

function replaceLowQualityResumes() {
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

function addEventsToResumesSelects() {
    document.querySelectorAll('.selected-option').forEach(element => {
        element.addEventListener('click', event => {
            const active = document.querySelector('.selected-option.active');

            if (active) {
                active.classList.remove('active')
            } else {
                const select = event.target;
                select.classList.add('active');
                select.addEventListener('mouseleave', () => {
                    select.classList.remove('active');
                });
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
    replaceLowQualityResumes();
    addEventsToResumesSelects();
    addEventsToDownloadResumes();
});
