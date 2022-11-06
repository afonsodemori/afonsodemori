<?php
/** @noinspection JsonEncodingApiUsageInspection */

require __DIR__ . "/../en/courses.php";

/** @var stdClass $trans */
$default = json_decode(json_encode($trans), true);

unset($default["topBar"]["localeOptions"]);

$trans = array_replace_recursive($default, [
    "metas" => [
        "title" => "Cursos",
    ],
    "page" => [
        "title" => "Últimos cursos",
        "syllabus" => "Sumário",
        "certificates" => "Certificados",
        "certificate" => "Certificado",
        "checkAuthenticity" => "Comprovar autenticidade",
        "authenticity" => "Autenticidade",
    ],
    "topBar" => [
        "locale" => "Português",
        "localeOptions" => [
            "en" => [
                "label" => "English",
                "link" => "/courses/en",
            ],
            "es" => [
                "label" => "Español",
                "link" => "/courses/es",
            ],
        ],
    ],
    "courses" => [
        [ // kotlin-hex
            "name" => "API HTTP em Kotlin aplicando Arquitetura Hexagonal"
        ], // kotlin-hex
        [ // kotlin
            "name" => "Formação Kotlin",
            "topics" => [
                "Orientação a Objetos",
                "Herança, Polimorfismo e Interface",
                "Recursos da linguagem com pacotes e composição",
                "Lidando com exceptions e referências nulas",
                "Desenvolvimento com coleções, arrays e listas",
                "Collections: Set e Map",
                "Recursos do paradigma funcional",
            ],
        ], // kotlin
        [ // java-oca
            "name" => "Formação: Certificação Java (OCA)",
            "topics" => [
                "Tipos de Dados",
                "Operadores e condicionais",
                "Criando e usando Arrays",
                "Construir e usar laços de repetição",
                "Métodos e encapsulamento",
                "Herança, Interface e Polimorfismo",
                "Lidando com exceções",
                "Lambdas, nova API java.time, wrappers e autoboxing",
            ],
            "certificates" => [
                ["title" => "Formação: Certificação Java (OCA)"]
            ],
        ], // java-oca
        [ // java
            "name" => "Formação Java",
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
        ], // java
        [ // android
            "name" => "Formação Android",
            "certificates" => [
                ["title" => "Crie um app mobile"],
                ["title" => "Avançando com Listeners, Menu e UI"],
                ["title" => "Refinando o projeto"],
            ],
        ], // android
        [], // symfony
    ],
]);

$trans = json_decode(json_encode($trans));
