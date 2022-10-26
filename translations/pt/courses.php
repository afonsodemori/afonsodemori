<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/courses.php';

use App\Model\Certificate;
use App\Model\Course;

/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'page' => [
        'title' => 'Últimos Cursos',
        'syllabus' => 'Sumário',
        'certificates' => 'Certificados',
        'authenticity' => 'Autenticidade',
    ],
    'courses' => [
        (new Course('java-oca', 'Formação: Certificação Java (OCA)'))
            ->addTopic("Tipos de Dados")
            ->addTopic("Operadores e condicionais")
            ->addTopic("Criando e usando Arrays")
            ->addTopic("Construir e usar laços de repetição")
            ->addTopic("Métodos e encapsulamento")
            ->addTopic("Herança, Interface e Polimorfismo")
            ->addTopic("Lidando com exceções")
            ->addTopic("Lambdas, nova API java.time, wrappers e autoboxing")
            ->addCertificate(new Certificate(
                'Formação: Certificação Java (OCA)',
                '76:00:00',
                [
                    '/assets/certificates/java-oca/alura-java-oca-front.png',
                    '/assets/certificates/java-oca/alura-java-oca-back.png',
                ],
                'https://cursos.alura.com.br/certificate/d4a8a0ec-93af-4a30-83cf-d752ef7cfc85',
            )),
        1 => [
            "name" => 'Formação Java',
            "topics" => [
                "JRE e JDK: Compile e execute seu programa",
                "Entendendo a Orientação a Objetos",
                "Polimorfismo, Herança e Interfaces",
                "Criar, lançar e controlar Exceções",
                "Java e java.lang",
                "Java e java.util",
                "java.io: Streams, Reader e Writers",
                "Collections: Lists, Sets e Maps",
                "Novidades do Java 8 e 9",
                "TDD: Testes automatizados com JUnit",
            ],
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
