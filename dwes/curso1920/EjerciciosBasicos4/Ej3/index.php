<?php
if (isset($_POST["compruebaExpresion"])) {
    if (isset($_POST["expresion"]) && ($_POST["expresion"] != "")) {
        $equilibrada = true;
        $parentesis = array();
        $contador = 0;
        $expresion = str_split(trim($_POST["expresion"]));
        for ($i = 0; $i < count($expresion); $i++) {
            if ($expresion[$i] == "(") {
                $contador++;
                array_push($parentesis, $contador);
            }

            if ($expresion[$i] == ")") {
                $contador--;
                array_push($parentesis, $contador);
            }
        }
        print_r($parentesis);
        foreach ($parentesis as $key => $value) {
            if ($value < 0) {
                $equilibrada = false;
            }
        }
        if ($parentesis[(count($parentesis) - 1)] != 0) {
            $equilibrada = false;
        }
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
    <h2>Expresión equilibrada</h2>
    <form action="index.php" method="post">
        Espresión a determinar: <input type="text" name="expresion"><br><br>
        <input type="submit" name="compruebaExpresion" value="Comprobar">
    </form>
    <?php
    if (isset($equilibrada)) {
        if ($equilibrada) {
            echo "La funcion " . $_POST["expresion"] . " está equilibrada";
        } else {
            echo "La funcion " . $_POST["expresion"] . " no está equilibrada";
        }
    }
    ?>
</body>

</html>