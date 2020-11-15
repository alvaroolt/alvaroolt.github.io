<?php
session_start();
if (isset($_SESSION["perfil"]) && $_SESSION["perfil"] != "registrado") {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privado</title>
</head>

<body>
    <h3>Has logeado correctamente.</h3>
    <a href='cerrarSesion.php'>Cerrar sesión</a>
</body>

</html>