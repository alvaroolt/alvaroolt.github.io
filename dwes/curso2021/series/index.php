<?php

include "class/Serie.php";
include "class/Usuario.php";
include "config/config.php";

$sh = Serie::getInstancia();
$series = $sh->getAll();

session_start();

if (!isset($_SESSION["perfil"])) {
    $_SESSION["user"] = Usuario::getInstancia();
    $_SESSION["serie"] = Serie::getInstancia();
    $_SESSION["perfil"] = "invitado";
    $_SESSION["mensaje"] = "";
}

if (isset($_POST["salir"])) {
    include "includes/logout.php";
}

if (isset($_POST["login"])) {
    $arrayUsuario = $_SESSION["user"]->get($_POST["user"]);

    if (sizeof($arrayUsuario) == 1 && $arrayUsuario[0]["passwd"] == $_POST["pass"]) {
        $_SESSION["id_usuario"] = $arrayUsuario[0]["id"];
        $_SESSION["usuario"] = $arrayUsuario[0]["usuario"];
        $_SESSION["perfil"] = $arrayUsuario[0]["perfil"];

        if ($_SESSION["perfil"] == "admin") {
            // header("Location:index.php?page=admin");
            echo "has entrado en admin";
        }
        // if (($_SESSION["perfil"] == "premium") || ($_SESSION["perfil"] == "basico")) {
        //     header("Location:index.php?page=registrado");
        // }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $TITULO ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="css/styles.css" /> -->
</head>

<body>
    <header>
        <?php include "includes/header.php"; ?>
    </header>

    <div class="contenedor">

        <div class="login">
            <?php
            if ($_SESSION["perfil"] == "invitado") {
                include "includes/login.php";
            } else {
                include "includes/logout.php";
            }
            ?>
        </div>
        <main>
            <?php
            if (isset($_GET["page"])) {
                if (($_GET["page"] == "index")) {
                    header("Location: index.php");
                }
                if (($_GET["page"] == "admin")) {
                    include "./page/admin.php";
                    // echo "has entrado en admin";
                }
                if (($_GET["page"] == "registrado")) {
                    include "./page/registrado.php";
                }
            } else {
                // include "./page/home.php";
            }
            ?>
        </main>
    </div>

    <footer>
        <?php include "includes/footer.php"; ?>
    </footer>
</body>

</html>