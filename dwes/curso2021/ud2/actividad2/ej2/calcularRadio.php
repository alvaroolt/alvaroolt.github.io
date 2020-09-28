<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Calcular área</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Calcular el área de un círculo.</h2>
    <form action="calcularRadio.php" method="post">
        Radio del círculo: <input type="number" name="radio">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST["radio"]) && ($_POST["radio"] != "")) {

        $radio = $_POST["radio"];
        $area = round(pi() * pow($radio, 2), 2);

        echo "</br> La fórmula del área de un círculo es A = π x r^2";
        echo "</br> Por lo tanto, el área del círculo es " . $area . "cm2.";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>