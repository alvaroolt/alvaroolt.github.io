<?php
function factorizarNumero()
{
    if (isset($_GET["numero"])) {
        $numero = $_GET["numero"];
        $tabla = "<table>";

        for ($i = 2; $i <= $numero; $i++) {
            while ($numero % $i == 0) {
                $tabla .= "<tr><td>$numero</td><td>$i</td></tr>";
                $numero /= $i;
            }
        }
        $tabla .= "<tr><td>$numero</td><td></td></tr></table>";
        return $tabla;
    } else {
        echo "<p>Añade el número en el final de la url. Ejemplo: ?numero=12</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Factorizar números</title>
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
    <h2>Factorización</h2>
    <?php
    echo factorizarNumero();
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>