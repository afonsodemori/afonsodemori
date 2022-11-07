const availableLanguages = ['en', 'es', 'pt'];
const url = new URL(window.location);

function checkMainDomainConnectivity() {
    const keepDomain = url.searchParams.get('keepDomain');
    if (keepDomain !== null) {
        localStorage.setItem('keepDomain', (keepDomain !== '0').toString());
    }

    if (
        url.host !== 'afonso.dev'
        && localStorage.getItem('keepDomain') !== 'true'
    ) {
        fetch('https://afonso.dev/health-check.html')
            .then(response => {
                if (response.status !== 200) {
                    console.debug("Can't connect.");
                    return;
                }

                console.debug('Connected to afonso.dev.');
                window.location = `https://afonso.dev${window.location.pathname}${window.location.hash}`;
            })
            .catch(() => {
                console.log('Can\'t connect for whatever reason.');
            });
    }
}

function hideModals() {
    document.querySelectorAll('.modal').forEach(element => {
        element.style.display = '';
    });
    document.querySelectorAll('nav a').forEach(element => {
        element.classList.remove('active');
    });
    document.removeEventListener('click', hideModals);
}

function showModal(modal) {
    const button = document.querySelector(`#nav-modal-${modal} a`);
    const element = document.querySelector(`#nav-modal-${modal} .modal`);

    if (element.style.display === 'block') {
        return;
    }

    hideModals();
    button.classList.add('active');
    element.style.display = 'block';
    element.style.top = `${button.offsetHeight}px`;

    if (button.offsetLeft + element.offsetWidth < window.innerWidth) {
        element.style.left = `${button.offsetLeft}px`;
    } else {
        element.style.left = `${button.offsetLeft + button.offsetWidth - element.offsetWidth}px`;
    }

    window.setTimeout(() => {
        document.addEventListener('click', hideModals);
    }, 50);
}

function addTopBarListeners() {
    let element;

    if ((element = document.getElementById('nav-print')) !== null) {
        element.addEventListener('click', () => {
            print();
        });
    }

    if ((element = document.getElementById('nav-modal-download')) !== null) {
        element.addEventListener('click', () => {
            showModal('download');
        });
    }

    if ((element = document.getElementById('nav-modal-languages')) !== null) {
        element.addEventListener('click', () => {
            showModal('languages');
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
    addTopBarListeners();
    registerServiceWorker();
});
