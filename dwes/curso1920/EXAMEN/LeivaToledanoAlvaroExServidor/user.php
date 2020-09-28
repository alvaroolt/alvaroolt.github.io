<?php
include_once("../clases/Serie.php");
include_once("config/config.php");
include_once("functions.php");
session_start();

$serie = Serie::getInstancia();
$serieFav = SerieFav::getInstancia();

if (!$_SESSION['logeado'] or $_SESSION['perfil'] == "admin") {
    $_SESSION['mensaje'] = "Hubo algún error.";
    header('Location: index.php');
}



?>
<html>

<head>
    <meta charset="utf-8">
    <title>Seriestv</title>
</head>

<body>

    <?php
    echo "<p>" . $_SESSION['mensaje'] . "</p>";
    echo "<br>Has logeado como " . $_SESSION['usuario'] . ".<br>";
    echo "<nav><ul><li><a href=\"../cerrar.php\">Logout</a></li>";
    // echo "<li><a href=\"descargarFactura.php\">Descargar factura</a></li>";
    echo "<li><a href=\"encuesta.php\">Encuesta</a></li></ul></nav>";

    $series = $serie->getAllSeries();

    echo "</br><form action= " . htmlspecialchars($_SERVER["PHP_SELF"]) . " method= \"POST\">";
    echo "<table border=1>";
    echo "<caption>Series</caption>";
    echo "<tr><td>Título</td><td>Portada</td><td>Favorito</td></tr>";
    for ($i = 0; $i < count($series); $i++) {
        echo "<tr>";
        echo "<td>" . $series[$i]['titulo'] . "</td>";
        echo "<td><img width=\"100px\" heigth=\"100px\" src=\"../img/" . $series[$i]['img'] . "\"></img></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
    ?>

</body>

</html>