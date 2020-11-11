<?php
session_start();

$nombre;
$nota;
$tablaNotas = "<table><tr><th colspan=4>tablaNotas</th></tr>";

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
            "nombre" => "Álvaro",
            "notas" => array("1er trimestre" => rand(1, 10), "2º trimestre" => rand(1, 10), "3er trimestre" => rand(1, 10))
        ),
    );
}

function anadirAlumno()
{
}

function eliminarAlumno($contactoABorrar)
{
}

function mostrarNotas($tablaNotas)
{

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
    <form action="tablaNotas.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="nota">Nota en DWES: </label>
        <input type="text" name="nota" id="nota"></br>
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
    ?> <?php
        echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>