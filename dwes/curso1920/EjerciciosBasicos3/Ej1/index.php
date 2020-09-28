<?php

$suma = 0;

if (isset($_POST["enviar"])) {
    if (isset($_POST["numero"]) && ($_POST["numero"] != "")) {
        $numeros = str_split(strval($_POST["numero"]));
        foreach ($numeros as $key => $numero) {
            $suma += $numero;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios basicos - 3</title>
</head>

<body>
    <h1>Ejercicios básicos - 3</h1>
        <h2>Suma los dígitos de un número</h2>
        <form action="index.php" method="post">
            El número: <input type="text" name="numero"><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        if (isset($suma) && $suma != 0) {
            echo "<br>";
            echo "La suma de los dígitos es: " . $suma;
        }
        ?>
</body>

</html>