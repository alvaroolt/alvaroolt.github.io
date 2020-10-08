<?php
$elementos = array();
$tabla = "<table><tr><th>Nº días</th><th>Ventas (en €)</th></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Ventas de un comercio</title>
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
        th, td {
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <h2>Ventas de un comercio.</h2>
    <?php
    for ($i = 0; $i < 20; $i++) {
        array_push($elementos, mt_rand(0 * 10, 100 * 10) / 10);
    }

    echo "Ventas de los últimos 20 días:</br>";
    for ($i = 0; $i < 20; $i++) {
        $tabla .= "<tr><td>" . ($i+1) . "</td><td>" . $elementos[$i] . "€</td></tr>";
    }
    $tabla .= "</table>";
    echo $tabla;

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>