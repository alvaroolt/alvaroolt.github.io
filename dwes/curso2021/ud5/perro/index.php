<?php

/**
 * Los perros pertenecen a una persona y disponen de un chip cuya lectura nos permite conocer raza y edad del perro,
 * así como el nombre y teléfono del dueño. El estado de ánimo de la mascota influye en su comportamiento y la raza en el carácter e inteligencia. 
 * Las personas mediante cursos de formación pueden convertirse en instructores con una determinada cualificación que determinará
 *  la velocidad de aprendizaje de los perros que adiestran. Es necesario conocer el nivel de formación de los instructores para poder 
 * elegir el más adecuado para nuestra mascota. Añadir todos aquellos supuestos que permitan enriquecer el modelo: 
 * razas de perros, nivel de salud, estado de ánimo, veterinarios, etc.. 
 * · Diagrama UML de clases. 
 * · Códificación de clases PHP. 
 * · Programa que probar las clases.
 * 
 * @author Álvaro Leiva Toledano
 */

include "class/Perro.php";
include "class/Instructor.php";

session_start();

if (!isset($_SESSION["sesion"])) {
    $_SESSION["arrayPerros"] = array();
    $_SESSION["arrayInstructores"] = array();
}

$_SESSION["sesion"] = true; //
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO - Perro</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>POO - Clase Perro</h2>
    <form action="index.php" method="post">
        <input type="submit" name="perroNuevo" value="Perro nuevo">
        <input type="submit" name="instructorNuevo" value="Instructor nuevo">
        <input type="submit" name="mostrarPerros" value="Mostrar perros">
        <input type="submit" name="mostrarInstructores" value="Mostrar instructores">
    </form>
    <a href="config/cerrarSesion.php">Borrar todos los contactos</a>
    <?php

    if(isset($_POST["perroNuevo"])) {

    } elseif(isset($_POST["instructorNuevo"])) {

    } elseif(isset($_POST["mostrarPerros"])) {

    } elseif(isset($_POST["mostrarInstructores"])) {
        
    }

    ?>
    <!-- <?php
            echo "<div id='codigo'><a href='../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
            ?> -->
</body>

</html>