<?php
function DNIesValido()
{
    if (isset($_GET["dni"])) {
        $dni = $_GET["dni"];
        $letra = (substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni % 23, 1));
        $nif = "$dni$letra";
        if (strlen($dni) == 8) {
            return "<p>La letra de $dni es $letra. DNI completo: $nif.</p>";
        }
    } else {
        echo "<p>Añade el dni en el final de la url. Ejemplo: ?dni=12345678</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Comprobar letra del DNI</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Letra del DNI</h2>
    <?php
    echo DNIesValido();
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>