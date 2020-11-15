<?php
$origen;

function formularioAnonimo()
{
    echo "<h2>Autenticación de usuarios</h2>";
    echo "<form action=\"registros.php\" method=\"post\">
            Usuario: <input type=\"text\" name=\"user\"/><br><br>
            Contraseña: <input type=\"password\" name=\"pswd\"/><br><br>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
            </form>
            ";
}

function formularioAdmin()
{
    echo "<h3 style='color: green'>Has logeado como administrador</h3>
            <form action=\"registros.php\" method=\"post\">
            Nombre del nuevo usuario: <input type=\"text\" name=\"nuevoUser\"/><br><br>
            Contraseña del nuevo usuario: <input type=\"password\" name=\"nuevaPswd\"/><br><br>
            <input type=\"submit\" name=\"crear\" value=\"Crear Usuario\">
            </form>
            <br><table style='border: 3px solid black'>
            <h3>Usuarios registrados actualmente</h3>";
    foreach ($_SESSION["usuarios"]  as $indice => $usuario) {
        echo "<tr>
                <td style='border-bottom:1px solid black'>
                Nombre: " . $usuario[0] . "<br>
                Contraseña: " . $usuario[1];
        "</td>
                </tr>";
    }
    echo "</table>";
}

session_start();

header('Content-Type: text/html; charset=utf-8');

if (!isset($_SESSION["perfil"])) {
    $_SESSION["perfil"] = "anonimo";
}

if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = array();
    $origen = fopen("usuarios.txt", "r");

    do {
        $fila = fgets($origen);
        $datos = explode(",", $fila);
        if ($datos[0] != "" && $datos[1] != "") {

            array_push($_SESSION["usuarios"], array(trim($datos[0]), trim($datos[1])));
        }
    } while (!feof($origen));
    fclose($origen);
}

if ($_SESSION["perfil"] == "anonimo") {
    formularioAnonimo();
}

if ($_SESSION["perfil"] == "admin") {
    formularioAdmin();
}

if ($_SESSION["perfil"] == "registrado") {
    header("Location: privado.php");
}

if (isset($_POST["enviar"])) {
    if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["pswd"]) && $_POST["pswd"] != "") {
        if ($_POST["user"] == "admin" && $_POST["pswd"] == "admin") {
            $_SESSION["perfil"] = "admin";
            header("Location: registros.php");
        } else {
            foreach ($_SESSION["usuarios"] as $indice => $usuario) {
                if ($_POST["user"] == $usuario[0] && $_POST["pswd"] == $usuario[1]) {
                    $_SESSION["perfil"] = "registrado";
                    header("Location: registros.php");
                }
            }
        }
    }
}

if (isset($_POST["crear"]) && isset($_POST["nuevoUser"]) && $_POST["nuevoUser"] != "" && isset($_POST["nuevaPswd"]) && $_POST["nuevaPswd"] != "") {
    $repetido = false;
    foreach ($_SESSION["usuarios"] as $clave => $usuario) {
        if (in_array($_POST["nuevoUser"], $usuario)) {
            $repetido = true;
        }
    }

    if (!$repetido) {
        array_push($_SESSION["usuarios"], array($_POST["nuevoUser"], $_POST["nuevaPswd"]));
        $registro = fopen("usuarios.txt", "w");
        foreach ($_SESSION["usuarios"] as $indice => $usuario) {
            if (count($_SESSION["usuarios"]) == ++$indice) {
                fwrite($registro, $usuario[0] . "," . $usuario[1]);
            } else {
                fwrite($registro, $usuario[0] . "," . $usuario[1] . PHP_EOL);
            }
        }
        fclose($registro);
        header("Location: registros.php");
    } else {
        echo "<p style='color:red'> El usuario ya existe. </p>";
    }
}

echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a><br>";
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Autentificación básica</title>
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
    <h2>Autentificación básica</h2>
    <form action="registros.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="nota1">Contraseña: </label>
        <input type="password" name="contrasena" id="contrasena"></br>
        <input type="submit" name="login" value="Iniciar sesión">
        <a href="cerrarSesion.php">Cerrar sesión</a>
    </form>
    <?php
    // if (isset($_POST["login"])) {
    // }
    ?>
    <?php
    // echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html> -->