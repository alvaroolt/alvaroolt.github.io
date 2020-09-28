<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
include "class/pila.php";

$suma = 0;

if (!isset($_SESSION["elementos"])) {
    $_SESSION["elementos"] = array();
}

if (isset($_POST["enviarPila"])) {
    if (isset($_POST["elemento"]) && ($_POST["elemento"] != "")) {
        $pila = new Pila($_SESSION["elementos"]);
        $pila->push($_POST["elemento"]);
        $_SESSION["elementos"] = $pila->getElementos();
    }
}

if (isset($_POST["eliminarPila"])) {
    $pila = new Pila($_SESSION["elementos"]);
    $pila->popOut();
    $_SESSION["elementos"] = $pila->getElementos();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos - 3</title>
</head>

<body>
    <h1>Ejercicios básicos - 3</h1>
    <h2>Pila</h2>
    <form action="index.php" method="post">
        Añadir a la pila: <input type="text" name="elemento"><br><br>
        <input type="submit" name="enviarPila" value="Añadir">
        <input type="submit" name="eliminarPila" value="Eliminar Último">
    </form>
    <?php
    if (isset($pila)) {
        echo $pila->devuelveInverso();
    }
    ?>
    <br><a href='cerrarSesion.php'>Cerrar Sesión</a>
</body>

</html>