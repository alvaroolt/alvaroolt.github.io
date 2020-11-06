<?php

$mensaje = "";
function contadorAccesos()
{
    if (!isset($_COOKIE['accesos'])) {
        setcookie('accesos', 0, time() + 4);
        echo "he creado la cookie";
        $mensaje = "Has entrado en el sitio 1 vez";
    } else {
        $_COOKIE['accesos']++;
        setcookie('accesos', $_COOKIE['accesos']++, time() + 4);
        $mensaje = "Has entrado en el sitio " . $_COOKIE['accesos'] . " veces.";
    }

    return $mensaje;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Accesos al servidor</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Accesos al servidor.</h2>
    <?php
    echo contadorAccesos();
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>