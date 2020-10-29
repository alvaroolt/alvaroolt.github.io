<?php
$numeroUrl;
function sumatorioRecursivo($numeros)
{
    if (strlen($numeros) < 2) {
        return $numeros;
    } else {
        $ultimoDigito = $numeros % 10; // el módulo de 10 devuelve el resto de numeros, ejemplo: 32 % 10 = 2
        $numeros = $numeros / 10; // la división de 10 devuelve el primer dígito, pues solo recoge el entero, ejemplo: 32 / 10 = 3.2 = 3
        return $ultimoDigito + sumatorioRecursivo($numeros);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Sumatorio por url</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Función recursiva. Sumatorio por Url.</h2>
    <?php
    if (isset($_GET["numero"])) {
        $numeroUrl = $_GET["numero"];
        echo "<p>La suma de los digitos es " . sumatorioRecursivo($numeroUrl) . "</p>";
    } else {
        echo "<p>Añade números al final de la url. Ejemplo: ?numero=12</p>";
    }
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>