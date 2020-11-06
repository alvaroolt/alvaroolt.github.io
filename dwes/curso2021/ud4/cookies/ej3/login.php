<?php
$usuario;
$contrasena;
$tabla = "<table><tr><th>Usuario</th><th>Contraseña</th></tr>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Formulario de cookies</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        input {
            margin: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Formulario de login con cookies</h2>
    <form action="login.php" method="post">
        <label for="usuario">usuario: </label>
        <input type="text" name="usuario" id="usuario"></br>
        <label for="contrasena">contraseña: </label>
        <input type="password" name="contrasena" id="contrasena"></br>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="submit" name="estado" value="Mostrar datos">
        <input type="submit" name="borrar" value="Borrar datos">
    </form>
    <?php
    if (isset($_POST["aceptar"])) {
        setcookie("usuario", $_POST["usuario"], time() + 3600);
        setcookie("contrasena", $_POST["contrasena"], time() + 3600);
    } else if (isset($_POST["estado"])) {
        if (isset($_COOKIE["usuario"])) {
            $usuario = $_COOKIE["usuario"];
            $contrasena = $_COOKIE["contrasena"];

            $tabla .= "<tr><td>$usuario</td><td>$contrasena</td></tr></table>";
            echo $tabla;
        }
    } else if (isset($_POST["borrar"])) {
        setcookie("usuario", $_POST["usuario"], time() - 3600);
        setcookie("contrasena", $_POST["contrasena"], time() - 3600);
    }
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>