<?php
$verbosIrregulares = array(
    "ser, estar" => array("be", "was/were", "been"),
    "convertirse en, hacerse" => array("become", "became", "become"),
    "empezar, comenzar" => array("begin", "began", "begun"),
    "morder" => array("bite", "bit", "bitten"),
    "soplar" => array("blow", "blew", "blown"),
    "romper" => array("break", "broke", "broken"),
    "llevar, traer" => array("bring", "brought", "brought"),
    "construir" => array("build", "built", "built"),
    "comprar" => array("buy", "bought", "bought"),
    "poder" => array("can", "could", "been able"),
    "coger, atrapar, tomar" => array("catch", "caught", "caught"),
    "elegir, escoger" => array("choose", "chose", "chosen"),
    "venir" => array("come", "came", "come"),
    "costar" => array("cost", "cost", "cost"),
    "cortar" => array("cut", "cut", "cut"),
    "hacer" => array("do", "did", "done"),
    "dibujar" => array("draw", "drew", "drawn"),
    "beber" => array("drink", "drank", "drunk"),
    "conducir" => array("drive", "drove", "driven"),
    "comer" => array("eat", "ate", "eaten"),
    "caer" => array("fall", "fell", "fallen"),
    "sentir" => array("feel", "felt", "felt"),
    "pelear, luchar" => array("fight", "fought", "fought"),
    "encontrar" => array("find", "found", "found"),
    "volar" => array("fly", "flew", "flown")
);
$tabla = "<table><tr><th colspan='4'>Verbos irregulares - inglés</th></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3-4 - Verbos irregulares inglés</title>
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
    <h2>Verbos irregulares en inglés.</h2>

    <?php
    foreach ($verbosIrregulares as $verboEspañol => $verbo) {
        $tabla .= "<tr><td>$verboEspañol</td>";
        foreach ($verbo as $modulo => $nota) {
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