<?php

include "DBAbstractModel.php";
include "Superheroe.php";
include "funciones.php";

$datos = array(
    "nombre" => "Capitan America",
    "velocidad" => 4
);

echo "Clases sin instancia";
$sh_sing1 = Superheroe::getInstancia();
var_dump($sh_sing1);
// $sh_sing2 = Superheroe::getInstancia();
// var_dump($sh_sing2);

echo "Clases instanciadas";
$sh_sing1 = new Superheroe();
var_dump($sh_sing1);
// $sh_sing2 = new Superheroe();
// var_dump($sh_sing2);

$sh = Superheroe::getInstancia();
$sh->set($datos);
echo "----" . $sh->getMensaje() . "</br>";
$id = $sh->lastInsert();
$datos = $sh->get($id);
// foreach ($datos as $elemento) {
//     foreach ($elemento as $key => $valor) {
//         echo "$key: $valor</br>";
//     }
// }