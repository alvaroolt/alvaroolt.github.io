<?php
$arrayHorario = array(
    "DWES" => array(
        "nombre" => "Desarrollo web en entorno servidor",
        "profesor" => "José Aguilera",
        "horario" => array(
            array("Dia" => "Lunes", "Hora" => "1"),
            array("Dia" => "Lunes", "Hora" => "2"),
            array("Dia" => "Martes", "Hora" => "1"),
            array("Dia" => "Martes", "Hora" => "2"),
            array("Dia" => "Jueves", "Hora" => "3"),
            array("Dia" => "Jueves", "Hora" => "4"),
            array("Dia" => "Viernes", "Hora" => "2"),
            array("Dia" => "Viernes", "Hora" => "3")
        )
    ),
    "HLC" => array(
        "nombre" => "Desarrollo Android",
        "profesor" => "Lourdes Magarín",
        "horario" => array(
            array("Dia" => "Jueves", "Hora" => "1"),
            array("Dia" => "Jueves", "Hora" => "2"),
            array("Dia" => "Viernes", "Hora" => "1")
        )
    ),
    "DWECL" => array(
        "nombre" => "Desarrollo web en entorno cliente",
        "profesor" => "Lourdes Magarín",
        "horario" => array(
            array("Dia" => "Lunes", "Hora" => "3"),
            array("Dia" => "Lunes", "Hora" => "4"),
            array("Dia" => "Miercoles", "Hora" => "3"),
            array("Dia" => "Miercoles", "Hora" => "4"),
            array("Dia" => "Viernes", "Hora" => "5"),
            array("Dia" => "Viernes", "Hora" => "6")
        )
    ),
    "DIWEB" => array(
        "nombre" => "Diseño Web",
        "profesor" => "Jaime Rabasco",
        "horario" => array(
            array("Dia" => "Lunes", "Hora" => "5"),
            array("Dia" => "Lunes", "Hora" => "6"),
            array("Dia" => "Martes", "Hora" => "3"),
            array("Dia" => "Martes", "Hora" => "4"),
            array("Dia" => "Miercoles", "Hora" => "1"),
            array("Dia" => "Miercoles", "Hora" => "2")
        )
    ),
    "EIEM" => array(
        "nombre" => "Empresas",
        "profesor" => "Raquel Castro",
        "horario" => array(
            array("Dia" => "Miercoles", "Hora" => "5"),
            array("Dia" => "Miercoles", "Hora" => "6"),
            array("Dia" => "Jueves", "Hora" => "5"),
            array("Dia" => "Jueves", "Hora" => "6")
        )
    ),
    "DAWEB" => array(
        "nombre" => "Despliegue Apps Web",
        "profesor" => "María Del Carmen Tripiana",
        "horario" => array(
            array("Dia" => "Martes", "Hora" => "5"),
            array("Dia" => "Martes", "Hora" => "6"),
            array("Dia" => "Viernes", "Hora" => "4")
        )
    )
);
/**
 * Ejercicio de examen de arrays
 * Utilizando el array de horario, crea un script que genere un documento HTML que incluya una
 * tabla con el horario del curso y leyendas para profesorado y asignaturas. Utiliza una función
 * horarioDia que reciba como parámetro de entrada el día de la semana y devuelva un array con
 * los módulos impartidos ese día.
 */

/**
 * Funcion que recibe como parametros una cadena con el dia ("Lunes","Martes",...) y el horario.
 * Devuelve un array con las asignaturas de ese día ordenadas mediante su i­ndice (ascendente 0-5).
 */
function horarioDia($dia, $arrayHorario)
{
    $arrayAsignaturas = [];
    foreach ($arrayHorario as $asignatura => $array) {
        foreach ($array["horario"] as $key => $valor) {
            if ($valor["Dia"] == $dia) {
                switch ($valor["Hora"]) {
                    case "1":
                        $arrayAsignaturas[0] = $asignatura;
                        break;
                    case "2":
                        $arrayAsignaturas[1] = $asignatura;
                        break;
                    case "3":
                        $arrayAsignaturas[2] = $asignatura;
                        break;
                    case "4":
                        $arrayAsignaturas[3] = $asignatura;
                        break;
                    case "5":
                        $arrayAsignaturas[4] = $asignatura;
                        break;
                    case "6":
                        $arrayAsignaturas[5] = $asignatura;
                        break;
                }
            }
        }
    }
    print_r($arrayAsignaturas);
    return $arrayAsignaturas;
}
/**
 * Funcion que crea la tabla y la muestra en pantalla.
 */
function crearHorario($arrayHorario)
{
    $cabecera = ["Hora", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];
    echo "<table border=\"1px solid black\"><tr>";
    foreach ($cabecera as $c) {
        echo "<th>$c</th>";
    }
    echo "</tr>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr><td>" . ($i + 1) . "</td>";
        for ($j = 0; $j < 5; $j++) {
            $asignaturaActual = horarioDia($cabecera[$j + 1], $arrayHorario);
            echo "<td>" . $asignaturaActual[$i] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
/**
 * Funcion que muestra la leyenda sobre las asignaturas y profesores
 */
function infoHorario($arrayHorario)
{
    $nombreAsig = "";
    $nombreAsigCompleto = "";
    $nombreProfesor = "";

    foreach ($arrayHorario as $asignatura => $value) {
        $nombreAsig = $asignatura;
        $nombreAsigCompleto = $value["nombre"];
        $nombreProfesor = $value["profesor"];
        echo "<p>" . $nombreAsig . " => " . $nombreAsigCompleto . " .  Profesor: " . $nombreProfesor . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo "<title>Examen Horario</title>" ?>
</head>

<body>
    <section>
        <?php
        crearHorario($arrayHorario);
        infoHorario($arrayHorario);
        ?>
    </section>
    <?php echo "<br/><a href=" . "../../verCodigo.php?src=" . str_replace("&bsol;", "", __FILE__) . "><button>Ver código</button></a>"; ?></footer>
</body>

</html>