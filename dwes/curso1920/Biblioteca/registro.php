<?php
require_once "config/config.php";
require_once "class/usuario.php";
session_start();

if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "invitado") {
    header("Location: index.php");
}
$mensaje = "";
if (isset($_POST["registro"])) {
    if ($_POST["nombre"] != "" && $_POST["apellidos"] != "" && $_POST["dni"] != "" && $_POST["user"] != "" && $_POST["psw"] != "") {
        $usuario = Usuario::singleton();
        $usuario->setNombre($_POST["nombre"]);
        $usuario->setApellidos($_POST["apellidos"]);
        $usuario->setDni($_POST["dni"]);
        $usuario->setUsuario($_POST["user"]);
        $usuario->setContraseña($_POST["psw"]);
        $usuario->setDirecto();

        $mensaje = "<p style='color: green;'>Registro realizado con exito, ya puede acceder a su perfíl, pero necesitará confirmación de un administrador para acceder a todas las funciones.</p>";
    } else {
        $mensaje = "<p style='color: red;'>Por favor rellene todos los campos para poder registrarse</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stile.css">
    <title>Registro de usuarios</title>
</head>

<body>
    <h1>Registro de usuarios</h1>
    <fieldset><br>
        <form action="registro.php" method="post">
            <label>Nombre: <input type="text" name="nombre" id="nombre"></label><br><br>
            <label>Apellidos: <input type="text" name="apellidos" id="apellidos"></label><br><br>
            <label>Dni: <input type="text" name="dni" id="dni"></label><br><br>
            <label>Usuario: <input type="text" name="user" id="user"></label><br><br>
            <label>Contraseña: <input type="password" name="psw" id="psw"></label><br><br>
            <input style="color: white;border: 1px solid blue; background:DarkCyan" type="submit" name="registro" value="Registrarse">
        </form>
        <?php echo $mensaje ?>
</body>
</fieldset>

</html>
<br><a href='cerrarSesion.php'>Volver al inicio</a>