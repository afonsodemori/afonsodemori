<?php
/** @noinspection PhpObjectFieldsAreOnlyWrittenInspection */

// TODO: Using composer is failing in GitHub. Don't know why...
require_once __DIR__ . '/../../src/Model/Certificate.php';
require_once __DIR__ . '/../../src/Model/Course.php';

use App\Model\Certificate;
use App\Model\Course;

$trans = new stdClass();
$trans->page = new stdClass();
$trans->page->title = 'Últimos Cursos';
$trans->page->syllabus = 'Temario';
$trans->page->certificates = 'Certificados';
$trans->page->authenticity = 'Autenticidad';

$trans->courses = [
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
            'Formación: Certificación Java',
            '76:00:00',
            [
                '/assets/certificates/java-oca/alura-java-oca-front.png',
                '/assets/certificates/java-oca/alura-java-oca-back.png',
            ],
            'https://cursos.alura.com.br/certificate/d4a8a0ec-93af-4a30-83cf-d752ef7cfc85',
        )),

    (new Course('java', 'Formación Java'))
        ->addTopic('JRE y JDK: compila y ejecuta tu programa')
        ->addTopic('Comprendiendo la Orientación de Objetos')
        ->addTopic('Polimorfismo, Herencia e Interfaces')
        ->addTopic('Crear, lanzar y manejar Excepciones')
        ->addTopic('Java y java.lang')
        ->addTopic('Java y java.util')
        ->addTopic('java.io: Streams, Reader y Writers')
        ->addTopic('Colecciones: Lists, Sets y Maps')
        ->addTopic('Novedades en Java 8 y 9')
        ->addTopic('TDD: Pruebas automatizadas con JUnit')
        ->addCertificate(new Certificate(
            'Formación Java',
            '121:00:00',
            [
                '/assets/certificates/java-training/alura-java-training-front.png',
                '/assets/certificates/java-training/alura-java-training-back.png',
            ],
            'https://cursos.alura.com.br/degree/certificate/b59eb0e5-18cf-4d81-b91e-af2f92519457',
        )),

    (new Course('android', 'Formación Android'))
        ->addCertificate(new Certificate(
            'Android Parte 1: Crea tu primera app móvil',
            '10:00:00',
            ['https://static.afonso.dev/courses/certificates/android/alura-android-001.png'],
            'https://cursos.alura.com.br/certificate/7ec88e25-aeae-4cb7-820e-5c2197bdd708',
        ))
        ->addCertificate(new Certificate(
            'Android Parte 2: Avanzando con Listeners, Menu y UI',
            '10:00:00',
            ['https://static.afonso.dev/courses/certificates/android/alura-android-002.png'],
            'https://cursos.alura.com.br/certificate/025b4c07-e8a5-4405-9060-65a33f2e13b8',
        ))
        ->addCertificate(new Certificate(
            'Android Parte 3: Refinando el Proyecto',
            '10:00:00',
            ['https://static.afonso.dev/courses/certificates/android/alura-android-003.png'],
            'https://cursos.alura.com.br/certificate/7ce1d9d3-34ca-4688-a6db-7ed313720f77',
        )),

    (new Course('symfony', 'Symfony'))
        ->addCertificate(new Certificate(
            'Charming Development in Symfony 5',
            '1:50:00',
            ['https://static.afonso.dev/courses/certificates/symfony-5/sfcasts-symfony-5-001.png'],
            'https://symfonycasts.com/certificates/E0FD119CC127',
        ))
        ->addCertificate(new Certificate(
            'Symfony 5 Fundamentals: Services, Config & Environments',
            '2:20:00',
            ['https://static.afonso.dev/courses/certificates/symfony-5/sfcasts-symfony-5-002.png'],
            'https://symfonycasts.com/certificates/F04F9D8DC130',
        ))
];
