<?php
include "./class/primo.php";

$cincoPrimos = array();
$contador = 0;

if (isset($_POST["enviar"])) {

    if (isset($_POST["primo"]) && ($_POST["primo"] != "")) {
        $primo = new Primo($_POST["primo"]);
    }
}
function esPrimo($numero)
{
    $esprimo = 0;
    if ($numero == 2 || $numero == 3 || $numero == 5 || $numero == 7) {
        return true;
    } else {
        for ($b = 1; $b < $numero; $b++) {
            if ($numero % $b == 0) {
                $esprimo++;
            }
        }
        if ($esprimo >= 2) {
            return false;
        } else {
            return true;
        }
    }
}

for ($i = 2; $i < 20; $i++) {
    if (esPrimo($i)) {
        if ($contador < 5) {
            array_push($cincoPrimos, $i);
        }
        $contador++;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos - 2 y 3</title>
</head>

<body>
    <h1>Ejercicios básicos - 2 y 3</h1>

    <fieldset>
        <h2>Comprobar Primo</h2>
        <form action="index.php" method="post">
            Comprobar primo: <input type="number" name="primo"><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        if (isset($_POST["primo"]) && ($_POST["primo"] != "")) {
            echo "<br>";
            echo $primo->getMensaje();
            if ($primo->getMensaje() == "El número introducido es primo" && count($_SESSION["arrayPrimos"]) < 6) {
                array_push($_SESSION["arrayPrimos"], $_POST["primo"]);
            }
        }
        ?>
    </fieldset>

    <fieldset>
        <h2>5 primeros primos</h2>
        <?php
        foreach ($cincoPrimos as $valor) {
            echo $valor;
            echo "<br>";
        }
        ?>

    </fieldset>
</body>

</html>