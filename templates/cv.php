<?php
/**
 * @var string $locale
 * @var stdClass $trans
 */
?><!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <title><?= $trans->page->title ?></title>

    <!-- le metatags -->
    <meta name="description" content="<?= $trans->page->description ?>">
    <meta name="keywords" content="<?= $trans->page->keywords ?>">
    <meta charset="utf-8">
    <link rel="canonical" href="https://afonso.dev/cv/<?= $locale ?>">

    <!-- le languages -->
    <link rel="alternate" hreflang="en" href="https://afonso.dev/cv/en">
    <link rel="alternate" hreflang="es" href="https://afonso.dev/cv/es">
    <link rel="alternate" hreflang="pt" href="https://afonso.dev/cv/pt">

    <!-- le opengraph tags -->
    <meta property="og:type" content="profile">
    <meta property="profile:first_name" content="Afonso">
    <meta property="profile:last_name" content="de Mori">
    <meta property="profile:gender" content="male">
    <meta property="article:modified_time" content="<?= date(DATE_ATOM) ?>">
    <meta property="article:expiration_time" content="<?= date('Y-m-d\T00:00:00P', strtotime('next month')) ?>">
    <meta property="og:title" content="<?= $trans->page->title ?>">
    <meta property="og:description" content="<?= $trans->page->description ?>">
    <meta property="og:image" content="https://afonso.dev/assets/images/og-image-<?= $locale ?>.jpg">

    <!-- le stylesheets -->
    <link rel="stylesheet" href="/assets/css/cv-all.css?v=<?= time() ?>" media="all">
    <link rel="stylesheet" href="/assets/css/cv-screen.css?v=<?= time() ?>" media="screen">
    <link rel="stylesheet" href="/assets/css/cv-print.css?v=<?= time() ?>" media="print">

    <!-- le mobile -->
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5, width=device-width">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
<div id="top-bar" class="fixed">
    <nav>
        <ul class="left">
            <li><a href="/<?= $locale ?>"><?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-left-solid.svg') ?> afonso.dev</a></li>
        </ul>
        <ul class="right">
            <li><a id="nav-print" href="javascript:"><?= $trans->topBar->print ?></a></li>
            <li><a id="nav-modal-download" href="javascript:"><?= $trans->topBar->download ?> <?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-down-solid.svg') ?></a></li>
            <li><a id="nav-modal-languages" href="javascript:"><?= $trans->topBar->locale ?> <?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-down-solid.svg') ?></a></li>
        </ul>
    </nav>
    <div style="clear: both;"></div>
