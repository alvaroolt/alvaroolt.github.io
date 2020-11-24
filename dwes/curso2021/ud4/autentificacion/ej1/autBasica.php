<?php
$origen;

function formularioAnonimo()
{
    echo "<h2>Autenticación de usuarios sencillo</h2>";
    echo "<form action=\"autBasica.php\" method=\"post\">
            Usuario: <input type=\"text\" name=\"user\"/><br><br>
            Contraseña: <input type=\"password\" name=\"pswd\"/><br><br>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
            </form>
            ";
}

session_start();

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

if ($_SESSION["perfil"] == "registrado") {
    echo "<h2>Has logeado correctamente</h2>";
}

if (isset($_POST["enviar"])) {
    if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["pswd"]) && $_POST["pswd"] != "") {
        if ($_POST["user"] == "admin" && $_POST["pswd"] == "admin") {
            $_SESSION["perfil"] = "admin";
            header("Location: autBasica.php");
        } else {
            foreach ($_SESSION["usuarios"] as $indice => $usuario) {
                if ($_POST["user"] == $usuario[0] && $_POST["pswd"] == $usuario[1]) {
                    $_SESSION["perfil"] = "registrado";
                    header("Location: autBasica.php");
                }
            }
        }
    }
}

echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a><br>";
?>