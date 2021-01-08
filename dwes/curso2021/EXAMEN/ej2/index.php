<?php
include "config/funciones.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen parte 2 - Álvaro Leiva Toledano</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Gestión de multas</h2>
    <?php
    if (!isset($_SESSION["perfil"])) {
        $_SESSION["perfil"] = "invitado";
    }

    if ($_SESSION["perfil"] == "invitado") {
        echo "<p>Eres invitado.</p>";
        formularioLogin();
        mostrarTablaMultas();
    }

    if ($_SESSION["perfil"] == "administrador") {
        echo "<p>Has logeado como administrador.</p>";
        mostrarInfoAdmin();
    }

    if ($_SESSION["perfil"] == "agente") {
        echo "<p>Has logeado como agente.</p>";
        formularioAnadirMulta();
        mostrarTablaMultas();
        if (isset($_POST["enviar"])) {
            anadirMulta();
        } else if (isset($_GET["multa"])) {
            pagarMulta($_GET["multa"]);
        }
    }

    if ($_SESSION["perfil"] == "usuario") {
        echo "<p>Has logeado como usuario.</p>";
        mostrarTablaMultas();
    }

    if (isset($_POST["enviar"])) {
        if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["pswd"]) && $_POST["pswd"] != "") {
            include "config/arrayUsuarios.php";
            foreach ($aUsuarios as $usuario) {
                if ($usuario["user"] == $_POST["user"] && $usuario["password"] == $_POST["pswd"]) {
                    if ($usuario["perfil"] == "administrador") {
                        $_SESSION["perfil"] = "administrador";
                        header("Location: index.php");
                    } else if ($usuario["perfil"] == "agente") {
                        $_SESSION["perfil"] = "agente";
                        header("Location: index.php");
                    } else {
                        $_SESSION["perfil"] = "usuario";
                        header("Location: index.php");
                    }
                }
            }
        }
    } else if (isset($_GET["multa"])) {
        pagarMulta($_GET["multa"]);
    }


    ?>
    <a href="config/salir.php">Salir</a></br>
    <a href="config/cierresesion.php">Cerrar sesión</a>
    <?php

    ?>
</body>

</html>