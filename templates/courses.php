<?php
/**
 * @var \App\Model\Certificate $certificate
 * @var \App\Model\Course $course
 * @var stdClass $trans
 * @var string $locale
 */
?><!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <title><?= $trans->metas->title ?> ‹ Afonso de Mori</title>

    <!-- le meta-tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="https://afonso.dev/courses/<?= $locale ?>">

    <!-- le languages -->
    <link rel="alternate" hreflang="en" href="https://afonso.dev/courses/en">
    <link rel="alternate" hreflang="es" href="https://afonso.dev/courses/es">
    <link rel="alternate" hreflang="pt" href="https://afonso.dev/courses/pt">

    <!-- le stylesheets -->
    <link rel="stylesheet" href="/assets/css/shared.css?v=<?= time() ?>" media="screen">
    <link rel="stylesheet" href="/assets/css/courses.css?v=<?= time() ?>" media="screen">
    <link rel="stylesheet" href="/assets/css/courses-print.css?v=<?= time() ?>" media="print">
    <link rel="stylesheet" href="/assets/webfonts/inter.css" media="screen">

    <!-- In case the CSS does not load -->
    <style>svg { height: 10pt; vertical-align: middle; }</style>

    <!-- le mobile -->
    <link rel="apple-touch-icon" href="/assets/icons/favicon-192.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5, width=device-width">
    <meta name="theme-color" content="#030931">
    <link rel="manifest" href="/app.manifest">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
<div id="top-bar" class="courses fixed">
    <nav>
        <ul class="left">
            <li><a href="/<?= $locale ?>"><?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-left-solid.svg') ?> afonso.dev</a></li>
        </ul>
        <ul class="right">
            <li id="nav-cv"><a href="/cv/<?= $locale ?>">Curriculum</a></li>
            <li id="nav-modal-languages">
                <a href="javascript:"><?= $trans->topBar?->locale ?> <?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-down-solid.svg') ?></a>
                <ul id="modal-languages" class="modal">
                    <?php foreach ($trans->topBar->localeOptions as $option): ?>
                        <li><a href="<?= $option->link ?>"><?= $option->label ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </nav>
    <div style="clear: both;"></div>
</div>

<section class="last-courses">
    <p><strong><?= $trans->page->title ?></strong></p>
    <ul class="tags">
        <?php foreach ($trans->courses as $course): ?>
            <li class="<?= $course->id ?> <?php if ($course->isHidden): ?>hidden<?php endif; ?>">
                <a href="#<?= $course->id ?>"><?= $course->name ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php foreach ($trans->courses as $course): ?>

    <header id="<?= $course->id ?>" class="course course-<?= $course->id ?>">
        <h1><?= $course->name ?></h1>
        <?php if ($course->about): ?><p><?= $course->about ?></p><?php endif; ?>
    </header>

    <?php if ($course->topics): ?>
    <section class="course course-<?= $course->id ?>">
        <h2><?= $trans->page->syllabus ?></h2>
        <ol class="summary">
            <?php foreach ($course->topics as $topic): ?>
            <li><?= $topic ?></li>
            <?php endforeach; ?>
        </ol>
    </section>
    <?php endif; ?>

    <?php if (!empty($course->certificates)): ?>
        <section class="course course-<?= $course->id ?>">
            <h2><?= $trans->page->certificates ?></h2>
            <ol class="summary">
                <?php foreach ($course->certificates as $certificate): ?>
                    <li><a href="#<?= $certificate->id ?>"><?= $certificate->title ?></a> (<?= $certificate->durationString ?>)</li>
                <?php endforeach; ?>
            </ol>
        </section>
    <?php endif; ?>

    <?php foreach ($course->certificates as $certificate): ?>
        <section id="<?= $certificate->id ?>" class="course course-<?= $course->id ?>">
            <h2><?= $certificate->title ?></h2>
            <?php foreach ($certificate->images as $image): ?>
            <figure class="certificate">
                <a href="<?= $certificate->link ?>" target="_blank">
                    <img src=""
                         data-src="<?= $image ?>"
                         class="placeholder"
                         alt="<?= $trans->page->certificate ?>: <?= $certificate->title ?>"
                         title="<?= $trans->page->checkAuthenticity ?>">
                </a>
                <figcaption>
                    <strong><?= $trans->page->authenticity ?>:</strong>
                    <a
                            href="<?= $certificate->link ?>"
                            target="_blank"
                            title="<?= $trans->page->checkAuthenticity ?>"><?= $certificate->link ?></a>
                </figcaption>
            </figure>
            <?php endforeach; ?>
        </section>
    <?php endforeach ?>
<?php endforeach ?>

<footer>
    <p>Afonso de Mori Ayres da Silva</p>
    <ul>
        <li><a href="/">afonso.dev</a></li>
        <li><a href="/github" target="_blank">GitHub</a></li>
        <li><a href="/linkedin" target="_blank">LinkedIn</a></li>
    </ul>
</footer>

<div class="backlight"></div>

<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
<script src="/assets/js/courses.js?v=<?= time() ?>"></script>
</body>
</html>
