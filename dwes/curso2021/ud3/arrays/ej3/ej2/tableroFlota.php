<?php
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$tablero = array(
    "A" => $numeros, "B" => $numeros, "C" => $numeros, "D" => $numeros, "E" => $numeros,
    "F" => $numeros, "G" => $numeros, "H" => $numeros, "I" => $numeros, "J" => $numeros
);
$tabla = "<table><tr><th colspan='10'>Hundir la Flota</th></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3-2 - Hundir la flota, tablero</title>
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
    <h2>Tablero de hundir la flota.</h2>

    <?php
    foreach ($tablero as $fila => $columnas) {
        $tabla .= "<tr>";

        foreach ($columnas as $columna) {
            $tabla .= "<td>$fila$columna</td>";
        }

        $tabla .= "</tr>";
    }

    $tabla .= "</table>";
    echo $tabla;

    echo "<div id='codigo'><a href='../../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>