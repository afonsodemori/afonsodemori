<?php
/**
 * @var \App\Model\Page\RedirectionPage $page
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $page->title ?></title>
    <meta http-equiv="refresh" content="0; url=<?= $page->url ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

    <!-- le opengraph tags -->
    <meta property="og:title" content="<?= $page->title ?>">
    <meta property="og:description" content="<?= $page->description ?>">
    <meta property="og:image" content="<?= $page->iconPath ?>">

    <style>
        body {
            font-family: sans-serif;
            background-color: #1d1e26;
            color: #f2f2f2;
            text-rendering: geometricPrecision;
        }

        a {
            color: #6198a7;
            text-decoration: none;
        }

        a strong {
            color: #8be9fd;
        }

        a:hover {
            transition: 200ms;
            color: #8be9fd;
            text-decoration: underline;
        }
    </style>
</head>
<body>Redirecting to <a href="<?= $page->url ?>"><?= $page->printableUrl ?></a>...</body>
</html>
