<?php
/**
 * @var \App\Model\Page\RedirectionPage $page
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $page->title ?></title>
    <meta http-equiv="refresh" content="0; url=<?= $page->url ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5, width=device-width">
    <!-- le opengraph tags -->
    <meta property="og:title" content="<?= $page->title ?>">
    <meta property="og:description" content="<?= $page->description ?>">
    <meta property="og:image" content="<?= $page->iconPath ?>">
</head>
<style>
    :root { --background: #37474f; --color: #263238; --light: #78909c; --lighter: #c1d5e0; }
    ::selection { background: var(--color) !important; color: var(--lighter) !important; }
    html, body { margin: 0; padding: 0; }
    body { font: normal 1em sans-serif; text-rendering: geometricPrecision; background: var(--background); color: var(--color); text-align: center; padding: 20vh 1em 1em; }
    h1 { margin: 0; font-weight: bold; font-style: italic; font-size: 2em; }
    p { display: inline-block; width: 100%; max-width: 1000px; color: var(--light); overflow: hidden; text-overflow: ellipsis; }
    p:hover { color: var(--lighter); }
    a, a strong, a:hover, a:hover strong { text-underline-position: under; text-decoration-thickness: 2px; }
    a { color: var(--light); white-space: nowrap; text-decoration-thickness: 1px; }
    a strong { color: var(--lighter); font-size: 1.5em; }
    a:hover, a:hover strong { color: var(--lighter); transition: 200ms; }
</style>
<body>
<h1>redirecting...</h1>
<p><a href="<?= $page->url ?>"><?= $page->printableUrl ?></a></p>
</body>
</html>
