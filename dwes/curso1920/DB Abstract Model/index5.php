<?php
require_once("constantes.php");
require_once("Libro.php");

$libro1 = Libro::getInstancia();
$libro1->setTitulo("Titulo en entidad");
$libro1->setAutor("Autor en entidad");
$libro1->guardarenBD();
echo $libro1->lastInsert();

var_dump($libro1);