<?php
include "flota.php";

$flota = new Flota();
for ($i=1;$i<=10;$i++) {
    switch($i) {
        case 1:
        case 2:
        case 3:
        case 4:
            $tipo = 1;
        case 5:
        case 6:
        case 7:
            $tipo = 2;
        case 8:
        case 9:
            $tipo = 3;
        case 10:
            $tipo = 4;
    }
    $barco = new Barco($i, $tipo);
    $flota->addBarco($barco);
}

$flota->colocaBarcos($barco);
$flota->mostrarFlota();
?>