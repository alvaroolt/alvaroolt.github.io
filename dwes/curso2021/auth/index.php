<?php
include "config/config.php";
include "class/Usuario.php";

session_start();

if (!isset($_SESSION["perfil"])) {
    $_SESSION["usuario"] = Usuario::getInstancia();
    $_SESSION["perfil"] = "invitado";
}
if (isset($_POST["login"])) {
    $arrayUsuario = $_SESSION["usuario"]->get($_POST["user"]);
    // print_r($arrayUsuario);
    if (sizeof($arrayUsuario) == 1 && $arrayUsuario[0]["passwd"] == $_POST["pass"]) {
        $_SESSION["id_usuario"] = $arrayUsuario[0]["id"];
        $_SESSION["user"] = $arrayUsuario[0]["usuario"];
        $_SESSION["perfil"] = $arrayUsuario[0]["perfil"];
        $_SESSION["passwd"] = $arrayUsuario[0]["passwd"];
        $_SESSION["estado"] = $arrayUsuario[0]["estado"];

        if ($_SESSION["perfil"] == "admin") {
            header("Location: index.php?page=admin");
        } else if ($_SESSION["perfil"] == "usuario") {
            header("Location: index.php?page=usuario");
        }
    } else {
        include "pages/home.php";
    }
}
if (isset($_POST["registrarse"])) {
    $arrayDatos = array(
        "usuario" => $_POST["user"],
        "passwd" => $_POST["pass"],
        "perfil" => "usuario",
        "estado" => 0
    );
    $_SESSION["usuario"]->set($arrayDatos);
    echo "Registro realizado con éxito. Inicie sesion";
}
if (isset($_POST["cerrarSesion"])) {
    include "include/logout.php";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>BD Auth</title>
</head>

<body>
    <?php include "include/header.php"; ?>
    <?php
    if ($_SESSION["perfil"] == "invitado") {
        if (!isset($_POST["registro"])) {
            include "include/login.php";
        } else {
            include "include/registro.php";
        }
    } else {
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' name='cerrarSesion' value='Cerrar Sesión'>";
        echo "</form>";
    }
    ?>
    <main>
        <?php
        if (isset($_GET["page"])) {
            if ($_GET["page"] == "index") {
                header("Location: index.php");
            } else if ($_GET["page"] == "admin") {
                include("pages/admin.php");
            } else if (($_GET["page"] == "usuario")) {
                include("pages/usuario.php");
            }
        } else {
            include "pages/home.php";
        }
        ?>
    </main>
</body>
<footer><?php include "include/footer.php" ?></footer>

</html>