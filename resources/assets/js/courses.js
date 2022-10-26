$(document).ready(() => {
    let course = window.location.hash.substring(1);

    if (window.location.hash !== '') {
        window.setTimeout(() => {
            $(`.tags a.${course}`).trigger('click');

            window.setTimeout(() => {
                let parts = window.location.href.split('#');
                let element = $(`#${parts[1]}`);
                console.log(element);
                window.scrollTo({
                    top: element.position().top,
                    left: 0,
                    behavior: 'smooth'
                });
            }, 500);

        }, 200);
    }
});

$('.tags a').on('click', function (event) {
    event.preventDefault();

    if ($(this).hasClass('active')) {
        $('.tags a').removeClass('active');
        $('section.course').slideUp(200);
        window.setTimeout(() => {
            $('header.course').slideUp(200);
        }, 100);
        window.history.replaceState(null, null, window.location.pathname);
        return false;
    }

    let course = $(this).attr('href').substring(1);
    $('.tags a').removeClass('active');
    $(this).addClass('active');

    $('.course').hide();
    $(`header.course-${course}`).slideDown(200);

    window.setTimeout(() => {
        $(`section.course-${course}`).slideDown(400);
    }, 200);

    $(`section.course-${course} img`).each(function () {
        let $img = $(this);
        if ($img.hasClass('placeholder')) {
            $img.attr('src', $img.data('src'));
            $img.removeAttr('data-src');
            $img.on('load', function () {
                $img.removeClass('placeholder');
            });
        }
    });

    window.history.replaceState(null, null, `#${course}`);
});

$('.course li a').on('click', function (event) {
    let parts = this.href.split('#');

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
