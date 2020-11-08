<?php
session_start();

$nombre;
$numero;
// $arrayContactos = array();
$agenda = "<table><tr><th colspan=3>AGENDA</th></tr>";

if (!isset($_SESSION["arrayContactos"])) {
    $_SESSION["arrayContactos"] = array();
}

function anadirContacto()
{
    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];

    $nuevoContacto = array(
        array(
            "nombre" => $nombre,
            "numero" => $numero
        )
    );

    $_SESSION["arrayContactos"] = array_merge($nuevoContacto, $_SESSION["arrayContactos"]);
}

function mostrarAgenda($agenda)
{
    if (!empty($_SESSION["arrayContactos"])) {
        // print_r($_SESSION["arrayContactos"]);
        foreach ($_SESSION["arrayContactos"] as $contacto) {
            $agenda .= "<tr>";
            foreach ($contacto as $key => $value) {
                $agenda .= "<td>$value</td>";
            }
            $agenda .= "<td><button name='boton" . $_SESSION['arrayContactos'][0]['nombre'] . "' id='boton" . $_SESSION['arrayContactos'][0]['nombre'] . "' onclick='eliminarContacto(\"boton" . $_SESSION['arrayContactos'][0]['nombre'] . "\")'><img src='pictures/eliminar.png'></button></td></tr>";
        }
        echo $agenda;


    } else {
        echo "<p>La agenda está vacía.</p>";
    }
}

function eliminarContacto($contacto) {
    echo $contacto;

    // NO CONSIGO QUE SE EJECUTE ESTA FUNCION DESDE LA LINEA 37

    // foreach ($_SESSION["arrayContactos"] as $contacto) {
        
    //     foreach ($contacto as $key => $value) {
            
    //     }
        
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Agenda de contactos</title>
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
    <h2>Agenda de contactos</h2>
    <form action="agenda.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero"></br>
        <input type="submit" name="anadir" value="Añadir contacto">
        <input type="submit" name="mostrar" value="Mostrar agenda">
        <!-- <input type="submit" name="borrar" value="Eliminar todos los contactos"> -->
        <a href="cerrarSesion.php">Borrar todos los contactos</a>
    </form>
    <?php
    if (isset($_POST["anadir"])) {
        anadirContacto();
    } else if (isset($_POST["mostrar"])) {
        echo mostrarAgenda($agenda);
    }
    ?> <?php
        echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>