<?php
include "class/matriz.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>
    <h2>Matrices simétricas</h2>
    <?php

    if (!isset($_POST["tamaño"]) || $_POST["tamaño"] == "") {
        echo "
    
    <form action=\"index.php\" method=\"post\">
        Tamaño de la matriz: <input type=\"number\" name=\"tamaño\" min=\"2\" max=\"10\"><br>
        <br>
        <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
    </form>
    ";
    } else {
        echo "<form action=\"index.php\" method=\"post\">
        <table>
        ";
        for ($i = 0; $i < $_POST["tamaño"]; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $_POST["tamaño"]; $j++) {
                echo "<td>";
                echo "<input type=\"number\" name=\"matriz[$i][$j]\" min=\"0\"/>";
                echo "</td>";
            }
        }
        echo "
        </tr>
        </table>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
        </form>
        ";
    }
    if (isset($_POST["matriz"]) && ($_POST["matriz"] != "")) {
        $matriz = new Matriz($_POST["matriz"]);
        if ($matriz->matrizSimetrica()) {
            echo "<br> La matriz introducida es simétrica";
        } else {
            echo "<br> La matriz introducida no es simétrica";
        }
    }
    ?>
</body>

</html>