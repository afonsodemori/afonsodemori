<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/home.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'metas' => [
        'title' => 'Afonso de Mori A. Silva - Desarrollador de software - Madrid, España',
        'description' => 'Perfil personal de Afonso de Mori Ayres da Silva. Desarrollador web back-end con foco en PHP',
        'keywords' => 'afonso, mori, ayres, silva, demori, afonsodemori, afonsosilva89, desarrollador web, php',
    ],
    'about' => [
        'greet' => 'Hola',
        'me' => 'Soy',
        'title' => 'desarrollador <span class="nowrap">de software</span>',
        'bio' => 'Desarrollador back-end desde 2009, especialista en PHP; Sólidos conocimientos en DevOps y un apasionado de la automatización de procesos; Experiencia con entrega continua y metodologías ágiles, lenguajes front-end y de infraestructura; Me esfuerzo para inspirar y evolucionar continuamente a mi equipo.',
    ],
    'links' => [
        'linkedin' => [
            'title' => 'Visita mi perfil en LinkedIn',
        ],
        'github' => [
            'title' => 'Visita mi perfil en Github',
        ],
        'cv' => [
            'text' => 'Currículo',
            'title' => 'Ve mi currículo completo',
            'url' => '/cv/es',
            'target' => '_self',
        ],
        'contact' => [
            'text' => 'Contacto',
            'title' => 'Contacta conmigo',
            'url' => '/contact/es',
            'target' => '_self',
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
