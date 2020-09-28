<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Ficha personal</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Ficha personal</h2>
    <?php
    $nombre = "Álvaro";
    $apellido = "Leiva";
    $edad = "21 años";
    $localidad = "Córdoba";

    echo "<table border='1px solid black'><tr><td>Nombre</td><td>" . $nombre . "</td></tr><tr><td>Apellido</td><td>" . $apellido . "</td></tr><tr><td>Edad</td><td>" . $edad . "</td></tr><tr><td>Localidad</td><td>" . $localidad . "</td></tr></table>";
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>