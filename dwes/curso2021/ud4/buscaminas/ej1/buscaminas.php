<?php
session_start();
$minas;
$posVertical;
$posHorizontal;
$filas;
$columnas;
$contador;

if (!isset($_SESSION["tableroMinas"])) {
    $_SESSION["tableroMinas"] = array();
    $_SESSION["tableroVisible"] = array();
}

function rellenarTablero($tablero, $filas, $columnas)
{
    $tablero = array();
    for ($i = 0; $i <= $filas; $i++) {
        array_push($tablero, array());
        for ($j = 0; $j <= $columnas; $j++) {
            array_push($tablero[$i], 0);
        }
    }
    return $tablero;
}

function colocarMinas($tablero)
{
    $minas = 10;
    while ($minas > 0) {
        $posVertical = rand(1, 9);
        $posHorizontal = rand(1, 9);
        if ($tablero[$posVertical][$posHorizontal] != -1) {
            $tablero[$posVertical][$posHorizontal] = -1;
            $minas--;
        }
    }

    return $tablero;
}

function colocarNumeros($tablero, $filas, $columnas)
{
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            // $contador = 0;
            if ($tablero[$i][$j] != -1) {
                for ($y = $i-1; $y<=($i+1); $y++) {
                    for ($x = $j-1; $x<=($j+1); $x++) {
                        if ($y >= 0 && $x >= 0 && $y < $filas && $x < $columnas) {
                            if ($tablero[$y][$x] == -1) {
                                $tablero[$y][$x]++;
                            }
                        }
                    }
                }
            }
        }
    }

    return $tablero;
}

function mostrarTablero($tablero)
{
    echo "<table><tr><th colspan=10>BUSCAMINAS</th></tr>";
    foreach ($tablero as $y) {
        echo "<tr>";
        foreach ($y as $x) {
            echo "<td>" . $x . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/estilos.css" /> -->
    <style>
        table {
            border: 2px solid black;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h2>Buscaminas</h2>
    <?php
    // rellena el array del tablero de ceros (campo sin minas)
    $_SESSION["tableroMinas"] = rellenarTablero($_SESSION["tableroMinas"], 9, 9);

    // coloca -1 que son minas
    $_SESSION["tableroMinas"] = colocarMinas($_SESSION["tableroMinas"]);

    // muestra el tablero
    mostrarTablero($_SESSION["tableroMinas"]);

    $_SESSION["tableroMinas"] = colocarNumeros($_SESSION["tableroMinas"], 9, 9);
    mostrarTablero($_SESSION["tableroMinas"]);
    ?>
    <a href="cerrarSesion.php">Cerrar sesión</a>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>