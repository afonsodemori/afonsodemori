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
    <title><?= $trans->page->title ?> ‹ Afonso de Mori</title>

    <!-- le metatags -->
    <meta name="description" content="">
    <meta name="keywords" content="afonso, alfonso, mori, ayres, silva, demori, afonsodemori, afonsosilva89, php, software">
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
<header>
    <h1 class="drac-text-pink-purple"><?= $trans->page->title ?></h1>
    <ul class="tags">
        <?php foreach ($trans->courses as $course): ?>
            <li><a href="#<?= $course->id ?>" class="<?= $course->id ?>"><?= $course->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</header>

<?php foreach ($trans->courses as $course): ?>

    <section id="<?= $course->id ?>" class="course course-<?= $course->id ?> header" style="background: #111">
        <h2 class="drac-text-purple-cyan"><?= $course->name ?></h2>
    </section>

    <?php if ($course->topics): ?>
    <section class="course course-<?= $course->id ?> header">
        <h3><?= $trans->page->syllabus ?></h3>
        <ol class="summary">
            <?php foreach ($course->topics as $topic): ?>
            <li><?= $topic ?></li>
            <?php endforeach; ?>
        </ol>
    </section>
    <?php endif; ?>

    <section class="course course-<?= $course->id ?> header">
        <h3><?= $trans->page->certificates ?></h3>
        <ol class="summary">
            <?php foreach ($course->certificates as $certificate): ?>
                <li><a href="#<?= $certificate->id ?>"><?= $certificate->title ?></a> (<?= $certificate->durationString ?>)</li>
            <?php endforeach; ?>
        </ol>
    </section>

    <?php foreach ($course->certificates as $certificate): ?>
        <section id="<?= $certificate->id ?>" class="course course-<?= $course->id ?>">
            <h3><?= $certificate->title ?></h3>
            <?php foreach ($certificate->images as $image): ?>
            <figure class="certificate">
                <a href="<?= $certificate->link ?>" target="_blank">
                    <img src="" data-src="<?= $image ?>" class="placeholder" alt="Certificado: <?= $certificate->title ?>" title="Comprobar autenticidad">
                </a>
                <figcaption>
                    <strong><?= $trans->page->authenticity ?>:</strong>
                    <a href="<?= $certificate->link ?>" target="_blank"><?= $certificate->link ?></a>
                </figcaption>
            </figure>
            <?php endforeach; ?>
        </section>
    <?php endforeach ?>
<?php endforeach ?>

<footer>
    Afonso de Mori Ayres da Silva<br>
    <a href="/">afonso.dev</a>
</footer>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/courses.js?v=<?= time() ?>"></script>
</body>
</html>
