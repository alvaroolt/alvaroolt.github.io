<?php
// include "funciones.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XXX</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        
    </style>
</head>

<body>
    <h2>XXX</h2>
    <!-- <form action="agenda.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero"></br>
        <input type="submit" name="anadir" value="Añadir contacto">
        <input type="submit" name="mostrar" value="Mostrar agenda"> -->
        <a href="cerrarSesion.php">Borrar todos los contactos</a>
    <!-- </form> -->
    <?php
    // if (isset($_POST["anadir"])) {
    //     anadirContacto();
    // } else if (isset($_GET["el"])) {
    //     eliminarContacto($_GET["el"]);
    // } else if (isset($_POST["mostrar"])) {
    //     echo mostrarAgenda($agenda);
    // }
    ?> <?php
        echo "<div id='codigo'><a href='verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>