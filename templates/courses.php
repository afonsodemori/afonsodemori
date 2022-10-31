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

    <!-- le metatags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <link rel="canonical" href="https://afonso.dev/courses/es">

    <!-- le languages -->
    <link rel="alternate" hreflang="en" href="https://afonso.dev/courses/en">
    <link rel="alternate" hreflang="es" href="https://afonso.dev/courses/es">
    <link rel="alternate" hreflang="pt" href="https://afonso.dev/courses/pt">

    <!-- le mobile -->
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/css/courses.css?v=<?= time() ?>" media="screen">
    <link rel="stylesheet" href="/assets/css/courses-print.css?v=<?= time() ?>" media="print">
</head>
<body>

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
    <ul class="languages">
        <li><a href="/courses/en" title="English version">English</a></li>
        <li><a href="/courses/es" title="Versión en Español">Español</a></li>
        <li><a href="/courses/pt" title="Versão em Português">Português</a></li>
    </ul>
    <p>Afonso de Mori Ayres da Silva</p>
    <ul>
        <li><a href="/">afonso.dev</a></li>
        <li><a href="/github" target="_blank">GitHub</a></li>
        <li><a href="/linkedin" target="_blank">LinkedIn</a></li>
    </ul>
</footer>

<div class="backlight"></div>

<script src="/assets/js/jquery.js?v=<?= time() ?>"></script>
<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
<script src="/assets/js/courses.js?v=<?= time() ?>"></script>
</body>
</html>
