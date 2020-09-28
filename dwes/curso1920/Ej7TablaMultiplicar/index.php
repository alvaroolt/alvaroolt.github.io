<head>
    <style>
        input[type='text'] {
            width: 30px;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<table>
    <?php
    // formulario que es a su vez una tabla con checkox para escoger las tablas de multiplicar
    echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='post'>";
    for ($i = 1; $i < 11; $i++) {
        echo "<label>Tabla del $i: <input type='checkbox' value=" . $i . " name='tablas[]'></label><br>";
    }
    echo "<br><input type='submit' name='enviar'><br>";
    echo "</form>";

    // si se marca algun checkbox, entra en el if
    if (isset($_POST['enviar'])) {
        $numElegidos = $_POST['tablas'];
        echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='post'>";
        echo "<table>";
        echo "<br><tr>";
        echo "<td></td>";
        echo "<td>1</td>";
        echo "<td>2</td>";
        echo "<td>3</td>";
        echo "<td>4</td>";
        echo "<td>5</td>";
        echo "<td>6</td>";
        echo "<td>7</td>";
        echo "<td>8</td>";
        echo "<td>9</td>";
        echo "<td>10</td>";
        echo "</tr>";
        for ($i = 0; $i < sizeof($numElegidos); $i++) {
            echo "<tr>";
            for ($j = 0; $j < 11; $j++) {
                if ($j !== 0) {
                    echo "<td><input type='text' name='numResultado[$numElegidos[$i]][$j]'></td>";
                } else {
                    echo "<td>$numElegidos[$i]</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<input type='hidden' name='numElegidos' value=" . implode(",", $numElegidos) . ">";
        echo "<input type='submit' name='comprobarTablas'>";
        echo "</form>";
    }

    // si hay algo en los input de comprobarTablas, entra en el if
    if (isset($_POST['comprobarTablas'])) {
        $resultados = $_POST["numResultado"];
        // explode convierte un string en array, utilizando ,  como separación
        $numElegidos = explode(",", $_POST["numElegidos"]);
        $sinContestar = 0;
        $aciertos = 0;
        $fallos = 0;

        for ($i = 0; $i < sizeof($numElegidos); $i++) {
            for ($j = 0; $j <= 10; $j++) {
                if (empty($resultados[$numElegidos[$i]][$j])) {
                    $sinContestar++;
                } elseif ($resultados[$numElegidos[$i]][$j] == $numElegidos[$i] * $j) {
                    $aciertos++;
                } else {
                    $fallos++;
                }
            }
        }
        $sinContestar--; //asi evito un error que siempre me marcaba una sin contestar
        echo "Sin responder: $sinContestar<br/>";
        echo "Respuestas erróneas: $fallos<br/>";
        echo "Respuestas correctas: $aciertos<br/>";
    }
    ?>