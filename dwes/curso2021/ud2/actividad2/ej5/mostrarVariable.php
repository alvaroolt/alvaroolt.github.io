<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej5 - Declaración de variable</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Declaración de variable.</h2>
    <?php
    $x = 8;
    echo "Valor actual " . $x;
    echo "</br>";

    $x = $x + 2;
    echo "Suma 2. Valor ahora " . $x;
    echo "</br>";

    $x = $x - 4;
    echo "Resta 4. Valor ahora " . $x;
    echo "</br>";

    $x = $x * 5;
    echo "Multiplica por 5. Valor ahora " . $x;
    echo "</br>";

    $x = $x / 3;
    echo "Divide por 3. Valor ahora " . $x;
    echo "</br>";

    $x++;
    echo "Incrementa el valor en 1. Valor ahora " . $x;
    echo "</br>";

    $x--;
    echo "Decrementa el valor en 1. Valor ahora " . $x;
    echo "</br>";

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>