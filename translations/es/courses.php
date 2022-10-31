<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . "/../en/courses.php";

/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

$trans = array_replace_recursive($default, [
    "metas" => [
        "title" => "Cursos",
    ],
    "page" => [
        "title" => "Últimos cursos",
        "syllabus" => "Temario",
        "certificates" => "Certificados",
        "certificate" => "Certificado",
        "checkAuthenticity" => "Comprobar autenticidad",
        "authenticity" => "Autenticidad",
    ],
    "courses" => [
        [ // kotlin-hex
            "name" => "API HTTP en Kotlin aplicando Arquitectura Hexagonal",
        ], // kotlin-hex
        [ // kotlin
            "name" => "Formación Kotlin",
            "topics" => [
                "Orientación a Objetos",
                "Herencia, Polimorfismo e Interfaz",
                "Recursos del lenguaje con paquetes y composición",
                "Manejo de excepciones y referencias nulas",
                "Desarrollo con colecciones, arrays y listas",
                "Collections: Set y Map",
                "Características del paradigma funcional",
            ],
        ], // kotlin
        [ // java-oca
            "name" => "Formación: Certificación Java (OCA)",
            "topics" => [
                "Tipos de Datos",
                "Operadores y condicionales",
                "Creando y usando Arrays",
                "Crear y usar bucles",
                "Métodos y encapsulación",
                "Herencia, Interfaz y Polimorfismo",
                "Lidiando com excepciones",
                "Lambdas, nueva API java.time, wrappers y autoboxing",
            ],
            "certificates" => [
                ["title" => "Formación: Certificación Java (OCA)"]
            ],
        ], // java-oca
        [ // java
            "name" => "Formación Java",
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
        ], // java
        [ // android
            "name" => "Formación Android",
            "certificates" => [
                ["title" => "Crea una aplicación móvil"],
                ["title" => "Avanzando con Listeners, Menú y UI"],
                ["title" => "Refinando el proyecto"],
            ],
        ], // android
        [], // symfony
    ],
]);

$trans = json_decode(json_encode($trans));
