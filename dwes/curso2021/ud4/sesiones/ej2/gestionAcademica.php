<?php
session_start();

$nombre;
$nota1;
$nota2;
$nota3;
$sumaMedia;
$tablaNotas = "<table><tr><th colspan=5>Notas DWES</th></tr><tr><td>ID</td><td>Alumno</td><td>Nota</td><td>Nota media</td></tr>";

if (!isset($_SESSION["arrayAlumnos"])) {
    $_SESSION["arrayAlumnos"] = array(
        array(
            "id" => 1,
            "nombre" => "Álvaro",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
        array(
            "id" => 2,
            "nombre" => "Javi",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
        array(
            "id" => 3,
            "nombre" => "Cristina",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
        array(
            "id" => 4,
            "nombre" => "Jose Luís",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
        array(
            "id" => 5,
            "nombre" => "Antonio",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
    );
}

function anadirAlumno()
{
    $nombre = $_POST["nombre"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $idMax = count($_SESSION["arrayAlumnos"]) - 1;

    if (empty($nombre) || empty($nota1) || empty($nota2) || empty($nota3)) {
        echo "<p>Faltan datos.</p>";
    } else if (!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3)) {
        echo "<p>Has introducido notas no numéricas.</p>";
    } else {
        $nuevoAlumno = array(
            "id" => $_SESSION["arrayAlumnos"][$idMax]["id"] + 1,
            "nombre" => $nombre,
            "notas" => array(
                "1er trimestre" => $nota1,
                "2º trimestre" => $nota2,
                "3er trimestre" => $nota3
            )
        );

        array_push($_SESSION["arrayAlumnos"], $nuevoAlumno);
        echo "<p>Alumno añadido correctamente.</p>";
    }
}

function eliminarAlumno($alumnoAEliminar)
{
    $i = 0;
    while ($i < count($_SESSION["arrayAlumnos"]) && $_SESSION["arrayAlumnos"][$i]["id"] != $alumnoAEliminar) {
        $i++;
    }
    if ($i != count($_SESSION["arrayAlumnos"])) {
        unset($_SESSION["arrayAlumnos"][$i]);
        $_SESSION["arrayAlumnos"] = array_merge($_SESSION["arrayAlumnos"]);
    } else {
        echo "<p>No existe el alumno con id $alumnoAEliminar</p>";
    }
}

function mostrarNotas($tablaNotas)
{
    foreach ($_SESSION["arrayAlumnos"] as $alumno) {
        $tablaNotas .= "<tr>";
        foreach ($alumno as $atributosAlumno) {
            if (!is_array($atributosAlumno)) {
                $tablaNotas .= "<td>$atributosAlumno</td>";
            } else {
                $tablaNotas .= "<td><table>";
                $sumaMedia = 0;
                foreach ($atributosAlumno as $trimestre => $nota) {
                    $tablaNotas .= "<tr><td>$trimestre</td><td>$nota</td></tr>";
                    $sumaMedia += $nota;
                }
                $tablaNotas .= "</tr></table></td><td>" . round($sumaMedia / 3, 2) . "</td><td><a href='gestionAcademica.php?el=" . $alumno["id"] . "'><img src='pictures/eliminar.png'><a/></td></tr>";
            }
        }
    }
    $tablaNotas .= "</table>";
    return $tablaNotas;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Gestión académica</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        input {
            margin: 5px;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        img {
            width: 25px;
        }
    </style>
</head>

<body>
    <h2>Gestión académica</h2>
    <form action="gestionAcademica.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="nota1">Nota en el primer trimestre: </label>
        <input type="text" name="nota1" id="nota1"></br>
        <label for="nota2">Nota en el segundo trimestre: </label>
        <input type="text" name="nota2" id="nota2"></br>
        <label for="nota3">Nota en el tercer trimestre: </label>
        <input type="text" name="nota3" id="nota3"></br>
        <input type="submit" name="anadir" value="Añadir alumno">
        <input type="submit" name="mostrar" value="Mostrar notas">
        <a href="cerrarSesion.php">Borrar la sesión</a>
    </form>
    <?php
    if (isset($_POST["anadir"])) {
        anadirAlumno();
    } else if (isset($_GET["el"])) {
        eliminarAlumno($_GET["el"]);
    } else if (isset($_POST["mostrar"])) {
        echo mostrarNotas($tablaNotas);
    }
    // echo mostrarNotas($tablaNotas);
    ?> <?php
        echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>