<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Operaciones</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Operaciones con variables.</h2>
    <?php
    $x = 10;
    $y = 7;

    echo "<p>Las variables son las siguientes: </br>x = " . $x . "</br>y = " . $y . ".</br></br>Operaciones:</p>";
    echo $x . " + " . $y . " = " . ($x + $y) . "</br>";
    echo $x . " - " . $y . " = " . ($x - $y) . "</br>";
    echo $x . " x " . $y . " = " . ($x * $y) . "</br>";
    echo $x . " / " . $y . " = " . ($x / $y) . "</br>";
    echo $x . " % " . $y . " = " . ($x % $y) . "</br>";

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>