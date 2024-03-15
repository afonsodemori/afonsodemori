/*
const languageAnchors = document.querySelectorAll('.language a');
const headers = document.querySelectorAll('header h2');
const paragraphs = document.querySelectorAll('article p');
const resumeDownloadLinks = document.querySelectorAll('footer .download-resume');

languageAnchors.forEach(anchor => {
    anchor.addEventListener('click', (event) => {
        event.preventDefault();

        const clickedLanguage = anchor.classList[0];

        languageAnchors.forEach(languageAnchor => {
            languageAnchor.classList.remove('hidden');
        });
        anchor.classList.add('hidden');

        headers.forEach(header => {
            header.classList.add('hidden');
        });
        document.querySelector(`header h2.${clickedLanguage}`).classList.remove('hidden');

        paragraphs.forEach(paragraph => {
            paragraph.classList.add('hidden');
        });
        document.querySelector(`article p.${clickedLanguage}`).classList.remove('hidden');

        resumeDownloadLinks.forEach(link => {
            link.classList.add('hidden');
        });
        document.querySelector(`footer a.${clickedLanguage}`).classList.remove('hidden');
    });
});
*/

const curtain = document.querySelector('#curtain');
const downloadLinks = document.querySelectorAll('footer .download-resume');

downloadLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        curtain.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });
});

curtain.addEventListener('click', () => {
    curtain.classList.add('hidden');
    document.body.style.overflow = 'auto';
});

const resume = document.querySelector('.download-resume');
resume.addEventListener('click', (e) => {
    e.preventDefault()
    curtain.style.display = 'flex';
    document.body.style.overflow = 'hidden';
});
