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
    (new Course('java-oca', 'Formación para Certificación Java (OCA)'))
        ->addTopic("Tipos de Datos")
        ->addTopic("Operadores")
        ->addTopic("Creando y usando Arrays")
        ->addTopic("Bucles")
        ->addTopic("Métodos y encapsulación")
        ->addTopic("Relaciones entre clases")
        ->addTopic("Lidiando com excepciones")
        ->addTopic("Java SE 8: Contenido más allá del examen")
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
        ->addCertificate(new Certificate(
            'Java Parte 1: Primeros Pasos',
            '8:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-001.png'],
            'https://cursos.alura.com.br/certificate/d4a8a0ec-93af-4a30-83cf-d752ef7cfc85',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 2: Introducción a Orientación a Objetos',
            '8:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-002.png'],
            'https://cursos.alura.com.br/certificate/d5220098-1e0e-4c88-abf1-11e72ea5a578',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 3: Entendiendo Herencia e Interfaz',
            '16:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-003.png'],
            'https://cursos.alura.com.br/certificate/30a63569-03dc-4076-a219-3b4c7c0746e0',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 4: Entendiendo Excepciones',
            '12:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-004.png'],
            'https://cursos.alura.com.br/certificate/47896f22-dff6-4d06-90e3-abcca684efae',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 5: Pacotes y java.lang',
            '12:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-005.png'],
            'https://cursos.alura.com.br/certificate/b0f9537d-6459-40f0-8fb8-72bf75f1b2b6',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 6: Conociendo java.util',
            '12:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-006.png'],
            'https://cursos.alura.com.br/certificate/13420cf9-ac95-4948-b967-4a858432b492',
        ))
        ->addCertificate(new Certificate(
            'Java Parte 7: Trabajando con java.io',
            '12:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-007.png'],
            'https://cursos.alura.com.br/certificate/1dede327-b735-4e09-aff7-e49723ac8fb6',
        ))
        ->addCertificate(new Certificate(
            'Java: Dominando las Collections',
            '20:00:00',
            ['https://static.afonso.dev/courses/certificates/java/alura-java-008.png'],
            'https://cursos.alura.com.br/certificate/684d0cca-3df6-4377-878b-de09592cac15',
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

    (new Course('symfony', 'Symfony 5'))
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
