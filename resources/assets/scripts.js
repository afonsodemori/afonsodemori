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
