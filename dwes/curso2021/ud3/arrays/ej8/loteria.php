<?php
$tablaLoteria = "<table><tr><th>LOTERÍA PRIMITIVA</th></tr>";
$arrayLoteria = array(
    array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
    array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49)
);
$loteriaAMostrar = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Lotería primitiva</title>
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
    <h2>Lotería primitiva.</h2>
    <?php
    foreach ($arrayLoteria[0] as $i => $numeros) {
        echo $numeros;
        array_push($loteriaAMostrar, $numeros);

        for ($x = 1; $x <= 6; $x++) {
            foreach ($arrayLoteria[1] as $i => $numeros) {

            }
            // array_push($loteriaAMostrar, $arrayLoteria[1][$x]);
            // echo $arrayLoteria[1][$x];
        }
        echo "</br>";

        // INCOMPLETO 
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>