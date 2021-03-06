<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/cv.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

unset(
    $default['topBar']['localeOptions'],
    $default['joke'],
);

$trans = array_replace_recursive($default, [
    'page' => [
        'title' => 'Currículo: Afonso de Mori - Engenheiro de Software - Madri, Espanha',
        'description' => 'Conheça a trajetória profissional de Afonso de Mori, programador com mais de 10 anos de experiência.',
    ],
    'topBar' => [
        'print' => 'Imprimir',
        'download' => 'Baixar',
        'downloadFormats' => [
            'txt' => 'Texto simples',
        ],
        'locale' => 'Português',
        'localeOptions' => [
            'en' => [
                'label' => 'English',
                'link' => '/cv/en',
            ],
            'es' => [
                'label' => 'Español',
                'link' => '/cv/es',
            ],
        ],
    ],
    'contact' => [
        'headline' => '<strong>Desenvolvedor de software</strong> - Remoto, desde Espanha',
    ],
    'profile' => [
        'title' => 'Perfil',
        'description' => 'Desenvolvedor back-end desde 2009, especialista em PHP; Sólidos conhecimentos em DevOps e ' .
            'apaixonado por automatização de processos; Experiência com entrega contínua e metodologias ágeis, ' .
            'linguagens front-end e infraestrutura; Me empenho em inspirar e evoluir minha equipe continuamente.',
    ],
    'experience' => [
        'title' => 'Experiência',
        'previous' => 'Experiência Anterior',
        'month' => 'mês',
        'months' => 'meses',
        'year' => 'ano',
        'years' => 'anos',
        'present' => 'Atualmente',
        'conjunction' => 'e',
        'jobs' => [
            [
                // Bitban
                'title' => 'Desenvolvedor Sênior',
                'location' => 'Remoto, Espanha',
                'description' => '<ul>' .
                    '<li>Evolução de bCube Publisher, Sistema de Gerenciamento de Conteúdo (CMS) proprietário de Bitban;</li>' .
                    '<li>Desenvolvimento de APIs REST e bibliotecas em PHP 7 e 8 e utilizando componentes Symfony 5;</li>' .
                    '<li>Stack: PHP, Symfony, MySQL/ORM, Solr, Docker/Minikube, git/Gitlab.</li>' .
                    '</ul>',
            ],
            [
                // 014
                'title' => 'Desenvolvedor Sênior',
                'location' => 'Madri, Espanha',
                'description' => '<ul>' .
                    '<li>Análise, design e desenvolvimento de projetos em PHP/Symfony e MariaDB/Doctrine;</li>' .
                    '<li>Outras funções incluíram a implementação de SCRUM no gerenciamento de projetos, configuração de servidores, desenvolvimento da equipe (treinamento e orientação) e seleção de pessoal.</li>' .
                    '</ul>',
            ],
            [
                // InterMundial
                'title' => 'Desenvolvedor Sênior',
                'location' => 'Madri, Espanha',
                'description' => '<ul>' .
                    '<li>Planejamento e migração de aplicações para a nuvem com a equipe de sistemas, configuração de servidores web e separação de ambientes (test/staging/prod);</li>' .
                    '<li>Design e desenvolvimento a partir do zero de um framework em bash para compilação e deploy de projetos;</li>' .
                    '<li>Desenvolvimento de API REST em PHP e MariaDB para integração com clientes e fornecedores;</li>' .
                    '<li>Treinamento da equipe no uso do git e melhoria do fluxo de desenvolvimento com git-flow.</li>' .
                    '</ul>',
            ],
            [
                // Sabbatical
                'title' => 'Período Sabático',
                'location' => 'EUA, Brasil e Espanha',
                'description' => '<ul>' .
                    '<li>Curso de inglês de inverno na Universidade Internacional da Flórida - FIU (EUA);</li>' .
                    '<li>Um ano ensinando inglês (estagiário) na Universidade Nove de Julho - UNINOVE (Brasil);</li>' .
                    '<li>Quatro semanas de curso de espanhol em Enforex Idiomas (Espanha);</li>' .
                    '<li>Três meses dedicados a atualização como programador, para voltar ao mercado de trabalho.</li>' .
                    '</ul>',
            ],
            [
                // Zocprint
                'period' => 'Julho 2013 – Julho 2016 (3 anos e 1 mês)',
                'description' => '<h3>Desenvolvedor Sênior / DevOps<span class="gray">, Maio 2015 – Julho 2016 (1 ano e 3 meses) | Osasco, SP</span></h3>' .
                    '<ul>' .
                    '<li>Em abril de 2015, a Zocprint foi comprada pelo Grupo Digipix. Tive um papel importante na transição tecnológica para a nova empresa, sendo responsável pela manutenção da web e de seus serviços, pelo desenvolvimento de APIs REST para integração entre sistemas de backoffice e pelo treinamento da equipe de infraestrutura da Digipix nas tecnologias usadas pela Zocprint;</li>' .
                    '<li>Infraestrutura (Amazon Web Services), controle de versão e deploy de software (Jenkins/puppet).</li>' .
                    '</ul>' .

                    // PAGE-BREAK - TODO: Think a better way, maybe
                    '</section></article><article class="page"><section class="experience">' .

                    '<h3>Desenvolvedor Junior<span class="gray">, Julho 2013 – Abril 2015 (1 ano e 10 meses) | São Paulo, SP</span></h3>' .
                    '<ul>' .
                    '<li>Evolução e manutenção do sistema de comércio eletrônico em Symfony/PHP e Doctrine/MySQL e do editor WYSIWYG online para personalização de produtos em JavaScript/jQuery;</li>' .
                    '<li>Interação com Solr, Redis, Memcached e Rabbitmq.</li>' .
                    '</ul>',
            ],
        ],
        'previousJobs' => [
            [
                'title' => 'Programador PHP',
                'company' => 'Centro Universitário "São Camilo - ES"',
                'period' => 'fev/2011–jun/2013',
            ],
            [
                'title' => 'Desenvolvedor Web e Suporte Técnico',
                'company' => 'HS Serviços e Soluções Web LTDA',
                'period' => 'jul/2010–jan/2011',
            ],
            [
                'title' => 'Desenvolvedor Web (estagiário)',
                'company' => 'Centro Universitário "São Camilo - ES"',
                'period' => 'ago/2008–jun/2010',
            ],
            [
                'title' => 'Assistente de Informática',
                'company' => 'Mameri Rochas LTDA',
                'period' => 'out/2007–jul/2008',
            ],
            [
                'title' => 'Instrutor de Informática',
                'company' => 'Arte & Imagem Informática',
                'period' => 'fev/2005–out/2006',
            ],
        ],
    ],
    'education' => [
        'title' => 'Educação',
        'what' => 'Análise e Desenvolvimento de Sistemas<span>, Universidade "Nove de Julho" - UNINOVE</span>',
        'when' => 'Superior de Tecnologia, 2014–2016',
        'how' => '<ul>' .
            '<li>Homologado na Espanha ao título de <u>Técnico Superior em Desenvolvimento de Aplicações Web</u>.</li>' .
            '</ul>',
    ],
    'languages' => [
        'title' => 'Idiomas',
        'list' => [
            [
                'name' => 'Português',
                'level' => 'Nativo',
            ],
            [
                'name' => 'Espanhol',
                'level' => 'Proficiência bilíngue',
            ],
            [
                'name' => 'Inglês',
                'level' => 'Proficiência profissional completa',
            ],
        ],
    ],
    'courses' => [
        'title' => 'Cursos',
        'list' => '<ul>' .
            '<li><strong>Symfony 5 Track</strong>, SymfonyCasts, 3 horas;</li>' .
            '<li><strong>Desenvolvimento Java</strong>, Alura, 100 horas;</li>' .
            '<li><strong>Desenvolvimento Android</strong>, Alura, 30 horas.</li>' .
            '<li class="gray">Certificados e outros cursos em ' .
            '<a target="_blank" href="/courses/pt">https://afonso.dev/cursos</a>.' .
            '</li></ul>',
    ],
    'skills' => [
        'title' => 'Habilidades',
        'list' => '<ul>' .
            '<li><strong>Back-end:</strong> PHP (5.6 a 8.1), Symfony (2.2 a 6.0); MariaDB/MySQL, Doctrine.</li>' .
            '<li><strong>Front-end:</strong> HTML, CSS, JavaScript.</li>' .
            '<li><strong>Infraestrutura:</strong> Bash, servidores Linux (Debian/Ubuntu/CentOS), Amazon Web Services (AWS).</li>' .
            '<li><strong>Servidores web:</strong> Nginx, Apache.</li>' .
            '<li><strong>Outros:</strong> Git/git-flow; Jenkins; Scrum; Kanban; Integração Contínua; Java/Android.</li>' .
            '</ul>',
    ],
    'footer' => [
        'updated' => 'Atualizado',
        'months' => [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
