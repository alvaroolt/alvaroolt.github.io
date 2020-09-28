<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include "class/Ficha.php";

$fichasMostradas = array();

if (!isset($_SESSION["fichasMostradas"])) {
    $_SESSION["fichasMostradas"] = array();
}
for ($i = 1; $i < 4; $i++) {
    $numeroPuzle = rand(1, 5);
    $ficha = array($numeroPuzle, $i, "./img/" . $numeroPuzle . $i . ".jpg");
    array_push($_SESSION["fichasMostradas"], $ficha);
}


if (isset($_POST["cambiar1"])) {
    if ($_SESSION["fichasMostradas"][0][0] < 5) {
        $_SESSION["fichasMostradas"][0][0] = ($_SESSION["fichasMostradas"][0][0] + 1);
    } else {
        $_SESSION["fichasMostradas"][0][0] = 1;
    }

    $_SESSION["fichasMostradas"][0][2] = "./img/" . $_SESSION["fichasMostradas"][0][0] . $_SESSION["fichasMostradas"][0][1] . ".jpg";
}

if (isset($_POST["cambiar2"])) {
    if ($_SESSION["fichasMostradas"][1][0] < 5) {
        $_SESSION["fichasMostradas"][1][0] = ($_SESSION["fichasMostradas"][1][0] + 1);
    } else {
        $_SESSION["fichasMostradas"][1][0] = 1;
    }

    $_SESSION["fichasMostradas"][1][2] = "./img/" . $_SESSION["fichasMostradas"][1][0] . $_SESSION["fichasMostradas"][1][1] . ".jpg";
}

if (isset($_POST["cambiar3"])) {
    if ($_SESSION["fichasMostradas"][2][0] < 5) {
        $_SESSION["fichasMostradas"][2][0] = ($_SESSION["fichasMostradas"][2][0] + 1);
    } else {
        $_SESSION["fichasMostradas"][2][0] = 1;
    }

    $_SESSION["fichasMostradas"][2][2] = "./img/" . $_SESSION["fichasMostradas"][2][0] . $_SESSION["fichasMostradas"][2][1] . ".jpg";
}


if (isset($_SESSION["fichasMostradas"])) {
    foreach ($_SESSION["fichasMostradas"] as $key => $ficha) {
        array_push($fichasMostradas, new Ficha($ficha[0], $ficha[1], $ficha[2]));
    }
    if ($fichasMostradas[0]->getPuzle() == $fichasMostradas[1]->getPuzle() && $fichasMostradas[1]->getPuzle() == $fichasMostradas[2]->getPuzle()) {
        echo "<h1>Enhorabuena, has ganado</h1>";
        echo "<div style=\"width:1250px; display: inline-block;\"><div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[0]->getImagen() . "\" alt=\"Primera Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        </form></div>";

        echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[1]->getImagen() . "\" alt=\"Segunda Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        </form></div>";

        echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[2]->getImagen() . "\" alt=\"Tercera Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        </form></div></div>";
    } else {
        echo "<div style=\"width:1250px; display: inline-block;\"><div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[0]->getImagen() . "\" alt=\"Primera Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        <input style=\"width:100%\" type=\"submit\" name=\"cambiar1\" value=\"Siguiente Ficha\">
        </form></div>";

        echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[1]->getImagen() . "\" alt=\"Segunda Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        <input style=\"width:100%\" type=\"submit\" name=\"cambiar2\" value=\"Siguiente Ficha\">
        </form></div>";

        echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"" . $fichasMostradas[2]->getImagen() . "\" alt=\"Tercera Ficha\">";
        echo "<form action=\"index.php\" method=\"post\">
        <input style=\"width:100%\" type=\"submit\" name=\"cambiar3\" value=\"Siguiente Ficha\">
        </form></div></div>";
    }
}
echo "<br><a href='cerrarSesion.php'>Reiniciar</a><br>";
