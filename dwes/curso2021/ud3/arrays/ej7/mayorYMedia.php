<?php
$numeros = array();
$tabla = "<table><tr><th>Números</th></tr>";
$numeroMayor = 0;
$media = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Número mayor y media</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }

        tr {
            text-align: center;
        }

        th,
        td {
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <h2>Número mayor y media.</h2>
    <?php
    # bucle que recorre el array $números (que está vacío) para llenarlo con 20 números aleatorios enteros
    for ($i = 0; $i < 20; $i++) {
        array_push($numeros, mt_rand(0, 100));
        $tabla .= "</td><td>" . $numeros[$i] . "</td></tr>";

        #$media suma cada número que se añade al array, para que cuando acabe el bucle se divida entre 20 (lo cual es la media)
        $media += $numeros[$i];

        # condición para comparar si el número mayor del que disponemos es mayor o no que el valor del array que estamos recorriendo ahora. Si el valor del array es mayor, sustituimos el anterior por este
        if ($numeros[$i] > $numeroMayor) {
            $numeroMayor = $numeros[$i];
        }
    }
    $tabla .= "</table>";
    $media = $media / 20;

    echo $tabla;
    echo "Número mayor: $numeroMayor</br>";
    echo "Media de los números: $media";

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>