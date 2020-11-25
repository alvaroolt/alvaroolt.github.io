<?php
$arrayImagenes = array();
$archivo;
$contenidoActual;
$contenido;

function crearArchivoMysql($nombre, $apellido)
{
    if (!is_file("archivos/mysql.txt")) {
        $archivo = fopen("archivos/mysql.txt", "a+");

        $contenido = "create database mibbdd
                        CREATE TABLE mitabla{
                            id MEDIUMINT NOT NULL AUTO_INCREMENT,
                            nombre CHAR(20) NOT NULL,
                            apellido CHAR(40) NOT NULL,
                            PRIMARY KEY (id);
                        }
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    } else {
        $archivo = fopen("archivos/mysql.txt", "a+");

        $contenido = "\n
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    }
}

function crearArchivoOracle($nombre, $apellido)
{
    if (!is_file("archivos/oracle.txt")) {
        $archivo = fopen("archivos/oracle.txt", "a+");

        $contenido = "create database mibbdd
                 DATAFILE filespec AUTOEXTEND ON [NEXT int K | M] [MAXSIZE int K | M]
                        CREATE TABLE mitabla{
                            id NUMBER (9),
                            nombre VARCHAR(20),
                            apellido VARCHAR(40),
                            PRIMARY KEY (id);
                        }
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    } else {
        $archivo = fopen("archivos/oracle.txt", "a+");

        $contenido = "\n
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    }
}

function crearArchivoLinux($nombre, $apellido)
{
    if (!is_file("archivos/linux.txt")) {
        $archivo = fopen("archivos/linux.txt", "a+");

        $contenido = "create database mibbdd
                        CREATE TABLE mitabla{
                            id MEDIUMINT NOT NULL AUTO_INCREMENT,
                            nombre CHAR(20) NOT NULL,
                            apellido CHAR(40) NOT NULL,
                            PRIMARY KEY (id);
                        }
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    } else {
        $archivo = fopen("archivos/linux.txt", "a+");

        $contenido = "\n
                        INSERT INTO mitabla (nombre, apellido) VALUES
                        ('$nombre', '$apellido')";

        fwrite($archivo, $contenido);

        fclose($archivo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Script de creación de usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        label,
        input {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h2>Script de creación de usuarios</h2>
    <form action="creacionUsuarios.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"></br>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido"></br>
        <input type="checkbox" id="option1" name="option1" value="mysql">
        <label for="option1"> MySQL</label><br>
        <input type="checkbox" id="option2" name="option2" value="oracle">
        <label for="option2"> Oracle</label><br>
        <input type="checkbox" id="option3" name="option3" value="linux">
        <label for="option3"> Linux</label><br><br>
        <input type="submit" name="crear" value="Aceptar" />
    </form>
    <?php
    if (isset($_POST["crear"])) {
        if ((isset($_POST["nombre"]) && ($_POST["apellido"]))) {
            if (isset($_POST["option1"])) {
                crearArchivoMysql($_POST["nombre"], $_POST["apellido"]);
                echo "<p>Datos introducidos en BD de MySQL correctamente.</p>";
            }
            if (isset($_POST["option2"])) {
                crearArchivoOracle($_POST["nombre"], $_POST["apellido"]);
                echo "<p>Datos introducidos en BD de Oracle correctamente.</p>";
            }
            if (isset($_POST["option3"])) {
                crearArchivoLinux($_POST["nombre"], $_POST["apellido"]);
                echo "<p>Datos introducidos en BD de Linux correctamente.</p>";
            }
        } else {
            echo "Nombre y apellido no pueden estas vacíos.";
        }
    } else {
        echo "<p>Hubo algún error al crear el fichero.</p>";
    }
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>