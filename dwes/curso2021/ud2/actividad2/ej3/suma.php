<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Suma de números</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Suma de 2 números.</h2>
    <form action="suma.php" method="post">
        Número 1: <input type="number" name="num1"></br>
        Número 2: <input type="number" name="num2">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST["num1"]) && ($_POST["num1"] != "") && isset($_POST["num2"]) && ($_POST["num2"] != "")) {

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        $suma = $num1 + $num2;

        echo "</br> La suma de ambos números es " . $suma;
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>