</div>
<div id="modal-download" class="modal">
    <ul>
        <?php foreach ($trans->topBar->downloadFormats as $extension => $label): ?>
            <?php
            $baseName = "cv-$locale-afonso_de_mori";
            $date = date('Y-m');
            $realFilename = "$baseName.$extension";
            $downloadFilename = "$baseName-$date.$extension";
            ?>
            <li><a href="/docs/<?= $realFilename ?>" download="<?= $downloadFilename ?>"><?= $label ?> (.<?= $extension ?>)</a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="modal-languages" class="modal">
    <ul>
        <?php foreach ($trans->topBar->localeOptions as $option): ?>
            <li><a href="<?= $option->link ?>"><?= $option->label ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<article class="page">
    <section class="contact">
        <h1>Afonso de Mori Ayres da Silva</h1>
        <p class="screen-only screen-mobile">&nbsp;</p>
        <p><?= $trans->contact->headline ?></p>
        <p>&nbsp;</p>
        <div class="contact">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 417.1c-16.38 0-32.88-4.1-46.88-15.12L0 250.9v213.1C0 490.5 21.5 512 48 512h416c26.5 0 48-21.5 48-47.1V250.9l-209.1 151.1C288.9 412 272.4 417.1 256 417.1zM493.6 163C484.8 156 476.4 149.5 464 140.1v-44.12c0-26.5-21.5-48-48-48l-77.5 .0016c-3.125-2.25-5.875-4.25-9.125-6.5C312.6 29.13 279.3-.3732 256 .0018C232.8-.3732 199.4 29.13 182.6 41.5c-3.25 2.25-6 4.25-9.125 6.5L96 48c-26.5 0-48 21.5-48 48v44.12C35.63 149.5 27.25 156 18.38 163C6.75 172 0 186 0 200.8v10.62l96 69.37V96h320v184.7l96-69.37V200.8C512 186 505.3 172 493.6 163zM176 255.1h160c8.836 0 16-7.164 16-15.1c0-8.838-7.164-16-16-16h-160c-8.836 0-16 7.162-16 16C160 248.8 167.2 255.1 176 255.1zM176 191.1h160c8.836 0 16-7.164 16-16c0-8.838-7.164-15.1-16-15.1h-160c-8.836 0-16 7.162-16 15.1C160 184.8 167.2 191.1 176 191.1z"/></svg>
                <a href="/contact/<?= $locale ?>">me@afonso.dev</a>
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"/></svg>
                +34 602 443 854
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                <a target="_blank" rel="noopener" href="https://www.linkedin.com/in/afonsodemori/">linkedin.com/in/afonsodemori</a>
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                <a target="_blank" rel="noopener" href="https://www.github.com/afonsodemori">github.com/afonsodemori</a>
            </span>
        </div>
    </section>

    <p class="div">&nbsp;</p>

    <section class="profile">
        <h2><?= $trans->profile->title ?></h2>
        <p><?= $trans->profile->description ?></p>
    </section>

    <p class="div">&nbsp;</p>

    <section class="experience">
        <h2><?= $trans->experience->title ?></h2>

        <?php foreach ($trans->experience->jobs as $job): ?>
            <h3><?= $job->title ?><?php if ($job->company): ?><span class="screen-desktop">, </span><span class="screen-mobile"></span><span><?= $job->company ?></span><?php endif; ?></h3>
            <?php
            if ($job->period instanceof stdClass) {
                $job->period = \App\Helper\CliHelper::calculatePeriod($job->period->start, $job->period->end, $trans);
            }
            ?>
            <p class="period"><?= $job->period ?><?php if (!empty($job->location)): ?><span class="screen-desktop"> | </span><span class="screen-mobile"></span><?= $job->location ?><?php endif; ?></p>
            <?= $job->description ?>
            <p>&nbsp;</p>
            <hr class="screen-only screen-mobile">
        <?php endforeach ?>

        <h3><?= $trans->experience->previous ?></h3>
        <ul class="previous">
            <?php foreach ($trans->experience->previousJobs as $job): ?>
                <li><u><?= $job->title ?></u>, <?= $job->company ?>, <span class="gray"><?= $job->period ?></span></li>
            <?php endforeach ?>
        </ul>
    </section>

    <p class="div">&nbsp;</p>

    <section class="education">
        <h2><?= $trans->education->title ?></h2>
        <h3><?= $trans->education->what ?></h3>
        <p class="period"><?= $trans->education->when ?></p>
        <?= $trans->education->how ?>
    </section>

    <p class="div">&nbsp;</p>

    <section class="languages">
        <h2><?= $trans->languages->title ?></h2>
        <ul>
            <?php foreach ($trans->languages->list as $l): ?>
                <li><strong><?= $l->name ?></strong> – <?= $l->level ?>.</li>
            <?php endforeach ?>
        </ul>
    </section>

    <p class="div">&nbsp;</p>

    <section class="courses">
        <h2><?= $trans->courses->title ?></h2>
        <?= $trans->courses->list ?>
    </section>

    <p class="div">&nbsp;</p>

    <section class="skills">
        <h2><?= $trans->skills->title ?></h2>
        <?= $trans->skills->list ?>
    </section>
</article>
<footer>
    <p>
        <span class="screen-only"><?= $trans->footer->updated ?>:</span>
        <?= $trans->footer->months[date('n') - 1] ?>/<?= date('Y') ?>
        <span class="print">
            — <a href="https://afonso.dev/cv/<?= $locale ?>">https://afonso.dev/cv/<?= $locale ?></a>
        </span>
    </p>
</footer>
<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
<script src="/assets/js/cv.js?v=<?= time() ?>"></script>
</body>
</html>
