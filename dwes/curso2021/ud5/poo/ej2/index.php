<?php
include "Menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Clase Menú</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Clase Menú</h2>
    <form action="index.php" method="post">
        <label for="opciones">Cantidad de opciones en el menú: </label>
        <input type="number" name="opciones" id="opciones"><br>

        <input type="radio" id="vertical" name="posicion" value="vertical" checked>
        <label for="vertical">Vertical</label><br>
        <input type="radio" id="horizontal" name="posicion" value="horizontal">
        <label for="horizontal">Hoizontal</label><br>

        <input type="submit" name="aceptar" value="Aceptar">
    </form>
    <?php

    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>