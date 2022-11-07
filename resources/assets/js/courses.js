let timeouts = [];

function isValidHash(hash = null) {
    if (hash === null) hash = window.location.hash.substring(1);
    if (hash === "") return false;
    // Look for a header for the course
    return $(`#${hash}`).length === 1;
}

$(document).ready(() => {
    if (isValidHash()) {
        let course = window.location.hash.substring(1);
        toggleCourse(course, true);
    } else {
        window.history.replaceState(null, null, window.location.pathname);
    }
});

onhashchange = () => {
    hideModals();
    if (isValidHash()) {
        let course = window.location.hash.substring(1);
        toggleCourse(course);
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

function toggleCourse(course, scrollToContent = false) {
    (timeouts ?? []).forEach(timeout => clearTimeout(timeout));
    timeouts = [];

    let $tagLi = $(`.tags li.${course}`);
    let $tagAnchor = $(`.tags li.${course} a`);

    if ($tagAnchor.hasClass("active")) {
        hideCourses();
        return;
    }

    if ($tagLi.hasClass("hidden")) {
        $tagLi.removeClass("hidden");
        $tagAnchor.removeClass("hidden");
    }

    $('.tags a').removeClass("active");
    $tagAnchor.addClass("active");
    $(".course").hide();
    $(`header.course-${course}`).stop().slideDown(200);

    timeouts.push(window.setTimeout(() => {
        $(`section.course-${course}`).stop().slideDown(400);
    }, 200));

    if (scrollToContent) {
        // TODO: Refactor to scroll to course and certificates with the same code
        window.setTimeout(() => {
            window.setTimeout(() => {
                let parts = window.location.href.split('#');
                let element = $(`#${parts[1]}`);
                window.scrollTo({
                    top: element.position().top,
                    left: 0,
                    behavior: "smooth"
                });
            }, 500);

        }, 200);
    }

    $(`section.course-${course} img`).each(function () {
        let $img = $(this);
        if ($img.hasClass("placeholder")) {
            $img.attr("src", $img.data("src"));
            $img.removeAttr("data-src");
            $img.on("load", function () {
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
    let parts = this.href.split('#');

    // TODO: Refactor to scroll to course and certificates with the same code
    if (parts.length === 2) {
        event.preventDefault();

        let element = $(`#${parts[1]}`);

        window.scrollTo({
            top: element.position().top,
            left: 0,
            behavior: "smooth"
        });
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
