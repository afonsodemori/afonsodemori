function disableForm() {
    document.getElementById('error').style.opacity = '0';
    document.getElementById('contact-form').style.opacity = '.5';
    document.getElementById('name').readOnly = true;
    document.getElementById('email').readOnly = true;
    document.getElementById('message').readOnly = true;

    const btnSubmit = document.getElementById('submit');
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = btnSubmit.getAttribute('data-submitted');
}

function enableForm() {
    document.getElementById('contact-form').style.opacity = 'unset';
    document.getElementById('name').readOnly = false;
    document.getElementById('email').readOnly = false;
    document.getElementById('message').readOnly = false;

    const btnSubmit = document.getElementById('submit');
    btnSubmit.disabled = false;
    btnSubmit.innerHTML = btnSubmit.getAttribute('data-submit');
}

function renderSuccess() {
    const success = document.getElementById('success');

    document.querySelectorAll('section').forEach(element => {
        element.style.display = 'none';
    });

    success.style.display = 'block';
    window.setTimeout(() => {
        success.style.opacity = '1';
        success.style.paddingTop = '3em';
    }, 10);
}

function renderError() {
    const error = document.getElementById('error');

    error.style.display = 'inline-block';
    window.setTimeout(() => {
        error.style.opacity = '1';
    }, 10);
}

window.addEventListener('load', () => {
    const form = document.getElementById('contact-form');

    form.addEventListener('submit', event => {
        event.preventDefault();
        disableForm();

        const formData = new FormData(event.target);
        let json = {};
        for (let field of formData.entries()) {
            json[field[0]] = field[1];
        }

        fetch(new Request(form.action, {
            method: 'POST',
            headers: {
                'content-type': 'application/json',
            },
            body: JSON.stringify(json),
        })).then(response => {
            if (response.status === 202) {
                renderSuccess();
            } else {
                enableForm();
                renderError();
            }
        });
    });
});
