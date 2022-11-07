let timeouts = [];

function isValidHash(hash = null) {
    if (hash === null) hash = window.location.hash.substring(1);
    if (hash === "") return false;
    // Look for a header for the course
    return $(`#${hash}`).length === 1;
}

$(document).ready(() => {
    if (isValidHash()) {
        const course = window.location.hash.substring(1);
        toggleCourse(course, true);
    } else {
        window.history.replaceState(null, null, window.location.pathname);
    }
});

onhashchange = () => {
    hideModals();
    if (isValidHash()) {
        let course = window.location.hash.substring(1);
        toggleCourse(course, true);
    } else {
        hideCourses();
    }
};

function hideCourses() {
    $(".tags a").removeClass("active");
    $("section.course").stop().slideUp(200);

    timeouts.push(window.setTimeout(() => {
        $("header.course").stop().slideUp(200);
    }, 100));

    window.history.replaceState(null, null, window.location.pathname);
}

function scrollToElement(element, wait = 0) {
    window.setTimeout(() => {
        const topBar = document.getElementById('top-bar');
        // +2 refers to the border width. todo: how to get it programmatically?
        const topBarHeight = topBar.classList.contains('fixed') ? topBar.clientHeight + 2 : 0;
        window.scrollTo({
            top: element.position().top - topBarHeight,
            left: 0,
            behavior: 'smooth'
        });
    }, wait);
}

function toggleCourse(course, scrollToContent = false) {
    (timeouts ?? []).forEach(timeout => clearTimeout(timeout));
    timeouts = [];

    const $tagLi = $(`.tags li.${course}`);
    const $tagAnchor = $(`.tags li.${course} a`);

    if ($tagAnchor.hasClass('active')) {
        hideCourses();
        return;
    }

    if ($tagLi.hasClass("hidden")) {
        $tagLi.removeClass("hidden");
        $tagAnchor.removeClass("hidden");
    }

    $('.tags a').removeClass('active');
    $tagAnchor.addClass('active');
    $('.course').hide();
    const headerSlideDownDuration = 200;
    $(`header.course-${course}`).stop().slideDown(headerSlideDownDuration);

    timeouts.push(window.setTimeout(() => {
        const courseSlideDownDuration = 400;
        $(`section.course-${course}`).stop().slideDown(courseSlideDownDuration);

        if (scrollToContent) {
            const parts = window.location.href.split('#');
            const element = $(`#${parts[1]}`);
            scrollToElement(element, courseSlideDownDuration + 100);
        }
    }, headerSlideDownDuration));

    $(`section.course-${course} img`).each(function () {
        const $img = $(this);
        if ($img.hasClass('placeholder')) {
            $img.attr('src', $img.data('src'));
            $img.removeAttr('data-src');
            $img.on('load', function () {
                $img.removeClass("placeholder");
            });
        }
    });

    window.history.replaceState(null, null, `#${course}`);
}

$(".tags a").on("click", function (event) {
    event.preventDefault();
    let course = $(this).attr("href").substring(1);
    toggleCourse(course);
});

$(".course li a").on("click", function (event) {
    const parts = this.href.split('#');

    if (parts.length === 2) {
        event.preventDefault();
        const element = $(`#${parts[1]}`);
        scrollToElement(element);
    }
});

document.querySelector('#top-bar #nav-modal-languages a').addEventListener('click', () => {
    const url = new URL(window.location);
    document.querySelectorAll('#top-bar #nav-modal-languages ul.modal a').forEach(element => {
        let elementUrl = new URL(element.href);
        elementUrl.hash = url.hash;
        element.href = elementUrl;
    })
});
