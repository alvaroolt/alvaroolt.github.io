<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include "class/Cola.php";

if (!isset($_SESSION["elementos"])) {
    $_SESSION["elementos"] = array();
}

if (isset($_POST["enviarCola"])) {
    if (isset($_POST["elemento"]) && ($_POST["elemento"] != "")) {
        $cola = new Cola($_SESSION["elementos"]);
        $cola->push($_POST["elemento"]);
        $_SESSION["elementos"] = $cola->getElementos();
    }
}

if (isset($_POST["eliminarCola"])) {
    $cola = new Cola($_SESSION["elementos"]);
    $cola->popOut();
    $_SESSION["elementos"] = $cola->getElementos();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos - 4</title>
</head>

<body>
    <h1>Ejercicios básicos - 4</h1>
        <h2>Cola</h2>

        <form action="index.php" method="post">
            Añadir a la cola: <input type="text" name="elemento"><br><br>
            <input type="submit" name="enviarCola" value="Añadir">
            <input type="submit" name="eliminarCola" value="Eliminar Último">
        </form>
        <?php
        if (isset($cola)) {
            echo $cola->devuelvePrimero();
        }
        ?>

    <br><a href='cerrarSesion.php'>Cerrar Sesión</a>
</body>

</html>