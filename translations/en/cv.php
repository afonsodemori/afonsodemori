<?php
/** @noinspection JsonEncodingApiUsageInspection */

$trans = [
    'page' => [
        'title' => 'Resume: Afonso de Mori - Software Engineer - Madrid, Spain',
        'description' => 'Learn about the professional career of Afonso de Mori, a programmer with more than 10 years of experience.',
        'keywords' => '',
    ],
    'topBar' => [
        'print' => 'Print',
        'download' => 'Download',
        'downloadFormats' => [
            'pdf' => 'PDF',
            'docx' => 'Word',
            'txt' => 'Plain Text',
            'odt' => 'OpenDocument',
        ],
        'locale' => 'English',
        'localeOptions' => [
            'es' => [
                'label' => 'Español',
                'link' => '/cv/es',
            ],
            'pt' => [
                'label' => 'Português',
                'link' => '/cv/pt',
            ],
        ],
    ],
    'contact' => [
        'headline' => '<strong>Software developer</strong> - Remote, from Spain',
    ],
    'profile' => [
        'title' => 'Profile',
        'description' => 'Back-end web developer since 2009, PHP specialist; Great knowledge in the DevOps area and ' .
            'great passion about process automation; Experienced with continuous delivery, agile methodologies, ' .
            'front-end languages, and infrastructure; Striving to inspire and evolve my team continuously.',
    ],
    'experience' => [
        'title' => 'Experience',
        'previous' => 'Previous Experience',
        'month' => 'mo',
        'months' => 'mos',
        'year' => 'yr',
        'years' => 'yrs',
        'present' => 'Present',
        'conjunction' => '',
        'jobs' => [
            [
                'title' => 'Senior Developer',
                'company' => 'Bitban Technologies S.L.',
                'period' => [
                    'start' => '2020-01',
                    'end' => null,
                ],
                'location' => 'Remote, Spain',
                'description' => '<ul>' .
                    '<li>Evolution of bCube Publisher, Bitban\'s proprietary Content Management System (CMS);</li>' .
                    '<li>Development of REST APIs and libraries in PHP 7 and 8 and using Symfony 5 components;</li>' .
                    '<li>Stack: PHP, Symfony, MySQL/ORM, Solr, Docker/Minikube, git/Gitlab.</li>' .
                    '</ul>',
            ],
            [
                'title' => 'Senior Developer',
                'company' => '014 Media S.L.',
                'period' => [
                    'start' => '2019-01',
                    'end' => '2019-12',
                ],
                'location' => 'Madrid, Spain',
                'description' => '<ul>' .
                    '<li>Analysis, design and development of projects in PHP/Symfony and MariaDB/Doctrine;</li>' .
                    '<li>Other roles included implementation of SCRUM in project management, server configuration, development of the team (training and guidance), and personnel selection.</li>' .
                    '</ul>',
            ],
            [
                'title' => 'Senior Developer',
                'company' => 'InterMundial XXI S.L.',
                'period' => [
                    'start' => '2018-06',
                    'end' => '2018-12',
                ],
                'location' => 'Madrid, Spain',
                'description' => '<ul>' .
                    '<li>Planning and migration of applications to the cloud with the infrastructure team, configuration of web servers and separation of environments (testing/staging/prod);</li>' .
                    '<li>Designed and developed from scratch a framework in bash script for compilation and deployment of projects;</li>' .
                    '<li>Development of REST API in PHP and MariaDB for integration with customers and suppliers;</li>' .
                    '<li>Training of the team in the use of git and improvement of the development flow with git-flow.</li>' .
                    '</ul>',
            ],
            [
                'title' => 'Sabbatical Period',
                'company' => null,
                'period' => [
                    'start' => '2016-07',
                    'end' => '2018-06',
                ],
                'location' => 'USA, Brazil and Spain',
                'description' => '<ul>' .
                    '<li>Winter English course at Florida International University - FIU (USA);</li>' .
                    '<li>One year teaching English (trainee) at "Nove de Julho" University - UNINOVE (Brazil);</li>' .
                    '<li>Four-week Spanish course at Enforex Idiomas (Spain);</li>' .
                    '<li>Three months dedicated to updating my knowledge as a programmer, to return to the labor market.</li>' .
                    '</ul>',
            ],
            [
                'title' => '<span>Zocprint Serviços Gráficos LTDA</span>',
                'company' => null,
                'period' => 'July 2013 – July 2016 (3 yrs 1 mo)',
                'location' => '',
                'description' => '<h3>Senior Developer / DevOps<span class="gray">, May 2015 – July 2016 (1 yr 3 mos) | Osasco, Brazil</span></h3>' .
                    '<ul>' .
                    '<li>In April 2015, Zocprint was bought by the Digipix Group. I had an important role in the technological transition to the new company, being responsible for the maintenance of the web and its services, the development of REST APIs for integration between back-office systems, and responsible for training Digipix\'s infrastructure team in the technologies used by Zocprint;</li>' .
                    '<li>Infrastructure (Amazon Web Services), version control and software deployment (Jenkins/puppet).</li>' .
                    '</ul>' .

                    // PAGE-BREAK - TODO: Think a better way, maybe
                    '</section></article><article class="page"><section class="experience">' .

                    '<h3>Junior Developer<span class="gray">, July 2013 – April 2015 (1 yr 10 mos) | Sao Paulo, Brazil</span></h3>' .
                    '<ul>' .
                    '<li>Evolution and maintenance of the e-commerce system in Symfony/PHP and Doctrine/MySQL, and the online WYSIWYG editor for product customization in JavaScript/jQuery;</li>' .
                    '<li>Interact with Solr, Redis, Memcached and Rabbitmq.</li>' .
                    '</ul>',
            ],
        ],
        'previousJobs' => [
            [
                'title' => 'PHP Programmer',
                'company' => '"São Camilo - ES" University Center',
                'period' => 'feb/2011–jun/2013',
            ],
            [
                'title' => 'Web Developer and Technical Support',
                'company' => 'HS Serviços e Soluções Web LTDA',
                'period' => 'jul/2010–jan/2011',
            ],
            [
                'title' => 'Web Developer (trainee)',
                'company' => '"São Camilo - ES" University Center',
                'period' => 'aug/2008–jun/2010',
            ],
            [
                'title' => 'IT Assistant',
                'company' => 'Mameri Rochas LTDA',
                'period' => 'oct/2007–jul/2008',
            ],
            [
                'title' => 'Computer Trainer',
                'company' => 'Arte & Imagem Informática',
                'period' => 'feb/2005–oct/2006',
            ],
        ],
    ],
    'education' => [
        'title' => 'Education',
        'what' => 'Systems Analysis and Development<span>, "Nove de Julho" University - UNINOVE</span>',
        'when' => 'Technologist Degree, 2014–2016',
        'how' => '<ul>' .
            '<li>Homologated in Spain to the title of <u>Higher Technician in Development of Web Applications</u>.</li>' .
            '</ul>',
    ],
    'languages' => [
        'title' => 'Languages',
        'list' => [
            [
                'name' => 'Portuguese',
                'level' => 'Native',
            ],
            [
                'name' => 'Spanish',
                'level' => 'Bilingual proficiency',
            ],
            [
                'name' => 'English',
                'level' => 'Full professional proficiency',
            ],
        ],
    ],
    'courses' => [
        'title' => 'Courses',
        'list' => '<ul>' .
            '<li><strong>Symfony 5 Track</strong>, SymfonyCasts, 3 hours;</li>' .
            '<li><strong>Java Development</strong>, Alura, 100 hours;</li>' .
            '<li><strong>Android Development</strong>, Alura, 30 hours.</li>' .
            '<li class="gray">Certificates and other courses at ' .
            '<a target="_blank" href="/courses/en">https://afonso.dev/courses</a>.' .
            '</li></ul>',
    ],
    'skills' => [
        'title' => 'Skills',
        'list' => '<ul>' .
            '<li><strong>Back-end:</strong> PHP (5.6 to 8.1), Symfony (2.2 to 6.0); MariaDB/MySQL, Doctrine.</li>' .
            '<li><strong>Front-end:</strong> HTML; CSS, Less; JavaScript, jQuery; Bootstrap.</li>' .
            '<li><strong>Infrastructure:</strong> Bash; Linux servers (Debian/Ubuntu/CentOS); Puppet; Amazon Web Services (AWS).</li>' .
            '<li><strong>Web servers:</strong> Nginx, Apache.</li>' .
            '<li><strong>Other skills:</strong> Git/git-flow; Jenkins; Scrum; Kanban; Continuous Integration; Java/Android.</li>' .
            '</ul>',
    ],
    'footer' => [
        'updated' => 'Updated',
        'months' => [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ],
    ],
];

$trans = json_decode(json_encode($trans));
