<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once "./config/config.php";
require_once "./class/usuario.php";
require_once "./class/libro.php";
require_once "./class/prestamo.php";

//capa de control
if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "admin") {
    header("Location: index.php");
}

if (!isset($_SESSION["vista"])) {
    $_SESSION["vista"] = "libros";
    $libro = Libro::singleton();
    $usuario = Usuario::singleton();
    $prestamo = Prestamo::singleton();
    $vistaLibros = $libro->getLibros();
    $vistaUsers = $usuario->getUsuarioLector();
    $vistaPrestamos = $prestamo->getPrestamos();
}

if (isset($_POST["registraLibro"])) {
    $_SESSION["vista"] = "libros";
    if (isset($_POST["isbn"]) && $_POST["isbn"] != "" || isset($_POST["titulo"]) && $_POST["titulo"] != "" || isset($_POST["autor"]) && $_POST["autor"] != "" || isset($_POST["editorial"]) && $_POST["editorial"] != "") {
        $libro = Libro::singleton();
        $libro->setIsbn($_POST["isbn"]);
        $libro->setTitulo($_POST["titulo"]);
        $libro->setAutor($_POST["autor"]);
        $libro->setEditorial($_POST["editorial"]);

        $libro->setDirecto();
        echo $libro->getMensaje();
    } else {
        echo "<p style='color: red;'>Rellene todos los campos para introducir el libro.</p>";
    }
}


if (isset($_POST["actualizaLibro"])) {
    $libro = Libro::singleton();
    $vistaLibros = $libro->getLibros();
    if (isset($_POST["editIsbn"]) && $_POST["editIsbn"] != "" && isset($_POST["editTitulo"]) && $_POST["editTitulo"] != "" && isset($_POST["editAutor"]) && $_POST["editAutor"] != "" && isset($_POST["editEditorial"]) && $_POST["editEditorial"] != "") {
        $_SESSION["vista"] = "libros";
        $repetido = false;
        $otrosLibros = $libro->getLibroByNotThisIsbn($_POST["isbnViejo"]);
        foreach ($otrosLibros as $key => $libro) {
            if (in_array($_POST["editIsbn"], $libro)) {
                $repetido = true;
            }
        }
        if ($repetido) {
            echo "<p style='color: red;'>El isbn introducido ya existe.</p>";
        } else {
            $libro = Libro::singleton();
            $libro->setIsbn($_POST["editIsbn"]);
            $libro->setTitulo($_POST["editTitulo"]);
            $libro->setAutor($_POST["editAutor"]);
            $libro->setEditorial($_POST["editEditorial"]);

            $libro->edit($_POST["libroModificado"]);
            echo $libro->getMensaje();
        }
    } else {
        echo "<p style='color: red;'>Rellene todos los campos para modificar el libro.</p>";
    }
}

if (isset($_POST["libros"]) || isset($_POST["nuevoLibro"])) {
    $_SESSION["vista"] = "libros";
    $libro = Libro::singleton();
    $vistaLibros = $libro->getLibros();
}

if (isset($_POST["buscarLibro"])) {
    $_SESSION["vista"] = "libros";
    $libro = Libro::singleton();
    if ($_POST["busquedaLibro"] != "") {
        $vistaLibros = $libro->get($_POST["busquedaLibro"]);
    } else {
        $vistaLibros = $libro->getLibros();
    }
}

if (isset($_POST["usuarios"])) {
    $_SESSION["vista"] = "usuarios";
    $usuario = Usuario::singleton();
    $vistaUsers = $usuario->getUsuarioLector();
}

if (isset($_POST["buscarUser"])) {
    $_SESSION["vista"] = "usuarios";
    $usuario = Usuario::singleton();
    if ($_POST["busquedaUser"] != "") {
        $vistaUsers = $usuario->getUsuarioFiltrado($_POST["busquedaUser"]);
    } else {
        $vistaUsers = $usuario->getUsuarioLector();
    }
}

