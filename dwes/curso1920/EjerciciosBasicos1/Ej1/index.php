<?php
include "class/dni.php";

if (isset($_POST["enviar"])) {
    if (isset($_POST["dni"]) && ($_POST["dni"] != "")) {
        $dni = new Dni($_POST["dni"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios básicos - 1</title>
</head>

<body>
    <h1>Ejercicios básicos - 1</h1>
    <fieldset>
        <h2>Comprobar DNI</h2>
        <form action="index.php" method="post">
            Dni: <input type="text" name="dni"><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        if (isset($_POST["dni"]) && ($_POST["dni"] != "")) {
            echo "<br>";
            echo $dni->getMensaje();
        }
        ?>
    </fieldset>
</body>

</html>