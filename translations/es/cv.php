<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/cv.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

unset(
    $default['topBar']['localeOptions'],
);

$trans = array_replace_recursive($default, [
    'page' => [
        'title' => 'Currículo: Afonso de Mori - Ingeniero de Software - Madrid, España',
        'description' => 'Conoce la trayectoria profesional de Afonso de Mori, programador con más de 10 años de experiencia.',
    ],
    'topBar' => [
        'print' => 'Imprimir',
        'download' => 'Descargar',
        'downloadFormats' => [
            'txt' => 'Texto sin formato',
        ],
        'locale' => 'Español',
        'localeOptions' => [
            'en' => [
                'label' => 'English',
                'link' => '/cv/en',
            ],
            'pt' => [
                'label' => 'Português',
                'link' => '/cv/pt',
            ],
        ],
    ],
    'contact' => [
        'headline' => '<strong>Desarrollador de software</strong> - Remoto, desde España',
    ],
    'profile' => [
        'title' => 'Perfil',
        'description' => 'Desarrollador back-end desde 2009, especialista en PHP; Sólidos conocimientos en DevOps y un ' .
            'apasionado de la automatización de procesos; Experiencia con entrega continua y metodologías ágiles, ' .
            'lenguajes front-end y de infraestructura; Me esfuerzo para inspirar y evolucionar continuamente a mi equipo.',
    ],
    'experience' => [
        'title' => 'Experiencia',
        'previous' => 'Experiencia Anterior',
        'month' => 'mes',
        'months' => 'meses',
        'year' => 'año',
        'years' => 'años',
        'present' => 'Actualidad',
        'conjunction' => 'y',
        'jobs' => [
            [
                // Bitban
                'title' => 'Desarrollador Sénior',
                'location' => 'Remoto, España',
                'description' => '<ul>' .
                    '<li>Evolución de bCube Publisher, el Sistema de Gestión de Contenidos (CMS) propietario de Bitban;</li>' .
                    '<li>Desarrollo de API REST y librerías en PHP 7 y 8 y utilizando componentes de Symfony 5;</li>' .
                    '<li>Stack: PHP, Symfony, MySQL/ORM, Solr, Docker/Minikube, git/Gitlab.</li>' .
                    '</ul>',
            ],
            [
                // 014
                'title' => 'Desarrollador Sénior',
                'location' => 'Madrid, Comunidad de Madrid',
                'description' => '<ul>' .
                    '<li>Análisis, diseño y desarrollo de proyectos en PHP/Symfony y MariaDB/Doctrine;</li>' .
                    '<li>Otros roles incluían implementación del SCRUM en la gestión de proyectos, configuración de servidores, desarrollo del equipo (formación y orientación) y selección de personal.</li>' .
                    '</ul>',
            ],
            [
                // InterMundial
                'title' => 'Desarrollador Sénior',
                'location' => 'Madrid, Comunidad de Madrid',
                'description' => '<ul>' .
                    '<li>Planificación y migración de aplicaciones a la nube junto al equipo de sistemas, configuración de servidores web y separación de entornos (test/staging/prod);</li>' .
                    '<li>Diseño y desarrollo desde cero un framework en bash script para compilación y despliegue de proyectos;</li>' .
                    '<li>Desarrollo de API REST en PHP y MariaDB para integración con clientes y proveedores;</li>' .
                    '<li>Formación del equipo en el uso de git y mejoría del flujo de desarrollo con git-flow.</li>' .
                    '</ul>',
            ],
            [
                // Sabbatical
                'title' => 'Período Sabático',
                'location' => 'EE.UU., Brasil y España',
                'description' => '<ul>' .
                    '<li>Curso de inglés de invierno en la Universidad Internacional de Florida - FIU (EE.UU.);</li>' .
                    '<li>Un año enseñando inglés (becario) en la Universidad "Nove de Julho" - UNINOVE (Brasil);</li>' .
                    '<li>Cuatro semanas de curso de español en Enforex Idiomas (España);</li>' .
                    '<li>Tres meses dedicados a actualización como programador, para volver al mercado laboral.</li>' .
                    '</ul>',
            ],
            [
                // Zocprint
                'period' => 'Julio 2013 – Julio 2016 (3 años y 1 mes)',
                'description' => '<h3>Desarrollador Sénior / DevOps<span class="gray">, Mayo 2015 – Julio 2016 (1 año y 3 meses) | Osasco, Brasil</span></h3>' .
                    '<ul>' .
                    '<li>En abril de 2015 Zocprint fue comprada por el Grupo Digipix. Tuve un importante rol en la transición tecnológica a la nueva empresa, siendo responsable del mantenimiento de la web y sus servicios, del desarrollo de APIs REST para integración entre los sistemas de backoffice y de la formación del equipo de infraestructura de Digipix en las tecnologías usadas por Zocprint;</li>' .
                    '<li>Infraestructura (Amazon Web Services), control de versiones y despliegue de software (Jenkins/puppet).</li>' .
                    '</ul>' .

                    // PAGE-BREAK - TODO: Think a better way, maybe
                    '</section></article><article class="page"><section class="experience">' .

                    '<h3>Desarrollador Junior<span class="gray">, Julio 2013 – Abril 2015 (1 año y 10 meses) | Sao Paulo, Brasil</span></h3>' .
                    '<ul>' .
                    '<li>Evolución y mantenimiento de comercio electrónico desarrollado con Symfony/PHP y Doctrine/MySQL y del editor WYSIWYG en JavaScript/jQuery para personalización de productos;</li>' .
                    '<li>Interacción con Solr, Redis, Memcached y Rabbitmq.</li>' .
                    '</ul>',
            ],
        ],
        'previousJobs' => [
            [
                'title' => 'Programador PHP',
                'company' => 'Centro Universitario "São Camilo - ES"',
                'period' => 'jul/2010–ene/2011',
            ],
            [
                'title' => 'Desarrollador Web y Soporte Técnico',
                'company' => 'HS Serviços e Soluções Web LTDA',
                'period' => 'jul/2010–ene/2011',
            ],
            [
                'title' => 'Desarrollador Web (becario)',
                'company' => 'Centro Universitario "São Camilo - ES"',
                'period' => 'ago/2008–jun/2010',
            ],
            [
                'title' => 'Asistente de Informática',
                'company' => 'Mameri Rochas LTDA',
                'period' => 'oct/2007–jul/2008',
            ],
            [
                'title' => 'Instructor de Informática',
                'company' => 'Arte & Imagem Informática',
                'period' => 'feb/2005–oct/2006',
            ],
        ],
    ],
    'education' => [
        'title' => 'Educación',
        'what' => 'Análisis y Desarrollo de Sistemas<span>, Universidad "Nove de Julho" - UNINOVE</span>',
        'when' => 'Superior de Tecnología, 2014–2016',
        'how' => '<ul>' .
            '<li>Homologado en España al título de <u>Técnico Superior en Desarrollo de Aplicaciones Web</u>.</li>' .
            '</ul>',
    ],
    'languages' => [
        'title' => 'Idiomas',
        'list' => [
            [
                'name' => 'Portugués',
                'level' => 'Nativo',
            ],
            [
                'name' => 'Español',
                'level' => 'Competencia bilingüe',
            ],
            [
                'name' => 'Inglés',
                'level' => 'Competencia profesional completa',
            ],
        ],
    ],
    'courses' => [
        'title' => 'Cursos',
        'list' => '<ul>' .
            '<li><strong>API HTTP en Kotlin aplicando Arquitectura Hexagonal</strong>, Codely (2022), <em>en curso</em>;</li>' .
            '<li><strong>Formación Kotlin</strong>, Alura (2022), 67 horas;</li>' .
            '<li><strong>Formación: Certificación Java (OCA)</strong>, Alura (2022), 76 horas;</li>' .
            '<li><strong>Formación Android</strong>, Alura (2020), 30 horas;</li>' .
            '<li><strong>Formación Java</strong>, Alura (2019), 121 horas.</li>' .
            '<li class="gray"><em>Certificados y otros cursos en ' .
            '<a href="/courses/es">https://afonso.dev/cursos</a>.' .
            '</em></li></ul>',
    ],
    'skills' => [
        'title' => 'Aptitudes',
        'list' => '<ul>' .
            '<li><strong>Back-end:</strong> PHP (5.6 a 8.1), Symfony (2.2 a 6.0); MariaDB/MySQL, Doctrine.</li>' .
            '<li><strong>Front-end:</strong> HTML, CSS, JavaScript.</li>' .
            '<li><strong>Infraestructura:</strong> Bash, servidores Linux (Debian/Ubuntu/CentOS), Amazon Web Services (AWS).</li>' .
            '<li><strong>Servidores web:</strong> Nginx, Apache.</li>' .
            '<li><strong>Otros:</strong> Git/git-flow; Jenkins; Scrum; Kanban; Integración Continua; Java/Android.</li>' .
            '</ul>',
    ],
    'footer' => [
        'updated' => 'Actualizado',
        'months' => [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre',
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
