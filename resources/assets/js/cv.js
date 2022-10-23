function hideModals() {
    document.querySelectorAll('.modal').forEach(e => {
        e.style.display = '';
    });
    document.querySelectorAll('nav a').forEach(e => {
        e.classList.remove('active');
    });
    document.removeEventListener('click', hideModals);
}

function showModal(modal) {
    let button = document.getElementById(`nav-modal-${modal}`);
    let element = document.getElementById(`modal-${modal}`);

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

    window.setTimeout(function () {
        document.addEventListener('click', hideModals);
    }, 50);
}

window.addEventListener('load', () => {
    try {
        document.getElementById('nav-print').addEventListener('click', () => {
            print();
        });
        document.getElementById('nav-modal-download').addEventListener('click', () => {
            showModal('download');
        });
        document.getElementById('nav-modal-languages').addEventListener('click', () => {
            showModal('languages');
        });
    } catch (ignored) {
    }
});
