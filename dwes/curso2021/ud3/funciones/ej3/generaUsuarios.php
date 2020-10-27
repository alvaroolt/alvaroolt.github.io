<?php
function generarUsuarios()
{
    $tabla = "<table><tr><th>Alumnos</th><th>Nombre de usuario</th></tr>";
    $aUsuarios = array(
        array('nombre' => 'Jesús', 'apellido1' => 'Martínez', 'apellido2' => 'García'),
        array('nombre' => 'Mercedes', 'apellido1' => 'Calamaro', 'apellido2' => 'Pedrajas'),
        array('nombre' => 'Elena', 'apellido1' => 'Pérez', 'apellido2' => '')
    );

    foreach ($aUsuarios as $usuario => $key) {
        echo (substr(normaliza($key['apellido1']), 0, 2)) . (substr(normaliza($key['apellido2']), 0, 2)) . (substr(normaliza($key['nombre']), 0, 1) . "</br>");
    }
}

function normaliza($cadena)
{
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Generar usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 2px solid black;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2>Generación de usuarios</h2>
    <?php
    generarUsuarios();
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>