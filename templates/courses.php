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
    <h1>Cursos</h1>
    <ul class="tags">
        <?php foreach ($trans->courses as $course): ?>
            <li><a href="#<?= $course->getId(); ?>" class="<?= $course->getId(); ?>"><?= $course->getName(); ?></a></li>
        <?php endforeach; ?>
    </ul>
</header>

<?php foreach ($trans->courses as $course): ?>

    <section id="<?= $course->getId(); ?>" class="course course-<?= $course->getId() ?> header">
        <h2><?= $course->getName(); ?></h2>

        <ol class="summary">
            <?php foreach ($course->getCertificates() as $certificate): ?>
                <li><a href="#<?= $certificate->getId(); ?>"><?= $certificate->getTitle(); ?></a> (<?= $certificate->getDurationString(); ?>)</li>
            <?php endforeach; ?>
        </ol>
    </section>

    <?php foreach ($course->getCertificates() as $certificate): ?>
        <section id="<?= $certificate->getId(); ?>" class="course course-<?= $course->getId() ?>">
            <h3><?= $certificate->getTitle(); ?></h3>
            <figure>
                <a href="<?= $certificate->getLink(); ?>" target="_blank">
                    <img src="" data-src="<?= $certificate->getImage(); ?>" class="placeholder" alt="Certificado: <?= $certificate->getTitle() ?>" title="Comprobar autenticidad">
                </a>
                <figcaption>
                    <strong>Autenticidad:</strong>
                    <a href="<?= $certificate->getLink(); ?>" target="_blank"><?= $certificate->getLink() ?></a>
                </figcaption>
            </figure>
        </section>
    <?php endforeach; ?>
<?php endforeach; ?>

<footer>
    Afonso de Mori Ayres da Silva<br>
    <a href="/">afonso.dev</a>
</footer>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/courses.js?v=<?= time() ?>"></script>
</body>
</html>
