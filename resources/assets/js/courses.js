function isValidHash(hash = null) {
    if (hash === null) hash = window.location.hash.substring(1);
    if (hash === "") return false;
    // Look for a header for the course
    return document.querySelector(`#${hash}`) !== null;
}

function hideCourses() {
    document.querySelectorAll('.tags a').forEach(element => {
        element.classList.remove('active');
    });

    document.querySelectorAll('section.course').forEach(element => {
        element.style.display = 'none';
    });

    document.querySelectorAll('header.course').forEach(element => {
        element.classList.add('slideUp');
        window.setTimeout(() => {
            element.style.display = 'none';
            element.classList.remove('slideUp');
        }, 200);
    });

    window.history.replaceState(null, null, window.location.pathname);
}

function scrollToElement(element, wait = 0) {
    window.setTimeout(() => {
        const topBar = document.getElementById('top-bar');
        // +2 refers to the border width. todo: how to get it programmatically?
        const topBarHeight = topBar.classList.contains('fixed') ? topBar.clientHeight + 2 : 0;
        window.scrollTo({
            top: element.offsetTop - topBarHeight,
            left: 0,
            behavior: 'smooth'
        });
    }, wait);
}

function toggleCourse(course, scrollToContent = false) {
    // Using timeout to avoid navigating to the anchor before scrolling
    window.setTimeout(() => {
        const tagLi = document.querySelector(`.tags li.${course}`);
        const tagAnchor = document.querySelector(`.tags li.${course} a`);

        if (tagAnchor.classList.contains('active')) {
            hideCourses();
            return;
        }

        if (tagLi.classList.contains('hidden')) {
            tagLi.classList.remove('hidden');
        }

        document.querySelectorAll('.tags a').forEach(element => {
            element.classList.remove('active');
        });

        tagAnchor.classList.add('active');
        document.querySelectorAll('.course').forEach(element => {
            element.style.display = 'none';
        });

        document.querySelector(`header.course-${course}`).style.display = 'block';
        document.querySelectorAll(`section.course-${course}`).forEach(element => {
            element.style.display = 'block';
        });

        if (scrollToContent) {
            const parts = window.location.href.split('#');
            const element = document.querySelector(`#${parts[1]}`);
            scrollToElement(element, 200);
        }

        document.querySelectorAll(`section.course-${course} img`).forEach(element => {
            if (element.classList.contains('placeholder')) {
                element.src = element.dataset.src;
                delete element.dataset.src;
                element.addEventListener('load', event => {
                    element.classList.remove('placeholder');
                });
            }
        });
    }, 50);

    window.history.replaceState(null, null, `#${course}`);
}

document.querySelectorAll('.tags a').forEach(element => {
    element.addEventListener('click', event => {
        event.preventDefault();
        const course = new URL(element.href).hash.substring(1);
        toggleCourse(course);
    })
});

document.querySelectorAll('.course li a').forEach(element => {
    element.addEventListener('click', event => {
        const parts = element.href.split('#');

        if (parts.length === 2) {
            event.preventDefault();
            const element = document.querySelector(`#${parts[1]}`);
            scrollToElement(element);
        }
    });
});

document.querySelector('#top-bar #nav-modal-languages a').addEventListener('click', () => {
    const url = new URL(window.location);
    document.querySelectorAll('#top-bar #nav-modal-languages ul.modal a').forEach(element => {
        let elementUrl = new URL(element.href);
        elementUrl.hash = url.hash;
        element.href = elementUrl;
    })
});

onhashchange = () => {
    hideModals();
    if (isValidHash()) {
        const course = window.location.hash.substring(1);
        toggleCourse(course, true);
    } else {
        hideCourses();
    }
};

window.addEventListener('load', () => {
    if (isValidHash()) {
        const course = window.location.hash.substring(1);
        toggleCourse(course, true);
    } else {
        window.history.replaceState(null, null, window.location.pathname);
    }
});
