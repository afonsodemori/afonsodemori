<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/contact.php';
/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'metas' => [
        'title' => '¡Hablemos!',
    ],
    'header' => [
        '¡Hola! Soy Afonso,',
        'ingeniero de software residente en Madrid, con más de 10 años de experiencia. ¿Hablamos?',
    ],
    'form' => [
        'name' => [
            'label' => 'Nombre',
            'placeholder' => 'Nombre y apellidos',
        ],
        'email' => [
            'label' => 'Correo',
            'placeholder' => 'Correo electrónico',
        ],
        'message' => [
            'label' => 'Mensaje',
            'placeholder' => 'Dime algo agradable :-)',
        ],
        'submit' => 'Enviar',
        'submitted' => 'Enviando...',
        'success' => [
            'Mensaje enviado.',
            'Gracias.',
        ],
    ]
]);

$trans = json_decode(json_encode($trans));