if (isset($_POST["cambiaPermiso"])) {
    $_SESSION["vista"] = "usuarios";
    $usuario = Usuario::singleton();
    $usuario->cambiaEstado($_POST["usuarioEscogido"]);
    $vistaUsers = $usuario->getUsuarioLector();
}

if (isset($_POST["bloquear"])) {
    $_SESSION["vista"] = "usuarios";
    $usuario = Usuario::singleton();
    $usuario->bloquear($_POST["usuarioEscogido"]);
    $vistaUsers = $usuario->getUsuarioLector();
}

if (isset($_POST["borraLibro"])) {
    $_SESSION["vista"] = "libros";
    $libro = Libro::singleton();
    $libro->delete($_POST["libroEscogido"]);
}

if (isset($_POST["prestamos"])) {
    $_SESSION["vista"] = "prestamos";
    $prestamo = Prestamo::singleton();
    $vistaPrestamos = $prestamo->getPrestamos();
}

if (isset($_POST["buscarPrestamo"])) {
    $_SESSION["vista"] = "prestamos";
    $prestamo = Prestamo::singleton();
    if ($_POST["busquedaPrestamo"] != "") {
        $vistaPrestamos = $prestamo->getPrestamoById($_POST["busquedaPrestamo"]);
    } else {
        $vistaPrestamos = $prestamo->getPrestamos();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stile.css">
    <title>Administracion</title>
</head>

<body>
    <h1>Biblioteca</h1>

    <form action="administracion.php" method="post">
        <input type="submit" name="libros" value="Libros">
        <input type="submit" name="usuarios" value="Usuarios">
        <input type="submit" name="prestamos" value="Prestamos">
    </form>
    <?php

    if (isset($_POST["nuevoLibro"])) {
        echo '
    <br>
    <fieldset>
    <form action="administracion.php" method="post">
    <h4>Datos del nuevo libro</h4>
    Isbn: <input type="text" name="isbn" id="isbn">
    Titulo: <input type="text" name="titulo" id="titulo">
    Autor: <input type="text" name="autor" id="autor">
    Editorial: <input type="text" name="editorial" id="editorial"><br><br>
    <input type="submit" name="registraLibro" value="Registrar Libro">
    </form>
    </fieldset>
    ';
    }

    if (isset($_POST["editaLibro"])) {
        $libro = Libro::singleton();
        $datosLibro = $libro->getLibroById($_POST["libroEscogido"]);
        $vistaLibros = $libro->getLibros();
        echo '
    <br>
    <fieldset>
    <h4>Modificar Libro ' . $datosLibro[0]["id"] . '</h4>
    <form action="administracion.php" method="post">
    <input type="hidden" name="libroModificado" value="' . $datosLibro[0]["id"] . '">
    <input type="hidden" name="isbnViejo" value="' . $datosLibro[0]["isbn"] . '">
    Isbn: <input type="text" name="editIsbn" value="' . $datosLibro[0]["isbn"] . '">
    Titulo: <input type="text" name="editTitulo" value="' . $datosLibro[0]["titulo"] . '">
    Autor: <input type="text" name="editAutor" value="' . $datosLibro[0]["autor"] . '">
    Editorial: <input type="text" name="editEditorial" value="' . $datosLibro[0]["editorial"] . '"><br><br>
    <input type="submit" name="actualizaLibro" value="Actualizar Datos">
    </form>
    </fieldset>
    ';
    }


    //Si el boton pulsado es libros
    if ($_SESSION["vista"] == "libros") {
        $libro = Libro::singleton();
        include "libros.php";
    }

    //Si el boton pulsado es usuarios
    if ($_SESSION["vista"] == "usuarios") {
        $usuario = Usuario::singleton();
        include "usuarios.php";
    }

    if ($_SESSION["vista"] == "prestamos") {
        $prestamo = Prestamo::singleton();
        include "prestamos.php";
    }

    ?>
</body>

</html>
<br><a href='cerrarSesion.php'>Salir</a><br>