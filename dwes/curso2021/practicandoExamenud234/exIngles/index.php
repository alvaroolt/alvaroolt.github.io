<?php

/**
 * Ejercicio de examen de arrays
 * @author
 */
$arrayPreguntas = array(
    array(
        "pregunta" => "The room where secretaries work is called an .....",
        "tipo" => "text",
        "respuesta" => array("office"),
        "acierto" => 1,
        "fallo" => 0
    ),
    array(
        "pregunta" => "To go to the top of the building you can take the .....",
        "tipo" => "text",
        "respuesta" => array("lift", "elevator"),
        "acierto" => 1,
        "fallo" => 0
    ),
    array(
        "pregunta" => "I ..... tennis every Sunday morning.",
        "tipo" => "Multiple-choice",
        "Opciones" => array("playing", "play", "am playing", "am play"),
        "respuesta" => "play",
        "acierto" => 1,
        "fallo" => -0.25
    ),
    array(
        "pregunta" => "Don't make so much noise. Noriko ..... to study for her ESL test!",
        "tipo" => "Multiple-choice",
        "Opciones" => array("try", "tries", "tried", "is trying"),
        "respuesta" => "is trying",
        "acierto" => 1,
        "fallo" => -0.25
    ),
    array(
        "pregunta" => "Jun-Sik ..... his teeth before breakfast every morning.",
        "tipo" => "Multiple-choice",
        "Opciones" => array("will cleaned", "is cleaning", "cleans", "clean"),
        "respuesta" => "cleans",
        "acierto" => 1,
        "fallo" => -0.25
    ),
    array(
        "pregunta" => "Sorry, she can't come to the phone. She ..... a bath!",
        "tipo" => "Multiple-choice",
        "Opciones" => array("is having", "having", "have", "has"),
        "respuesta" => "is having",
        "acierto" => 1,
        "fallo" => -0.25
    ),
    array(
        "pregunta" => "    ..... many times every winter in Frankfurt.",
        "tipo" => "Multiple-choice",
        "Opciones" => array("It snows", "snowed", "It is snowing", "It is snow"),
        "respuesta" => "It snows",
        "acierto" => 1,
        "fallo" => -0.25
    )
);
$notaFinal = "";
$respuestasCorrectas = ["", "", "", "", "", "", "", ""];
$niveles = array("A1", "A2", "B1", "B2", "C1", "C2");

if (isset($_POST["nivel"])) {
    foreach ($niveles as $key => $value) {
        if ($_POST["nivel"] == $value) {
            $nivelElegido[$key] = "selected";
        }
    }
}
if (isset($_POST["enviar"])) {
    $procesaFormulario = true;
    $valorNombre = $_POST["nombre"];

    if ($procesaFormulario) {
        $nota = 0;
        for ($i = 0; $i < sizeof($arrayPreguntas); $i++) {
            if ($arrayPreguntas[$i]["tipo"] == "text") {
                if (in_array($_POST["pregunta" . $i], $arrayPreguntas[$i]["respuesta"])) {
                    $nota += $arrayPreguntas[$i]["acierto"];
                    $respuestasCorrectas[$i] = "correcto";
                } else {
                    $respuestasCorrectas[$i] = "fallo";
                }
            } else if ($arrayPreguntas[$i]["tipo"] == "Multiple-choice") {
                if (isset($_POST["pregunta" . $i])) {
                    if ($_POST["pregunta" . $i] == $arrayPreguntas[$i]["respuesta"]) {
                        $nota += $arrayPreguntas[$i]["acierto"];
                        $respuestasCorrectas[$i] = "correcto";
                    } else {
                        $nota += $arrayPreguntas[$i]["fallo"];
                        $respuestasCorrectas[$i] = "fallo";
                    }
                } else {
                    $respuestasCorrectas[$i] = "fallo";
                }
            }
        }
        $notaFinal = "<br/><h3>Su nota es un: " . $nota . "</h3>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/mystyle.css">
    <title>Examen inglés</title>
</head>

<body>
    <section>
        <?php
        //Creacion form:
        echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method=\"post\">";
        echo "<p><label>Nombre:<input type=\"text\" name=\"nombre\" required/></label></p>";
        echo "<p><label>Nivel de inglés: <select name=\"nivel\"></label></p>";
        for ($i = 0; $i < sizeof($niveles); $i++) {
            echo "<option value=" . $niveles[$i] . " " . $nivelElegido[$i] . ">" . $niveles[$i] . "</option>";
            // echo $niveles[$i];
        }
        echo "</select><br/>";
        for ($i = 0; $i < sizeof($arrayPreguntas); $i++) {
            echo "<h4>" . $arrayPreguntas[$i]["pregunta"] . " <span class=\"" . $respuestasCorrectas[$i] . "\"></span><br/> </h4>";
            if ($arrayPreguntas[$i]["tipo"] == "text") {
                echo "<input type=\"text\" name=\"pregunta" . $i . "\"><br/>";
            } else if ($arrayPreguntas[$i]["tipo"] == "Multiple-choice") {
                for ($j = 0; $j < sizeof($arrayPreguntas[$i]["Opciones"]); $j++) {
                    echo "<input type=\"radio\" name=\"pregunta" . $i . "\" value=\"" . $arrayPreguntas[$i]["Opciones"][$j] . "\">" . $arrayPreguntas[$i]["Opciones"][$j] . "</input><br/>";
                }
            }
        }
        echo "<br/><input type=\"submit\" name=\"enviar\">";
        echo "</form>";
        echo $notaFinal;
        ?>
    </section>
</body>

</html>