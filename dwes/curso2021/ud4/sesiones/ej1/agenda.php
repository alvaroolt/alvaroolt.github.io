<?php
session_start();

$nombre;
$numero;
$agenda = "<table><tr><th colspan=4>AGENDA</th></tr>";

if (!isset($_SESSION["arrayContactos"])) {
    $_SESSION["arrayContactos"] = array(
        array(
            "id" => 1,
            "nombre" => "Debora Melo",
            "numero" => "616123456"
        ),
        array(
            "id" => 2,
            "nombre" => "Zacarias Agua Del Pozo",
            "numero" => "616123457"
        )
    );
}

function anadirContacto()
{
    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];
    $idMax = count($_SESSION["arrayContactos"]) - 1;

    // var_dump($_SESSION["arrayContactos"][$idMax]["id"]+1);
    // exit;

    $nuevoContacto = array(
        "id" => $_SESSION["arrayContactos"][$idMax]["id"] + 1,
        "nombre" => $nombre,
        "numero" => $numero
    );

    array_push($_SESSION["arrayContactos"], $nuevoContacto);
}

function eliminarContacto($contactoABorrar)
{
    $i = 0;
    while ($i < count($_SESSION["arrayContactos"]) && $_SESSION["arrayContactos"][$i]["id"] != $contactoABorrar) {
        $i++;
    }
    if ($i != count($_SESSION["arrayContactos"])) {
        unset($_SESSION["arrayContactos"][$i]);
        $_SESSION["arrayContactos"] = array_merge($_SESSION["arrayContactos"]);
    } else {
        echo "<p>No existe el contacto con id $contactoABorrar</p>";
    }
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
            $agenda .= "<td><a href='agenda.php?el=" . $contacto["id"] . "'><img src='pictures/eliminar.png'><a/></td></tr>";
        }
        $agenda .= "</table>";
        echo $agenda;
    } else {
        echo "<p>La agenda está vacía.</p>";
    }
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
        <a href="cerrarSesion.php">Borrar todos los contactos</a>
    </form>
    <?php
    if (isset($_POST["anadir"])) {
        anadirContacto();
    } else if (isset($_GET["el"])) {
        eliminarContacto($_GET["el"]);
    } else if (isset($_POST["mostrar"])) {
        echo mostrarAgenda($agenda);
    }
    ?> <?php
        echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
        ?>
</body>

</html>