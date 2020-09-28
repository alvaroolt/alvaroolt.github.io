<?php
include "class/Romano.php";
$numeroDecimal = 0;
$error = "";
if (isset($_POST["convertirADecimal"])) {
    if (empty($_POST["numeroRomano"])) {
        $error = "Introduzca un número";
    } else {
        $numeroRomano = new Romano($_POST["numeroRomano"]);
        $numeroDecimal = $numeroRomano->convertirADecimal();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros Romanos</title>
</head>

<body>
    <h1>Convertir de números romanos a decimal</h1>
    <?php
    echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='post'>";
    echo "<label>Número romano: <input type='text' name='numeroRomano'></label>";
    echo "<span>$error</span>";
    echo "<p>Número en decimal: <span id='numeroDecimal'>" . $numeroDecimal . "</span></p>";
    echo "<input type='submit' name='convertirADecimal' value='convertirADecimal'><br>";
    echo "</form>";
    ?>
</body>

</html>