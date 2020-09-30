<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Estación del año.</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Exo&family=Grandstander&family=Lemonada&family=MuseoModerno&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Estación del año.</h2>
    <?php
    $diaHoy = date("j");
    $mesHoy = date("n");
    // $diaHoy = 15;
    // $mesHoy = 8;

    if (($mesHoy > 3 && $mesHoy < 6) || (($mesHoy == 3 && $diaHoy > 20) || ($mesHoy == 6 && $diaHoy < 20))) {
        echo "<div class='estacion' id='primavera'><h1>PRIMAVERA</h1></div>";
    } elseif (($mesHoy > 6 && $mesHoy < 9) || (($mesHoy == 6 && $diaHoy > 20) || ($mesHoy == 9 && $diaHoy < 20))) {
        echo "<div class='estacion' id='verano'><h1>VERANO</h1></div>";
    } elseif (($mesHoy > 9 && $mesHoy < 12) || (($mesHoy == 9 && $diaHoy > 20) || ($mesHoy == 12 && $diaHoy < 20))) {
        echo "<div class='estacion' id='otono'><h1>OTOÑO</h1></div>";
    } else {
        echo "<div class='estacion' id='invierno'><h1>INVIERNO</h1></div>";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>