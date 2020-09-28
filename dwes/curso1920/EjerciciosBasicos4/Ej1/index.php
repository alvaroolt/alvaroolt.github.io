<?php
$suma = 0;
$vector = array();

function recursiva($indice, $vector)
{
    if ($indice == 0) {
        return 0;
    } else {
        return recursiva($indice - 1, $vector) + ($vector[$indice - 1]);
    }
}

if (isset($_POST["enviar"])) {
    if (isset($_POST["indice"]) && ($_POST["indice"] != "")) {
        for ($i = 1; $i < ($_POST["indice"] + 1); $i++) {
            array_push($vector, $i);
        }

        $suma = recursiva($_POST["indice"], $vector);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos - 4</title>
</head>

<body>
    <h1>Ejercicios básicos - 4</h1>
    <h2>Vector</h2>
    <form action="index.php" method="post">
        El indice del vector: <input type="number" name="indice"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($suma) && $suma != 0) {
        echo "<br>La suma de los elementos del vector dado es: " . $suma;
    }
    ?>
</body>

</html>