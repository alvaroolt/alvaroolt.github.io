<?php

include "class/Superheroe.php";
include "funciones/funciones.php";

session_start();
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
        <input type="submit" name="mostrar" value="Mostrar superhéroes">
        <input type="submit" name="anadir" value="Añadir superhéroe">
        <a href="includes/logout.php">Cerrar sesión</a>
    </form>
    <?php
    if (isset($_POST["anadir"])) {
        // anadirSuperheroe();

    } else if (isset($_GET["eliminar"])) {
        // eliminarSuperheroe();
        // delete($_GET["eliminar"]);

    } else if (isset($_GET["editar"])) {
        // editarSuperheroe();

    } else if (isset($_POST["mostrar"])) {
        mostrarSuperheroes();
    }
    echo "<div id='codigo'><a href='../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>