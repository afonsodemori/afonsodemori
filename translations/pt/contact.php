<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/contact.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'metas' => [
        'title' => 'Vamos conversar!',
    ],
    'header' => [
        'Olá! Eu sou Afonso,',
        'engenheiro de software morando em Madri, com mais de 10 anos de experiência. Vamos conversar?',
    ],
    'form' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Nome completo',
        ],
        'email' => [
            'label' => 'E-mail',
            'placeholder' => 'Endereço de e-mail',
        ],
        'subject' => 'Contato via afonso.dev',
        'message' => [
            'label' => 'Mensagem',
            'placeholder' => 'Diga algo agradável :-)',
        ],
        'submit' => 'Enviar',
        'submitted' => 'Enviando...',
        'success' => [
            'Mensagem enviada.',
            'Obrigado.',
        ],
        'error' => 'Algo deu errado. Por favor, tente novamente mais tarde.',
    ]
]);

$trans = json_decode(json_encode($trans));
