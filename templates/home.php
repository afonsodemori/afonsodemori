<?php
/**
 * @var string $locale
 * @var stdClass $trans
 */
?><!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <title><?= $trans->metas->title ?></title>

    <!-- le meta-tags -->
    <meta charset="utf-8">
    <meta name="description" content="<?= $trans->metas->description ?>">
    <meta name="keywords" content="<?= $trans->metas->keywords ?>">
    <link rel="canonical" href="https://afonso.dev/<?= $locale ?>">

    <!-- le opengraph tags -->
    <meta property="og:title" content="<?= $trans->metas->title ?>">
    <meta property="og:description" content="<?= $trans->metas->description ?>">
    <meta property="og:image" content="https://afonso.dev/assets/images/photo.jpg">

    <!-- le languages -->
    <link rel="alternate" hreflang="en" href="https://afonso.dev/en">
    <link rel="alternate" hreflang="es" href="https://afonso.dev/es">
    <link rel="alternate" hreflang="pt" href="https://afonso.dev/pt">

    <!-- le stylesheets -->
    <link rel="stylesheet" href="/assets/css/home.css?v=<?= time() ?>" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@600;800&family=Inter:wght@300;500&display=swap" media="screen">

    <!-- le mobile -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta name="viewport" content="initial-scale=1, maximum-scale=5, width=device-width">
    <meta name="theme-color" content="#030931">
    <link rel="manifest" href="/app.manifest">

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "gender": "Male",
        "name": "Afonso de Mori Ayres da Silva",
        "givenName": "Afonso",
        "familyName": "Silva",
        "image": "https://afonso.dev/assets/images/photo.jpg",
        "birthDate": "1989-01-10T11:02:00-03:00",
        "nationality": "BR",
        "jobTitle": "Software developer",
        "url": "https://afonso.dev",
        "sameAs": [
            "https://www.linkedin.com/in/afonsodemori",
            "https://twitter.com/afonsodemori"
        ],
        "address": {
            "@type": "PostalAddress",
            "addressRegion": "Madrid",
            "postalCode": "28792",
            "addressCountry": "ES"
        },
        "alumniOf": {
            "@type": "CollegeOrUniversity",
            "name": "Universidade Nove de Julho",
            "url": "https://www.uninove.br",
            "address": {
                "@type": "PostalAddress",
                "addressRegion": "Sao Paulo",
                "postalCode": "01156-050",
                "addressCountry": "BR"
            }
        }
    }
</script>
<section>
    <div>
        <h1>Afonso <span class="nowrap">de Mori</span></h1>
        <h2><?= $trans->about->title ?></h2>
        <p class="bio"><?= $trans->about->bio ?></p>
        <ul class="links">
            <?php foreach ($trans->links as $link): ?>
                <li><a target="<?= $link->target ?>" href="<?= $link->url ?>" title="<?= $link->title ?>"><?= $link->text ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<div class="backlight"></div>
<script src="/assets/js/shared.js?v=<?= time() ?>"></script>
</body>
</html>
