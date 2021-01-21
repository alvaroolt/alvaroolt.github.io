<?php

include("configuracion/config_dev.php");
include("class/Libro.php");



$datos = array( "titulo"=>"Libro 1",
                "autor"=>"Autor 1");

$datos2 = array( "titulo"=>"Libro 2",
                 "autor"=>"Autor 2");

echo "Añadiendo<br/>";


// Utilizando set:

// $libro = Libro::getInstancia();

// $libro->set($datos);
// var_dump($libro);

// $libro2 = Libro::getInstancia();

// $libro2->set($datos2);
// var_dump($libro2);

// Utilizando persist:

$libro3 = Libro::getInstancia();

$libro3->setTitulo("t1");
$libro3->setAutor("A1");

$libro3->persist();
var_dump($libro3);

echo $libro3->lastInsert();

?>