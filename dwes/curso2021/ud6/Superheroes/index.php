<?php

include "class/Superheroe.php";
include "funciones/funciones.php";

$sh = Superheroe::getInstancia();
$superheroes = $sh->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD- Superhéroes</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>
    <header>
        <?php include "includes/header.php"; ?>
    </header>
    <form action="index.php" method="post">
        <input type="text" name="textBuscar">
        <input type="submit" name="buscar" value="Buscar superhéroe"> </br>
        <input type="submit" name="mostrar" value="Mostrar superhéroes">
        <input type="submit" name="anadir" value="Añadir superhéroe">
    </form>
    <?php
    if (isset($_POST["buscar"])) {
        $resultado = $sh->buscarPorNombre($_POST["textBuscar"]);
        echo count($resultado) . " coincidencias:</br>";
        // print_r($resultado);

        foreach ($resultado as $key => $value) {
            echo "Nombre: " . $value["nombre"] . "</br>";
        }
    } else if (isset($_POST["anadir"])) {
        // anadirSuperheroe();

    } else if (isset($_GET["eliminar"])) {
        // eliminarSuperheroe();
        // delete($_GET["eliminar"]);

    } else if (isset($_GET["editar"])) {
        // editarSuperheroe();

    } else if (isset($_POST["mostrar"])) {
        $tablaSuperheroes = "<table><tr><th colspan='100'>TABLA SUPERHÉROES</th></tr><tr><th>Id</th><th>Nombre</th><th>Velocidad</th></tr>";

        foreach ($superheroes as $valor) {
            $tablaSuperheroes .= "<tr><td>" . $valor['id'] . "</td><td>" . $valor['nombre'] . "</td><td>" . $valor['velocidad'] . "</td><td><a href='index.php?eliminar=" . $valor['id'] . "'><img src='pictures/eliminar.png'><a/></td><td><a href='index.php?editar=" . $valor['id'] . "'><img src='pictures/editar.png'><a/></td></tr>";
        }
        echo $tablaSuperheroes;
    }
    echo "<div id='codigo'><a href='../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>