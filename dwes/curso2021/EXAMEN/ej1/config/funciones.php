<?php
$contador = "";
$aPreguntas = "";
$fallos = "";

function crearCookie($nombre, $valor) {
    setcookie($nombre, $valor, time() + (86400 * 30));
}

function mostrarTest($idTest)
{
    include "arrayPreguntas.php";

    $aPreguntas = $aTests[$idTest - 1]["Preguntas"];

    echo "<h2>Test nº$idTest</h2>";
    echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method=\"post\">";

    foreach ($aPreguntas as $pregunta) {
        echo "<p>" . $pregunta["Pregunta"] . "</p>";
        $contador = 1;
        foreach ($pregunta["respuestas"] as $respuesta) {
            echo "<input type=\"radio\" name=\"pregunta" . $pregunta["idPregunta"] . "\" id=\"pregunta" . $pregunta["idPregunta"] . "respuesta" . $contador . "\" value=\"" . substr($respuesta, 0, 1) . "\"></input><label for=\"pregunta" . $pregunta["idPregunta"] . "respuesta" . $contador . "\">" . $respuesta . "</label><br/>";
            $contador++;
        }
    }

    echo "<br/><input type=\"submit\" name=\"Enviar\">";
    echo "</form>";
}

function comprobarFallos() {

    include "arrayPreguntas.php";

    $aCorrectos = $aTests[0]["Corrector"];
        $fallos = 0;

        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["pregunta$i"])) {
                // echo $_POST["pregunta" . $i];
                if ($_POST["pregunta$i"] != $aCorrectos[$i - 1]) {
                    $fallos++;
                }
            } else if (!isset($_POST["pregunta$i"])) {
                $fallos++;
            }
        }
        return $fallos;
}