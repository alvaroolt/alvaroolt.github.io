<?php
include "class/Carta.php";
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
    <h2>Cartas y lista</h2>

    <?php
    $carta = new Carta();
    $carta->escribeCartas();

    $cartas = $carta->getCartas();
    foreach ($cartas as $key => $datos) {
        echo "<br><a href=\"./cartas/carta" . $datos[0] . ".txt\" download=\"./cartas/carta" . $datos[0] . ".txt\">Descargar Carta de " . $datos[0] . "</a>";
    }
    ?>
</body>

</html>