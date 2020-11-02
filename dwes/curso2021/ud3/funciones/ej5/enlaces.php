<?php
$urlTrabajo;
$trabajoEscogido;
$arrayTrabajos = array(
    array(
        "Titulo" => "Bucles",
        "Descripcion" => "Tareas de for, while y do while"
    ),
    array(
        "Titulo" => "Arrays",
        "Descripcion" => "Tareas de arrays"
    ),
    array(
        "Titulo" => "Formularios",
        "Descripcion" => "Tareas de formularios con inputs"
    ),
    array(
        "Titulo" => "Funciones",
        "Descripcion" => "Tareas de functions"
    )
);

function generaEnlaces($array)
{
    $tabla =  "<table><tr><th colspan='2'>Trabajos</th></tr><tr><td>Título</td><td>Descripción</td></tr>";

    foreach ($array as $trabajo) {
        $tabla .= "<tr>";
        foreach ($trabajo as $key => $value) {
            $tabla .= "<td><a href=''>$value</a></td>";
        }
        $tabla .= "</tr>";
    }

    $tabla .= "</table>";
    echo $tabla;
}

function muestraTrabajo($titulo, $array) {
    foreach ($array as $trabajo) {
        foreach($trabajo as $key => $value) {
            if ($titulo == $value) {
                echo "<table></table>";
                echo $trabajo['Descripcion'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej5 - Lista de enlaces</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table,
        tr,
        th,
        td {
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <h2>Lista de enlaces.</h2>
    <?php
    if (isset($_GET["trabajo"])) {
        $trabajoEscogido = $_GET["trabajo"];
        echo muestraTrabajo($trabajoEscogido, $arrayTrabajos);
        
    } else {
        generaEnlaces($arrayTrabajos);
        echo "<p>Si quieres que te muestre un trabajo en concreto, escribe en la url el título usando ?trabajo=titulo</p>";
    }
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>