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
    <link rel="stylesheet" href="/assets/css/shared.css?v=<?= time() ?>" media="screen">
    <link rel="stylesheet" href="/assets/css/contact.css?v=<?= time() ?>" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=family=Inter:wght@300;500;700&display=swap" media="screen">

    <!-- le mobile -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
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

<header>
    <img src="/assets/images/photo.jpg" alt="Photo of Afonso de Mori">
    <div class="container">
        <h1><?= $trans->header[0] ?> <span><?= $trans->header[1] ?></span></h1>
    </div>
</header>
<section id="success">
    <div class="container">
        <h1><?= $trans->form->success[0] ?> <span><?= $trans->form->success[1] ?></span></h1>
    </div>
</section>
<section class="two">
    <div class="container">
        <form id="form" method="post" target="iframe"
              action="https://docs.google.com/forms/d/e/1FAIpQLScH7JyonwEGfMGvMIGV-ZBTk8bSAi0-7W3Fq2QnZRivwBbcEw/formResponse"
        >
            <div>
                <label for="name"><?= $trans->form->name->label ?>:</label>
                <input type="text" id="name" name="entry.585471277" required
                       placeholder="<?= $trans->form->name->placeholder ?>">
            </div>
            <div>
                <label for="email"><?= $trans->form->email->label ?>:</label>
                <input type="email" id="email" name="entry.60989062" required
                       placeholder="<?= $trans->form->email->placeholder ?>">
            </div>
            <div>
                <label for="message"><?= $trans->form->message->label ?>:</label>
                <textarea id="message" name="entry.1085040957" required
                          placeholder="<?= $trans->form->message->placeholder ?>"></textarea>
            </div>
            <button id="submit" data-submitted="<?= $trans->form->submitted ?>"><?= $trans->form->submit ?></button>
        </form>
    </div>
</section>
<iframe id="iframe" name="iframe" style="display: none;"></iframe>
<class class="backlight"></class>
<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
<script src="/assets/js/contact.js?v=<?= time() ?>"></script>
</body>
</html>
