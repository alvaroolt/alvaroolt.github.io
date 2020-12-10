<?php
include "config/arrayPreguntas.php";
include "config/funciones.php";
// print_r($aTests);

$fallos = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Álvaro Leiva Toledano">
    <title>Examen - Autoescuela</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        .noApto {
            color: red;
        }
        .apto {
            color: green;
        }
    </style>
</head>

<body>
    <h2>Test autoescuela - Álvaro Leiva Toledano</h2>
    <?php

    if (!isset($_COOKIE["ultimoTest"])) {
        mostrarTest(1);
        crearCookie("ultimoTest", 1);
    } else {
        mostrarTest($nTest);
    }

    if (isset($_POST["Enviar"])) {
        echo "</br>Tuviste " . comprobarFallos() . " fallos en el último test.";
        if (comprobarFallos() >2) {
            echo "<p class='noApto'>No apto.</p>";
        } else {
            echo "<p class='apto'>Apto.</p>";
        }
    }
    ?>
    <a href="config/borrarCookie.php">Reiniciar</a>
</body>

</html>