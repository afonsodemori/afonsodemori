<?php
/** @noinspection PhpObjectFieldsAreOnlyWrittenInspection */

// TODO: Using composer is failing in GitHub. Don't know why...
require_once __DIR__ . '/../../src/Model/Certificate.php';
require_once __DIR__ . '/../../src/Model/Course.php';

use App\Model\Certificate;
use App\Model\Course;

$trans = new stdClass();
$trans->metas = new stdClass();
$trans->metas->title = 'Courses';
$trans->page = new stdClass();
$trans->page->title = 'Last courses';
$trans->page->syllabus = 'Syllabus';
$trans->page->certificates = 'Certificates';
$trans->page->certificate = 'Certificate';
$trans->page->checkAuthenticity = 'Check authenticity';
$trans->page->authenticity = 'Authenticity';

$trans->courses = [
    (new Course('java-oca', 'Training: Java Certification (OCA)'))
        ->addTopic("Data Types")
        ->addTopic("Operators and conditionals")
        ->addTopic("Creating and using Arrays")
        ->addTopic("Using loops")
        ->addTopic("Methods and encapsulation")
        ->addTopic("Inheritance, Interface and Polymorphism")
        ->addTopic("Exception handling")
        ->addTopic("Lambdas, new java.time API, wrappers and autoboxing")
        ->addCertificate(new Certificate(
            'Training: Java Certification (OCA)',
            '76:00:00',
            [
                '/assets/certificates/java-oca/alura-java-oca-front.png',
                '/assets/certificates/java-oca/alura-java-oca-back.png',
            ],
            'https://cursos.alura.com.br/certificate/d4a8a0ec-93af-4a30-83cf-d752ef7cfc85',
        )),

    (new Course('java', 'Java training'))
        ->addTopic('JRE and JDK: Compile and run your program')
        ->addTopic('Understanding Object Orientation')
        ->addTopic('Polymorphism, Inheritance and Interfaces')
        ->addTopic('Create, Throw, and Handle Exceptions')
        ->addTopic('Java and java.lang')
        ->addTopic('Java and java.util')
        ->addTopic('java.io: Streams, Reader and Writers')
        ->addTopic('Collections: Lists, Sets and Maps')
        ->addTopic('What\'s New in Java 8 and 9')
        ->addTopic('TDD: Automated Testing with JUnit')
        ->addCertificate(new Certificate(
            'Java training',
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
