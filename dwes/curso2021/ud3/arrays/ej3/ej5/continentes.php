<?php
$continentes = array(
    "Europa" => array(
        "España" => array("Madrid", "spain.jpg"),
        "Francia" => array("París", "french.jpg"),
        "Italia" => array("Roma", "italy.jpg")
    ),
    "América" => array(
        "México" => array("Ciudad de México", "mexico.jpg"),
        "Brasil" => array("Río de Janeiro", "brasil.jpg"),
        "Canadá" => array("Ottawa", "canada.jpg")
    ),
    "Asia" => array(
        "Japón" => array("Tokio", "japon.jpg"),
        "China" => array("Pekin", "china.jpg"),
        "Corea del Sur" => array("Seúl", "corea.jpg")
    )
);
$tabla = "<table><tr><th>CONTINENTES</th></tr><tr><td>Continente</td><td>País</td><td>Capital</td><td>Bandera</td></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3-5 - Información sobre continentes</title>
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
    <h2>Continentes y países.</h2>

    <?php
    foreach ($continentes as $continente => $paises) {
        // echo $continente;
        $tabla .= "<tr><td>$continente</td>";
        foreach ($paises as $pais => $arrayPaises) {
            $tabla .= "<td>$pais</td>";
            // echo $pais;
            foreach ($arrayPaises as $clave) {
                // POR AQUI
                // echo $arrayPaises[0];
            }
        }
        $tabla .= "</tr>";
    }

    $tabla .= "</table>";
    echo $tabla;

    echo "<div id='codigo'><a href='../../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>