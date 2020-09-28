<?php
session_start();
if ($_SESSION['perfil'] == "registrado") {
    echo "<h3>La cara oculta de la luna</h3>";
    echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a><br>";
}else{
    header('Location:index.php');
}