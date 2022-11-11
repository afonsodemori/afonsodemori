<?php
/** @noinspection JsonEncodingApiUsageInspection */

$trans = [
    'metas' => [
        'title' => 'Let\'s talk!',
        'description' => '',
        'keywords' => '',
    ],
    'header' => [
        'Hi! I\'m Afonso,',
        'a Madrid based Software Engineer with 10+ years of experience. Let\'s talk?',
    ],
    'form' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Full name',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Email address',
        ],
        'subject' => 'Contact via afonso.dev',
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Say something nice :-)',
        ],
        'submit' => 'Send',
        'submitted' => 'Sending...',
        'success' => [
            'Message sent.',
            'Thanks.',
        ],
        'error' => 'Something went wrong. Please, try again later.',
    ]
];

$trans = json_decode(json_encode($trans));
