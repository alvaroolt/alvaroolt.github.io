<?php
include "include/funciones.php";

$db = conectaDB();

//INSERT
// $nombre = "spider-man";
// $sql = "insert into superheroes(nombre) values('$nombre')";

// if ($db->query($sql)) {
//     echo "OK";
// } else {
//     echo "ERROR";
// }


//SELECT
// $db = conectaDB();

// $sql = "SELECT * FROM superheroes";
// $resultado = $db->query($sql);
// foreach ($resultado as $valor) {
//     echo $valor['nombre'] . "</br>";
// }


//UPDATE
// $db = conectaDB();

// $nombre = "ULTRAHEROE";
// $id = 1;
// $sql = "update superheroes set nombre = '$nombre' where id = $id";
// if ($db->query($sql)) {
//     echo "OK";
// } else {
//     echo "ERROR";
// }


//MOSTRAR NOMBRE Y VELOCIDAD DEL SUPERHEROE, PERO ANTES ASIGNALE 5 EN VELOCIDAD
$db = conectaDB();

$sql = "UPDATE superheroes SET velocidad = 5";
if ($db->query($sql)) {
    echo "OK</br>";

    $sql = "SELECT nombre, velocidad FROM superheroes";
    $resultado = $db->query($sql);
    foreach ($resultado as $valor) {
        echo $valor['nombre'] . " " . $valor['velocidad'] . "</br>";
    }
} else {
    echo "ERROR";
}
