if (navigator && navigator.serviceWorker) {
    navigator.serviceWorker.register('/service-worker.js');
}

function checkDevDomainConnectivity() {
    const domain = window.location.host;

    if (
        domain !== 'afonso.dev'
        && !domain.startsWith('192')
        && !domain.endsWith('localhost')
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

checkDevDomainConnectivity();

const defaultLanguage = 'es'; // mostly looking for spanish-speaking companies for now...
const availableLanguages = ['en', 'es', 'pt'];

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = 'expires=' + d.toUTCString();
    document.cookie = `${cname}=${cvalue};${expires};path=/;SameSite=Strict`;
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');

    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }

    return null;
}

function getBrowserPreferredLanguage() {
    let navigatorLanguages = navigator.languages;
    console.debug('Browser languages: ', navigatorLanguages);

    for (let i = 0; i < navigatorLanguages.length; i++) {
        let language = navigatorLanguages[i].split('-')[0];
        if (availableLanguages.includes(language)) {
            console.debug('Match: "%s"', language);
            return language;
        }
    }

    console.debug('None of the browser languages match with the available ones');
    return null;
}

function generateLocation(newLocale) {
    let pathname = window.location.pathname.split('/');
    let currentLocale = pathname.pop();
    pathname = pathname.join('/');
    console.debug('Pathname: "%s"', pathname);

    let location = `/${newLocale}${window.location.search}${window.location.hash}`;

    if (pathname !== '') {
        location = `${pathname}${location}`;
    }

    console.debug('New location: "%s"', location);
    return location;
}

function loadLanguage(locale) {
    let redirect = locale => {
        window.location = generateLocation(locale);
    }

    if (availableLanguages.includes(locale)) {
        redirect(locale);
        return;
    }

    const savedLang = getCookie('locale');
    if (
        savedLang !== null
        && availableLanguages.includes(savedLang)
    ) {
        redirect(savedLang);
        return;
    }

    redirect(getBrowserPreferredLanguage() ?? defaultLanguage);
}

// Avoid saving locale for URLs without an explicit locale
if (availableLanguages.indexOf(window.location.pathname.slice(-2)) >= 0) {
    setCookie('locale', document.documentElement.lang, 365);
}
