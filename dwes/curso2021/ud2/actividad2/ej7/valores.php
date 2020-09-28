<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej7 - Obtener los valores</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Obtener el valor de variables.</h2>
    <?php
    $string = "daw";
    $numero = 21;
    $boolean = true;
    $decimal = 1.4;
    $null = NULL;

    echo $string . " es " . gettype($string) . "</br>";
    echo $numero . " es " . gettype($numero) . "</br>";
    echo $boolean . " es " . gettype($boolean) . "</br>";
    echo $decimal . " es " . gettype($decimal) . "</br>";
    echo $null . " es " . gettype($null) . "</br>";

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>