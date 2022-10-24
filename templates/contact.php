<?php
/**
 * @var string $locale
 * @var stdClass $trans
 */
?><!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <title><?= $trans->metas->title ?> ‹ afonso.dev</title>

    <!-- le metatags -->
    <meta name="description" content="<?= $trans->metas->description ?>">
    <meta name="keywords" content="<?= $trans->metas->keywords ?>">
    <meta charset="utf-8">
    <link rel="canonical" href="https://afonso.dev/contact/<?= $locale ?>">

    <!-- le opengraph tags -->
    <meta property="og:title" content="<?= $trans->metas->title ?> ‹ afonso.dev">
    <meta property="og:description" content="<?= $trans->metas->description ?>">
    <meta property="og:image" content="https://afonso.dev/assets/images/photo-og.jpg">

    <!-- le languages -->
    <link rel="alternate" hreflang="en" href="https://afonso.dev/contact/en">
    <link rel="alternate" hreflang="es" href="https://afonso.dev/contact/es">
    <link rel="alternate" hreflang="pt" href="https://afonso.dev/contact/pt">

    <!-- le stylesheets -->
    <link rel="stylesheet" href="/assets/css/contact.css?v=<?= time() ?>" media="all">

    <!-- le mobile -->
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5, width=device-width">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
<div id="top-bar">
    <nav>
        <ul class="left">
            <li><a href="/<?= $locale ?>"><?= file_get_contents(__DIR__ . '/../resources/assets/images/angle-left-solid.svg') ?> afonso.dev</a></li>
        </ul>
        <ul class="right">
            <li><a id="link-cv" href="/cv/<?= $locale ?>">Curriculum</a></li>
            <li><a id="link-in" target="_blank" href="/linkedin">LinkedIn</a></li>
            <li><a id="link-wa" target="_blank" href="/whatsapp">WhatsApp</a></li>
        </ul>
    </nav>
    <div style="clear: both;"></div>
</div>

<iframe src="https://docs.google.com/forms/d/e/1FAIpQLScH7JyonwEGfMGvMIGV-ZBTk8bSAi0-7W3Fq2QnZRivwBbcEw/viewform?embedded=false"
        style="width: 100vw; height: 95vh; margin: 0; padding: 0; border: 0;">Loading…
</iframe>
<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
</body>
</html>
