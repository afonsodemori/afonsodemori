function isValidHash(hash = null) {
    if (hash === null) hash = window.location.hash.substring(1);
    if (hash === "") return false;
    // Look for a header for the course
    let isValidHash = $(`#${hash}`).length === 1;
    console.debug("Is valid hash?", isValidHash);
    return isValidHash;
}

$(document).ready(() => {
    if (isValidHash()) {
        let course = window.location.hash.substring(1);
        displayCourse(course, true);
    }
});

function displayCourse(course, scrollToContent = false) {
    console.debug("Course:", course);

    let $tagLi = $(`.tags li.${course}`);
    let $tagAnchor = $(`.tags li.${course} a`);

    if ($tagAnchor.hasClass("active")) {
        console.debug(`Hiding ${course}...`);
        $tagAnchor.removeClass("active");
        $("section.course").slideUp(200);

        window.setTimeout(() => {
            $("header.course").slideUp(200);
        }, 100);

        window.history.replaceState(null, null, window.location.pathname);

        return false;
    }

    if ($tagLi.hasClass("hidden")) {
        console.debug("Rendering hidden course...");
        $tagLi.removeClass("hidden");
        $tagAnchor.removeClass("hidden");
    }

    $('.tags a').removeClass("active");
    $tagAnchor.addClass("active");
    $(".course").hide();
    $(`header.course-${course}`).slideDown(200);

    window.setTimeout(() => {
        $(`section.course-${course}`).slideDown(400);
    }, 200);

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
    console.debug(`Clicked: ${course}`);
    displayCourse(course);
});

$('.course li a').on('click', function (event) {
    let parts = this.href.split('#');

    // TODO: Refactor to scroll to course and certificates with the same code
    if (parts.length === 2) {
        event.preventDefault();

        let element = $(`#${parts[1]}`);

        window.scrollTo({
            top: element.position().top,
            left: 0,
            behavior: 'smooth'
        });
    }
});
