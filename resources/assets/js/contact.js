window.addEventListener('load', () => {
    let success = document.getElementById('success');
    let iframe = document.getElementById('iframe');
    let form = document.getElementById('form');

    form.addEventListener('submit', () => {
        document.getElementById('form').style.opacity = '.5';
        document.getElementById('name').readOnly = true;
        document.getElementById('email').readOnly = true;
        document.getElementById('message').readOnly = true;

        let btnSubmit = document.getElementById('submit');
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = btnSubmit.getAttribute('data-submitted');

        iframe.addEventListener('load', () => {
            document.querySelectorAll('header, section').forEach(e => {
                e.style.display = 'none';
            })
            success.style.display = 'block';
            window.setTimeout(() => {
                success.style.opacity = '1';
                success.style.paddingTop = '3em';
            }, 10);
        });
    })
});
