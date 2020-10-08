<?php
$comunidades = array(
    array(
        "comunidad" => "Andalucía",
        "provincias" => array(
            "Córdoba",
            "Sevilla",
            "Málaga",
            "Granada",
            "Jaén",
            "Almería",
            "Cádiz"
        )
    ),
    array(
        "comunidad" => "Madrid",
        "provincias" => array(
            "Madrid"
        )
    ),
    array(
        "comunidad" => "Aragón",
        "provincias" => array(
            "Huesca",
            "Teruel",
            "Zaragoza"
        )
    ),
    array(
        "comunidad" => "Asturias",
        "provincias" => array(
            "Oviedo"
        )
    ),
    array(
        "comunidad" => "Baleares",
        "provincias" => array(
            "Palma de Mallorca"
        )
    ),
    array(
        "comunidad" => "Canarias",
        "provincias" => array(
            "Santa Cruz de Tenerife",
            "Las Palmas de Gran Canaria"
        )
    ),
    array(
        "comunidad" => "Cantabria",
        "provincias" => array(
            "Santander"
        )
    ),
    array(
        "comunidad" => "Castilla-La Mancha",
        "provincias" => array(
            "Albacete",
            "Ciudad Real",
            "Cuenca",
            "Guadalajara",
            "Toledo"
        )
    ),
    array(
        "comunidad" => "Castilla y León",
        "provincias" => array(
            "Ávila",
            "Burgos",
            "León",
            "Salamanca",
            "Segovia",
            "Soria",
            "Valladolid",
            "Zamora"
        )
    ),
    array(
        "comunidad" => "Cataluña",
        "provincias" => array(
            "Barcelona",
            "Gerona",
            "Lérida",
            "Tarragona"
        )
    ),
    array(
        "comunidad" => "Comunidad Valenciana",
        "provincias" => array(
            "Alicante",
            "Castellón de la Plana",
            "Valencia"
        )
    ),
    array(
        "comunidad" => "Extremadura",
        "provincias" => array(
            "Badajoz",
            "Cáceres"
        )
    ),
    array(
        "comunidad" => "Galicia",
        "provincias" => array(
            "La Coruña",
            "Lugo",
            "Orense",
            "Pontevedra"
        )
    ),
    array(
        "comunidad" => "Murcia",
        "provincias" => array(
            "Murcia"
        )
    ),
    array(
        "comunidad" => "Navarra",
        "provincias" => array(
            "Pamplona"
        )
    ),
    array(
        "comunidad" => "País Vasco",
        "provincias" => array(
            "Bilbao",
            "San Sebastián",
            "Vitoria"
        )
    ),
    array(
        "comunidad" => "La Rioja",
        "provincias" => array(
            "Logroño"
        )
    )
);
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
    </style>
</head>

<body>
    <h2>Comunidades recorridas por un array.</h2>
    <?php
    foreach ($comunidades as $i => $comunidad) {
        echo "<ul>";
        foreach ($comunidad as $j => $provincia) {
            if ($j == "comunidad") {
                echo "<li>$provincia<ul>";
            }
            if ($j == "provincias") {
                foreach ($provincia as $k => $ciudad) {
                    echo "<li>$ciudad</li>";
                }
                echo "</ul></li>";
            }
        }
        echo "</ul>";
    }
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>