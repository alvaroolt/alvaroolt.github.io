<?php
$contador = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Del 1 al 10</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Del 1 al 10.</h2>
    <?php
    while ($contador < 10) {
        $contador++;
        echo "<p>" . $contador . "</p>";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>