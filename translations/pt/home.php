<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/home.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'metas' => [
        'title' => 'Afonso de Mori A. Silva - Desenvolvedor de software - Madri, Espanha',
        'description' => 'Perfil pessoal de Afonso de Mori Ayres da Silva. Desenvolvedor web back-end com foco em PHP',
        'keywords' => 'afonso, mori, ayres, silva, demori, afonsodemori, afonsosilva89, desenvolvedor, php',
    ],
    'about' => [
        'greet' => 'Olá',
        'me' => 'Sou',
        'title' => 'desenvolvedor <span class="nowrap">de software</span>',
        'bio' => 'Desenvolvedor back-end desde 2009, especialista em PHP; Sólidos conhecimentos em DevOps e apaixonado por automatização de processos; Experiência com entrega contínua e metodologias ágeis, linguagens front-end e infraestrutura; Me empenho em inspirar e evoluir minha equipe continuamente.',
    ],
    'links' => [
        'linkedin' => [
            'title' => 'Veja meu perfil no LinkedIn',
        ],
        'github' => [
            'title' => 'Veja meu perfil no Github',
        ],
        'cv' => [
            'text' => 'Currículo',
            'title' => 'Veja meu currículo completo',
            'url' => '/cv/pt',
            'target' => '_self',
        ],
        'contact' => [
            'text' => 'Contato',
            'title' => 'Entre em contato',
            'url' => '/contact/pt',
            'target' => '_self',
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
