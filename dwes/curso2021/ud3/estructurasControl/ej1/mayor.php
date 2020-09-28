<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Número mayor</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Número mayor.</h2>
    <form action="mayor.php" method="post">
        Número 1: <input type="number" name="num1"></br>
        Número 2: <input type="number" name="num2">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST["num1"]) && ($_POST["num1"] != "") && isset($_POST["num2"]) && ($_POST["num2"] != "")) {

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        if ($num1 > $num2) {
            echo $num1 . " es mayor que " . $num2;
        } elseif ($num1 < $num2) {
            echo $num2 . " es mayor que " . $num1;
        } else {
            echo "Son iguales.";
        }
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>