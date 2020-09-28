<?php
include_once("class/Encuesta.php");
include_once("config/config.php");
include_once("config/funciones.php");
session_start();

$encuesta = Encuesta::getInstancia();


if (!$_SESSION['logeado'] or $_SESSION['perfil'] != "admin") {
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
    echo "<br>Usted está logeado como " . $_SESSION['usuario'] . ".<br>";
    echo "<nav><ul><li><a href=\"../cerrar.php\">Logout</a></li></ul></nav>";

    echo "<h2>Media de la encuesta:</h2> ";
    for ($i = 1; $i <= 5; $i++) {
        echo "<b>Pregunta " . $i . ": " . $encuesta->getPuntuacionMedia($i) . "/5</b><br>";
    }

    echo "</br><form action= " . htmlspecialchars($_SERVER["PHP_SELF"]) . " method= \"POST\">";
    echo "<table border=1>";
    echo "<caption>Series</caption>";
    echo "<tr><td>Título</td><td>Portada</td></tr>";
    $series = $serie->getAllSeries();
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