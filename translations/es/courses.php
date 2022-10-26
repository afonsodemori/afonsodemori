<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . '/../en/courses.php';

use App\Model\Certificate;
use App\Model\Course;

/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    'metas' => [
        'title' => 'Cursos',
    ],
    'page' => [
        'title' => 'Últimos cursos',
        'syllabus' => 'Temario',
        'certificates' => 'Certificados',
        'certificate' => 'Certificado',
        'checkAuthenticity' => 'Comprobar autenticidad',
        'authenticity' => 'Autenticidad',
    ],
    'courses' => [
        (new Course('java-oca', 'Formación: Certificación Java (OCA)'))
            ->addTopic("Tipos de Datos")
            ->addTopic("Operadores y condicionales")
            ->addTopic("Creando y usando Arrays")
            ->addTopic("Crear y usar bucles")
            ->addTopic("Métodos y encapsulación")
            ->addTopic("Herencia, Interfaz y Polimorfismo")
            ->addTopic("Lidiando com excepciones")
            ->addTopic("Lambdas, nueva API java.time, wrappers y autoboxing")
            ->addCertificate(new Certificate(
                'Formación: Certificación Java (OCA)',
                '76:00:00',
                [
                    '/assets/certificates/java-oca/alura-java-oca-front.png',
                    '/assets/certificates/java-oca/alura-java-oca-back.png',
                ],
                'https://cursos.alura.com.br/certificate/d4a8a0ec-93af-4a30-83cf-d752ef7cfc85',
            )),
        1 => [
            "name" => 'Formación Java',
            "topics" => [
                "JRE y JDK: compila y ejecuta tu programa",
                "Comprendiendo la Orientación de Objetos",
                "Polimorfismo, Herencia e Interfaces",
                "Crear, lanzar y manejar Excepciones",
                "Java y java.lang",
                "Java y java.util",
                "java.io: Streams, Reader y Writers",
                "Colecciones: Lists, Sets y Maps",
                "Novedades en Java 8 y 9",
                "TDD: Pruebas automatizadas con JUnit",
            ],
        ],
    ],
]);

$trans = json_decode(json_encode($trans));
