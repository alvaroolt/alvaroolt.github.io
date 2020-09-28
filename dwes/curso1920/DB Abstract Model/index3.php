<?php
require_once("config.php");
require_once("Libro.php");
$datos1 = array(
    "titulo"=>"Libro 1",
    "autor"=>"Autor 1"
);
$datos2 = array(
    "titulo"=>"Libro 2",
    "autor"=>"Autor 2"
);

$libro1 = new Libro();
$libro1->set($libro1);
var_dump($datos1);

$libro2 = new Libro();
$libro2->set($libro2);
var_dump($datos2);

echo "Añadiendo<br/>";
