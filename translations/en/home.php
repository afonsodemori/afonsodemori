<?php
/** @noinspection JsonEncodingApiUsageInspection */

$trans = [
    'metas' => [
        'title' => 'Afonso de Mori A. Silva - Software developer - Madrid, Spain',
        'description' => 'Afonso de Mori Ayres da Silva\'s personal profile. Back-end web developer PHP focused',
        'keywords' => 'afonso, mori, ayres, silva, demori, afonsodemori, afonsosilva89, web developer, php',
    ],
    'about' => [
        'greet' => 'Hi',
        'me' => "I'm",
        'title' => 'software developer',
        'bio' => 'Back-end web developer since 2009, PHP specialist; Great knowledge in the DevOps area and great passion about process automation; Experienced with continuous delivery, agile methodologies, front-end languages, and infrastructure; Striving to inspire and evolve my team continuously.',
    ],
    'links' => [
        'linkedin' => [
            'text' => 'LinkedIn',
            'title' => 'See my LinkedIn profile',
            'url' => '/linkedin',
            'target' => '_blank',
        ],
        'github' => [
            'text' => 'Github',
            'title' => 'See my Github profile',
            'url' => '/github',
            'target' => '_blank',
        ],
        'cv' => [
            'text' => 'Resume',
            'title' => 'See my full resume',
            'url' => '/cv/en',
            'target' => '_self',
        ],
        'contact' => [
            'text' => 'Contact',
            'title' => 'Get in touch',
            'url' => '/contact/en',
            'target' => '_self',
        ],
    ],
];

$trans = json_decode(json_encode($trans));
