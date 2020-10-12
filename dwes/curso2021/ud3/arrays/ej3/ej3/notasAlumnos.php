<?php
$notasClase = array(
    "Álvaro" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "Javi" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "Cristina" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "María" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "Jose Luís" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "Rubén" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "David" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),

    "Antonio" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    ),
    "Rafa" => array(
        "DWEC" => rand(1, 10),
        "DWES" => rand(1, 10),
        "HLC" => rand(1, 10),
        "EIEM" => rand(1, 10),
        "DAW" => rand(1, 10),
        "DIW" => rand(1, 10)
    )
);
$tabla = "<table><tr><th colspan='7'>Notas de los alumnos de 2ºDAW</th></tr><tr><td></td><td>DWEC</td><td>DWES</td><td>HLC</td><td>EIEM</td><td>DAW</td><td>DIW</td></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3-3 - Notas de los alumnos de 2ºDAW</title>
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
    <h2>Notas de los alumnos de 2ºDAW.</h2>

    <?php
    foreach ($notasClase as $alumno => $modulos) {
        $tabla .= "<tr><td>$alumno</td>";
        foreach ($modulos as $modulo => $nota) {
            $tabla .= "<td>$nota</td>";
        }
        $tabla .= "</tr>";
    }

    $tabla .= "</table>";
    echo $tabla;

    echo "<div id='codigo'><a href='../../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>