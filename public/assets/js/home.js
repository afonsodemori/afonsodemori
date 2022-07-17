console.log('You want to hire me! https://afonso.dev/linkedin :)');

if (navigator.serviceWorker) {
    navigator.serviceWorker.register('/sw.js').then(function () {
        console.debug('SW: Register');
    }).catch(console.log);
}

if (window.location.host === 'afonso.dev') {
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-96464697-1', 'auto');
    ga('send', 'pageview');
}

$('select.locale').on('change', function () {
    let locale = this.value;
    let pathname = window.location.pathname.split('/');
    pathname.pop();
    pathname = pathname.join('/');

    let location = `/${locale}${window.location.search}${window.location.hash}`;

    if (pathname !== '') {
        location = `${pathname}${location}`;
    }

    console.log(locale);
    console.log(pathname);
    console.log(location);

    window.location = location;
});

$('nav a').on('click', function (e) {
    let target = $(this).attr('href');

    if (target.substr(0, 1) === '#' && $('section#' + target.substr(1)).length === 1) {
        e.preventDefault();

        window.scroll({
            top: $(target).position().top,
            left: 0,
            behavior: 'smooth'
        });
    }
});

function updateGA() {
    if (typeof ga !== 'undefined') {
        let location = window.location;
        ga('set', 'page', location.pathname + location.hash);
        ga('send', 'pageview');
    }
}

function updateLocation(section) {
    let location = '#' + section;

    if (section === 'about') {
        location = window.location.pathname;
    }

    $('nav a, nav img').removeClass('active');
    $('a.' + section).addClass('active');
    if (section === 'about') {
        $('nav img').addClass('active');
    }
    window.history.replaceState(null, null, location);
    updateGA();
}

function getSection() {
    let hash = window.location.hash;

    let section = {
        'name': hash.substr(1).split('/')[0],
        'location': hash,
        'sub': null
    };

    if (hash === '') {
        section.name = 'about';
    }

    if (hash.indexOf('/') !== -1) {
        section.sub = hash.split('/')[1];
    }

    return section;
}

$(window).on('load', () => {
    let section = getSection();

    if (section.sub) {
        $('#courses .tags .' + section.sub).trigger('click');
        window.location.hash = section.name;
        window.location.hash = section.location;
    }

    $('a.' + section.name).addClass('active');
    if (section.name === 'about') {
        $('nav img').addClass('active');
    }

    $(window).on('scroll', () => {
        let scroll = window.scrollY + 150;
        let sections = ['contact', 'courses', 'skills', 'experience', 'about'];

        for (let i = 0; i < sections.length; i++) {
            let section = sections[i];
            if (scroll >= $('#' + section).position().top) {
                if (getSection().name !== section) {
                    updateLocation(section);
                }
                break;
            }
        }
    });
});

$('div.hamburger').on('click', () => {
    $('div.hamburger').hide();
    $('nav')
        .addClass('expanded')
        .removeClass('colored');
    $('nav img').fadeIn();
    $('nav ul').fadeIn();
    $('nav select').fadeIn();

    setTimeout(() => {
        $('nav.expanded a').one('click', () => {
            $('div.hamburger').css('display', '');
            $('nav img').css('display', '');
            $('nav ul').css('display', '');
            $('nav select').css('display', '');
            $('nav').removeClass('expanded');

            setTimeout(() => {
                $('nav').addClass('colored');
            }, 200);
        });
    }, 200);

    return false;
});

$('#courses .tags a').on('click', function () {
    let $this = $(this);
    $('#courses .tags a').removeClass('badge-dark');
    $this.addClass('badge-dark');
    $('#courses ul li').hide();
    $('#courses ul li.' + $this.attr('href').substr(9)).slideDown(200);
});
