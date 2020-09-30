<?php
$table = "<table>";
for ($i = 1; $i < 11; $i++) {
    $table .= "<tr><th> Tabla del " . $i . "</th>";
    for ($x = 1; $x < 11; $x++) {
        $table .= "<td>" . $x * $i . "</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Tabla de multiplicar</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        tr:nth-child(odd) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h2>Tabla de multiplicar.</h2>
    <?php
    echo $table;
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>