<?php
session_start();

include "functions/functions.php";

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
            header("Location: index.php");
        } else {
            foreach ($_SESSION["usuarios"] as $indice => $usuario) {
                if ($_POST["user"] == $usuario[0] && $_POST["pswd"] == $usuario[1]) {
                    $_SESSION["perfil"] = "registrado";
                    header("Location: index.php");
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
        header("Location: index.php");
    } else {
        echo "<p style='color:red'> El usuario ya existe. </p>";
    }
}

echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a><br>";
