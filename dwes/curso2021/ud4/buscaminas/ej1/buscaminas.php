<?php
session_start();
$minas;
// $posVertical;
// $posHorizontal;
$filas;
$columnas;

if (!isset($_SESSION["tableroMinas"])) {
    $_SESSION["tableroMinas"] = array();
    $_SESSION["tableroVisible"] = array();
}

function rellenarTablero($tablero, $filas, $columnas) {
    // for ($i = 0; $i < 9; $i++) {
    //     for ($j = 0; $j < 9; $j++) {
    //         $tablero[$i][$j] = 0;
    //         // echo $tablero[$i][$j];
    //     }
    //     // echo "</br>";
    // }
    $tablero = array();
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], 0);
        }
    }
}

function colocarMinas($tablero)
{
    // rellenarTablero($tablero);

    $minas = 10;
    while ($minas > 0) {
        $posVertical = rand(1, 9);
        $posHorizontal = rand(1, 9);
        // echo "$posVertical \t $posHorizontal </br>";
        // $tablero[$posVertical][$posHorizontal] = -1;
        array_push($tablero[$posVertical][$posHorizontal], -1);
        $minas--;
    }

    // print_r($tablero);
}

function mostrarTablero($tablero)
{
    print_r($tablero);
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

    </style>
</head>

<body>
    <h2>Buscaminas</h2>
    <?php
    rellenarTablero($_SESSION["tableroMinas"], 9, 9);
    colocarMinas($_SESSION["tableroMinas"]);
    mostrarTablero($_SESSION["tableroMinas"]);
    ?>
    <a href="cerrarSesion.php">Cerrar sesión</a>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>