<?php
require_once "./config/config.php";
require_once "./class/usuario.php";
require_once "./class/libro.php";
require_once "./class/prestamo.php";
session_start();

if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "autenticado") {
    header("Location: index.php");
}

if (!isset($_SESSION["datos"]) || empty($_SESSION["datos"])) {
    header("Location: index.php");
}

if (isset($_POST["prestamo"])) {
    $prestamo = Prestamo::singleton();
    $datos = array("usuario" => $_SESSION["datos"][0]["id"], "libro" => $_POST["libroPrestado"]);
    $prestamo->set($datos);

    $libro = Libro::singleton();
    $libro->ocupaLibro($_POST["libroPrestado"]);

    $usuario = Usuario::singleton();
    $usuario->pideLibro($datos);

    $_SESSION["datos"][0]["libroActual"] = $_POST["libroPrestado"];
}

if (isset($_POST["devolver"])) {

    $datos = array("usuario" => $_SESSION["datos"][0]["id"], "libro" => 0);

    $prestamo = Prestamo::singleton();
    $idPrestamo = $prestamo->getPrestamoActual($_SESSION["datos"][0]["id"]);
    $prestamo->devuelveLibro($idPrestamo[0]["id"]);

    $libro = Libro::singleton();
    $libro->liberaLibro($_SESSION["datos"][0]["libroActual"]);

    $usuario = Usuario::singleton();
    $usuario->pideLibro($datos);

    $_SESSION["datos"][0]["libroActual"] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stile.css">
    <title>Perfil</title>
</head>

<body>
    <?php
    echo "<h1>Bienvenid@ " . $_SESSION["datos"][0]["perfil"] . " " . $_SESSION["datos"][0]["usuario"] . "</h1>";

    if ($_SESSION["datos"][0]["estado"] == "bloqueado") {
        echo "<h1 style='color: red;'>Usted se encuentra bloqueado y no puede acceder a ninguna funcionalidad de la biblioteca.</h1>";
    } else {
        if ($_SESSION["datos"][0]["estado"] != "acceso") {
            echo "<h3 style='color: lightblue;'>Todavía no tiene acceso a la biblioteca, por favor espere a que un administrador confirme su registro.</h3>";
        } else {

            $libro = Libro::singleton();
            $libres = $libro->getLibres();

            if ($_SESSION["datos"][0]["libroActual"] > 0) {

                $resultado = $libro->getLibroById($_SESSION["datos"][0]["libroActual"]);
                echo "<fieldset><h3>Libro en posesión</h3>";
                echo "<p>Titulo: " . $resultado[0]["titulo"] . "</p><br>";
                echo "<p>Autor: " . $resultado[0]["autor"] . "</p><br>";
                echo "<p>Editorial: " . $resultado[0]["editorial"] . "</p><br>";
                echo '
            <form action="perfil.php" method="post">
            <input style="border: 1px solid green; background:lightgreen" type="submit" name="devolver" value="Devolver">
            </form></fieldset><br>';
            } else {
                echo "<fieldset><h3>Libros que pueden ser prestados</h3>";
                foreach ($libres as $key => $libro) {
                    echo "<fieldset>";
                    foreach ($libro as $clave => $valor) {
                        echo "<strong>" . $clave . ":</strong> " . $valor . "<br>";
                    }
                    echo '<br>
                    <form action="perfil.php" method="post">
                    <input type="hidden" name="libroPrestado" value="' . $libro["id"] . '">
                    <input style="border: 1px solid green; background:lightgreen" type="submit" name="prestamo" value="Pedir Prestamo">
                    </form>
                    </fieldset><br>';
                }
                echo "</fieldset>";
            }
        }
    }
    ?>
</body>

</html>
<br><a href='cierraSesiones.php'>Volver al inicio</a>