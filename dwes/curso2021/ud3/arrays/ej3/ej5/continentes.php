<?php
$continentes = array(
    "Europa" => array(
        "España" => array("Madrid", "<img src='pictures/spain.jpg'>"),
        "Francia" => array("París", "<img src='pictures/french.jpg'>"),
        "Italia" => array("Roma", "<img src='pictures/italy.jpg'>")
    ),
    "América" => array(
        "México" => array("Ciudad de México", "<img src='pictures/mexico.jpg'>"),
        "Brasil" => array("Río de Janeiro", "<img src='pictures/brasil.jpg'>"),
        "Canadá" => array("Ottawa", "<img src='pictures/canada.jpg'>")
    ),
    "Asia" => array(
        "Japón" => array("Tokio", "<img src='pictures/japon.jpg'>"),
        "China" => array("Pekin", "<img src='pictures/china.jpg'>"),
        "Corea del Sur" => array("Seúl", "<img src='pictures/corea.jpg'>")
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
            border: 1px solid lightgray;
        }
        img {
            width: 20px;
        }
    </style>
</head>

<body>
    <h2>Continentes y países.</h2>

    <?php
    foreach ($continentes as $continente => $paises) {

        $tabla .= "<tr><td>$continente</td>";
        foreach ($paises as $pais => $arrayPaises) {
            $tabla .= "<tr><td></td><td>$pais</td>";

            foreach ($arrayPaises as $clave) {
                $tabla .= "<td>$clave</td>";
            }
            $tabla .= "</tr>";
        }
        $tabla .= "</tr>";
    }

    $tabla .= "</table>";
    echo $tabla;

    echo "<div id='codigo'><a href='../../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>