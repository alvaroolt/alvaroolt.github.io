<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Formulario de cookies</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Formulario de login con cookies</h2>
    <form action="login.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido"></br>
        <label for="edad">Edad: </label>
        <input type="number" name="edad"></br>
        <p>Nivel de inglés:</p>
        <input type="radio" name="ingles" id="b1" value="b1">
        <label for="b1">B1</label> </br>
        <input type="radio" name="ingles" id="b2" value="b2">
        <label for="21">B2</label> </br>
        <input type="radio" name="ingles" id="c1" value="c1">
        <label for="c1">C1</label> </br>
        <input type="radio" name="ingles" id="c2" value="c2">
        <label for="c2">C2</label> </br>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="submit" name="estado" value="Mostrar datos">
        <input type="submit" name="borrar" value="Borrar datos">
    </form>
    <?php

    ?> <?php
        echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>