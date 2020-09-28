<?php
require_once "config/config.php";
require_once "class/usuario.php";
require_once "class/libro.php";
session_start();

if (!isset($_SESSION["perfil"])) {
    $_SESSION["perfil"] = "invitado";
}
if (!isset($_SESSION["datos"])) {
    $_SESSION["datos"] = array();
}

$mensaje = "";

if (isset($_POST["entrar"]) && $_POST["user"] == "" || isset($_POST["entrar"]) && $_POST["psw"] == "") {
    $mensaje = "<p style='color: red;'>Por favor introduzca un nombre y una contraseña</p>";
}
if (isset($_POST["entrar"]) && $_POST["user"] != "" && $_POST["psw"] != "") {
    $usuario = Usuario::singleton();
    $coincidencia = $usuario->loggin($_POST["user"], $_POST["psw"]);
    if (!empty($coincidencia)) {

        if ($coincidencia[0]["perfil"] == "lector") {
            $_SESSION["perfil"] = "autenticado";
            $_SESSION["datos"] = $coincidencia;
            header("Location: perfil.php");
        }

        if ($coincidencia[0]["perfil"] == "admin") {
            $_SESSION["perfil"] = "admin";
            $_SESSION["datos"] = $coincidencia;
            header("Location: administracion.php");
        }
    } else {
        $mensaje = "<p style='color: red;'>Usuario no encontrado, por favor proceda a registrarse</p>";
    }
}


if (isset($_POST["registro"])) {
    header("Location: registro.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stile.css">
    <title>Acceso a la biblioteca</title>
</head>

<body>
    <h1>Acceso a la biblioteca</h1>
    <form action="index.php" method="post">
        <input type="text" name="user" id="user">
        <input type="password" name="psw" id="psw">
        <input type="submit" name="entrar" value="Acceder">
        <br>
        <br>
        <input style="color: white;border: 1px solid blue; background:DarkCyan" type="submit" name="registro" value="Crear Usuario">
    </form>
    <?php echo $mensaje ?>
</body>

</html>
<br><a href='cerrarSesion.php'>Cerrar sesión</a><br>