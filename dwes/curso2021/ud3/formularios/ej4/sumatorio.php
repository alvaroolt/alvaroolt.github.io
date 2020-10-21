<?php
$formSuma = "<form action='sumatorio.php' method='post'>";
$inputsValidos = true;
$sumaTotal = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Sumatorio y formulario</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        input {
            margin: 15px 5px;
        }
    </style>
</head>

<body>
    <h2>Sumatorio con formulario.</h2>
    <form action="sumatorio.php" method="post">
        <label for="numero">Número a sumar: </label>
        <input type="number" name="numero">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php

    if (isset($_POST["numero"]) && $_POST["numero"] > 0 && isset($_POST["enviar"])) {

        $cantidadNumerosASumar = $_POST["numero"];

        for ($i = 1; $i <= $cantidadNumerosASumar; $i++) {
            $formSuma .=
                "<label for='numSuma$i'>Número $i: </label>
            <input type='number' name='numSuma$i'></br>";
        }
        $formSuma .= "<input type='submit' name='aceptar' value='Aceptar'></form>";
        echo $formSuma;
    }

    if (isset($_POST["aceptar"])) {

        $contador = 1;
        while (isset($_POST["numSuma$contador"]) && $_POST["numSuma$contador"] != "") {
            $sumaTotal += $_POST["numSuma$contador"];
            $contador++;
        };

        echo "<p>La suma total es $sumaTotal</p>";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>