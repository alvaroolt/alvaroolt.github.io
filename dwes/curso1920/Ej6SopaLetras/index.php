<!--Crea una sopa de letras utilizando PHP, de manera que las palabras sean capitales de países.-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopa de Letras - Álvaro Leiva Toledano</title>
    <style>
        tr:nth-child(odd) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>Sopa de letras - DWES</h1>
    <?php
    $tablero = array();
    $arrayCapitales = array("MADRID", "ROMA", "PARIS", "BERLIN", "LONDRES", "VIENA", "LISBOA", "BRUSELAS", "TUNEZ");

    // x es el eje de coordenadas x (horizontal)
    // y es el eje de coordenadas y (vertical)
    // sentido es el sentido de la palabra respecto a su dirección (izquierda a derecha, derecha a izquierda, arriba a abajo, abajo a arriba. Lo mismo ocurre en diagonal)
    // capital es la capital en cuestión
    $arrayEjeCoordenadas = array("x" => 0, "y" => 0, "sentido" => 0, "capital" => array());

    function calcularDireccion($arrayEjeCoordenadas)
    {
        switch ($arrayEjeCoordenadas["sentido"]) {
            case 0:
                // si $arrayEjeCoordenadas["sentido"] es 0, la palabra va de derecha a izquierda
                $arrayEjeCoordenadas["x"] -= 1;
                break;
            case 1:
                // si $arrayEjeCoordenadas["sentido"] es 1, la palabra va de abajo a arriba
                $arrayEjeCoordenadas["y"] += 1;
                break;
            case 2:
                // si $arrayEjeCoordenadas["sentido"] es 2, la palabra va de izquierda a derecha
                $arrayEjeCoordenadas["x"] += 1;
                break;
            case 3:
                // si $arrayEjeCoordenadas["sentido"] es 3, la palabra va de arriba a abajo
                $arrayEjeCoordenadas["y"] -= 1;
                break;
            case 4:
                // si $arrayEjeCoordenadas["sentido"] es 4, la palabra va de arriba a abajo hacia la izquierda (diagonal)
                $arrayEjeCoordenadas["x"] -= 1;
                $arrayEjeCoordenadas["y"] += 1;
                break;
            case 5:
                // si $arrayEjeCoordenadas["sentido"] es 5, la palabra va de abajo a arriba hacia la izquierda (diagonal)
                $arrayEjeCoordenadas["x"] -= 1;
                $arrayEjeCoordenadas["y"] -= 1;
                break;
            case 6:
                // si $arrayEjeCoordenadas["sentido"] es 6, la palabra va de abajo a arriba hacia la derecha (diagonal)
                $arrayEjeCoordenadas["x"] += 1;
                $arrayEjeCoordenadas["y"] += 1;
                break;
            case 7:
                // si $arrayEjeCoordenadas["sentido"] es 7, la palabra va de arriba a abajo hacia la derecha (diagonal)
                $arrayEjeCoordenadas["x"] += 1;
                $arrayEjeCoordenadas["y"] -= 1;
                break;
        }
        return $arrayEjeCoordenadas;
    }

    for ($i = 0; $i < 20; $i++) {
        array_push($tablero, array());
        for ($j = 0; $j < 20; $j++) {
            array_push($tablero[$i], 0);
        }
    }

    function annadirPalabra($tablero, $arrayEjeCoordenadas)
    {
        for ($i = 0; $i < sizeof($arrayEjeCoordenadas["capital"]); $i++) {
            $tablero[$arrayEjeCoordenadas["x"]][$arrayEjeCoordenadas["y"]] = "<b>" . $arrayEjeCoordenadas["capital"][$i] . "<b>";
            $arrayEjeCoordenadas = calcularDireccion($arrayEjeCoordenadas);
        }
        return $tablero;
    }

    $valido;
    $arrayCoordenadas;
    $arrayRepetidas = array("");
    $datosCopia;
    $contador = 5;
    do {
        do {
            $valido = true;
            $palabraElegida = $arrayCapitales[rand(0, sizeof($arrayCapitales) - 1)];
            $arrayEjeCoordenadas["sentido"] = rand(0, 7);
            $arrayEjeCoordenadas["x"] = rand(0, 19);
            $arrayEjeCoordenadas["y"] = rand(0, 19);
            $arrayEjeCoordenadas["capital"] = str_split($palabraElegida);

            foreach ($arrayRepetidas as $value) {
                if ($palabraElegida == $value) {
                    $valido = false;
                }
            }

            if ($valido) {
                for ($i = 0; $i < sizeof($arrayEjeCoordenadas["capital"]); $i++) {
                    if ($arrayEjeCoordenadas["x"] < 0 or $arrayEjeCoordenadas["y"] < 0 or $arrayEjeCoordenadas["x"] > 19 or $arrayEjeCoordenadas["y"] > 19) {
                        $valido = false;
                    } else {
                        if ($tablero[$arrayEjeCoordenadas["x"]][$arrayEjeCoordenadas["y"]] != $arrayEjeCoordenadas["capital"][$i]) {
                            if ($tablero[$arrayEjeCoordenadas["x"]][$arrayEjeCoordenadas["y"]] != "0") {
                                $valido = false;
                            }
                        }
                    }
                    $arrayEjeCoordenadas = calcularDireccion($arrayEjeCoordenadas);
                }
            }
            $datosCopia = $arrayEjeCoordenadas;
            $arrayCoordenadas = array();
        } while (!$valido);
        $contador--;
        array_push($arrayRepetidas, $palabraElegida);
        $tablero = annadirPalabra($tablero, $datosCopia);
    } while ($contador != 0);

    echo "<table border=1px solid black>";
    $abecedario = array(
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
        "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"
    );
    for ($i = 0; $i < 20; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 20; $j++) {
            if ($tablero[$i][$j] == "0") {
                echo "<td>" . $abecedario[rand(0, 25)] . "</td>";
            } else {
                echo "<td>" . $tablero[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<br/><a href='../verCodigo.php?src=" . __FILE__ . "'><button>Ver Codigo</button></a>";
    ?>
</body>

</html>