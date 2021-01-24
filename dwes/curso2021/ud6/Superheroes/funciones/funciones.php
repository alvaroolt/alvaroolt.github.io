<?php
include "config/config.php";
function conectaDB()
{
    try {
        $dns = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $db = new PDO($dns, DBUSER, DBPASS);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');

        return $db;
    } catch (PDOException $e) {
        echo "Error de conexión";
        exit();
    }
}

function mostrarSuperheroes()
{
    $db = conectaDB();

    $sql = "SELECT * FROM superheroes";
    $resultado = $db->query($sql);

    $tablaSuperheroes = "<table><tr><th colspan='100'>TABLA SUPERHÉROES</th></tr><tr><th>Id</th><th>Nombre</th><th>Velocidad</th></tr>";

    foreach ($resultado as $valor) {
        $tablaSuperheroes .= "<tr><td>" . $valor['id'] . "</td><td>" . $valor['nombre'] . "</td><td>" . $valor['velocidad'] . "</td><td><a href='index.php?eliminar=" . $valor['id'] . "'><img src='pictures/eliminar.png'><a/></td><td><a href='index.php?editar=" . $valor['id'] . "'><img src='pictures/editar.png'><a/></td></tr>";
    }
    echo $tablaSuperheroes;
}


