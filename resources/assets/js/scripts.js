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
            const fileUrl = `${event.target.value}?download`;

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

const div = document.querySelector('div.cv-select-download');

if (div) {
    let elements = [];

    elements.push(div.children.item(0));

    for (let ul = 1; ul <= 3; ul++) {
        const selectText = div.children.item(ul).children.item(0).firstChild.nodeValue;
        const options = div.children.item(ul).children.item(0).children.item(0).children;

        const select = document.createElement('div');
        select.classList.add('custom-select');

        const span = document.createElement('span');
        span.classList.add('selected-option');
        if (ul === 1) span.classList.add('primary');
        span.textContent = `${selectText} ▾`;
        select.appendChild(span);

        const trueSelect = document.createElement('select');
        trueSelect.classList.add('download-cv');
        trueSelect.ariaLabel = selectText;

        const disabledOption = document.createElement('option');
        disabledOption.selected = true;
        disabledOption.disabled = true;
        disabledOption.value = '';
        disabledOption.text = options.item(0).firstChild.nodeValue;
        trueSelect.appendChild(disabledOption);

        for (let option = 1; option <= 3; option++) {
            const option1 = options.item(option);
            const optionNode = document.createElement('option');
            optionNode.value = new URL(option1.firstChild.href).pathname;
            optionNode.text = option1.firstChild.textContent;
            trueSelect.appendChild(optionNode);
        }

        select.appendChild(trueSelect);
        elements.push(select);
    }

    div.replaceWith(...elements);
}
