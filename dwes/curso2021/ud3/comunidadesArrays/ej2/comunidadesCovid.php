<?php
$comunidades = array(
    array(
        "comunidad" => "Andalucía",
        "provincias" => array(
            "Córdoba" => 90,
            "Sevilla" => 70,
            "Málaga" => 125,
            "Granada" => 70,
            "Jaén" => 40,
            "Almería" => 100,
            "Cádiz" => 110
        )
    ),
    array(
        "comunidad" => "Madrid",
        "provincias" => array(
            "Madrid" => 800
        )
    ),
    array(
        "comunidad" => "Aragón",
        "provincias" => array(
            "Huesca" => 50,
            "Teruel" => 70,
            "Zaragoza" => 90
        )
    ),
    array(
        "comunidad" => "Asturias",
        "provincias" => array(
            "Oviedo" => 30
        )
    ),
    array(
        "comunidad" => "Baleares",
        "provincias" => array(
            "Palma de Mallorca" => 30
        )
    ),
    array(
        "comunidad" => "Canarias",
        "provincias" => array(
            "Santa Cruz de Tenerife" => 40,
            "Las Palmas de Gran Canaria" => 35
        )
    ),
    array(
        "comunidad" => "Cantabria",
        "provincias" => array(
            "Santander" => 50
        )
    ),
    array(
        "comunidad" => "Castilla-La Mancha",
        "provincias" => array(
            "Albacete" => 50,
            "casos Real" => 80,
            "Cuenca" => 90,
            "Guadalajara" => 110,
            "Toledo" => 60
        )
    ),
    array(
        "comunidad" => "Castilla y León",
        "provincias" => array(
            "Ávila" => 94,
            "Burgos" => 70,
            "León" => 100,
            "Salamanca" => 130,
            "Segovia" => 60,
            "Soria" => 40,
            "Valladolid" => 90,
            "Zamora" => 90
        )
    ),
    array(
        "comunidad" => "Cataluña",
        "provincias" => array(
            "Barcelona" => 750,
            "Gerona" => 110,
            "Lérida" => 70,
            "Tarragona" => 90
        )
    ),
    array(
        "comunidad" => "Comunidad Valenciana",
        "provincias" => array(
            "Alicante" => 90,
            "Castellón de la Plana" => 50,
            "Valencia" => 90
        )
    ),
    array(
        "comunidad" => "Extremadura",
        "provincias" => array(
            "Badajoz" => 40,
            "Cáceres" => 50
        )
    ),
    array(
        "comunidad" => "Galicia",
        "provincias" => array(
            "La Coruña" => 90,
            "Lugo" => 90,
            "Orense" => 90,
            "Pontevedra" => 90
        )
    ),
    array(
        "comunidad" => "Murcia",
        "provincias" => array(
            "Murcia" => 90
        )
    ),
    array(
        "comunidad" => "Navarra",
        "provincias" => array(
            "Pamplona" => 90
        )
    ),
    array(
        "comunidad" => "País Vasco",
        "provincias" => array(
            "Bilbao" => 60,
            "San Sebastián" => 110,
            "Vitoria" => 80
        )
    ),
    array(
        "comunidad" => "La Rioja",
        "provincias" => array(
            "Logroño" => 60
        )
    )
);
$tabla = "<table><tr><th>Comunidades autónomas</th><th>Casos confirmados de Covid19</th></tr>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidades</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }
        th, td{
            text-align: center;
        }
        .grave {
            color: lightcoral;
        }
        .leve {
            color: green;
        }
    </style>
</head>

<body>
    <h2>Comunidades recorridas por un array - Casos Covid19.</h2>
    <?php
    foreach ($comunidades as $i => $comunidad) {
        foreach ($comunidad as $j => $provincia) {
            if ($j == "comunidad") {
                $tabla .= "<tr>";
                $tabla .= "<td>$provincia</td>";
            }
            if ($j == "provincias") {
                $sumaCasos = 0;
                foreach ($provincia as $k => $casos) {
                    $sumaCasos += $casos;
                }
                if ($sumaCasos >= 500) {
                    $tabla .= "<td class='grave'>$sumaCasos</td>";
                } else {
                    $tabla .= "<td class='leve'>$sumaCasos</td>";
                }
                $tabla .= "</tr>";
            }
        }
    }
    $tabla .="</table>";
    echo "$tabla";
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>