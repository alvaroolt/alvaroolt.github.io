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
        <input type="submit" name="nuevoPerro" value="Perro nuevo">
        <input type="submit" name="instructorNuevo" value="Instructor nuevo">
        <input type="submit" name="mostrarPerros" value="Mostrar perros">
        <input type="submit" name="mostrarInstructores" value="Mostrar instructores">
    </form>
    <a href="config/cerrarSesion.php">Cerrar sesión.</a>
    <?php

    if (isset($_POST["nuevoPerro"])) {
        echo "<h3>Formulario - añadir nuevo perro</h3>";
        echo "<form action='index.php' method='post'>";
        echo "<p><label>Nombre: <input type='text' name='nombre' required></label></p>";
        echo "<p><label>Raza: <input type='text' name='raza' required></label></p>";
        echo "<p><label>Edad: <input type='number' name='edad' required></label></p>";
        echo "<p><label>Nombre del dueño: <input type='text' name='nombreDueno' required></label></p>";
        echo "<p><label>Teléfono del dueño: <input type='text' name='tefDueno' required></label></p>";
        echo "<p><label>Estado de ánimo<select name='estAnimo'>
                <option value='normal'>Normal</option>
                <option value='feliz'>Feliz</option>
                <option value='triste'>Triste</option>
                <option value='enfadado'>Enfadado</option>
            </select></p>";
        echo "<input type='submit' name='anadirPerro' value='Añadir perro'>";
        echo "</form>";
        // } elseif(isset($_POST["instructorNuevo"])) {
        //     echo "<h3>Formulario - añadir nuevo instructor</h3>";
    } elseif (isset($_POST["mostrarPerros"])) {
        if (!empty($_SESSION["arrayPerros"])) {
            echo "<form action='index.php' method='post'>";
            echo "<table border='2px solid black'>";
            foreach ($_SESSION["arrayPerros"] as $perro) {
                echo "<tr><td><table>";
                foreach ($perro as $clave => $valor) {
                    echo "<tr><td>";
                    switch ($clave) {
                        case "nombre":
                            echo "Nombre: $valor";
                            break;
                        case "raza":
                            echo "Raza: $valor";
                            break;
                        case "edad":
                            echo "Edad: $valor";
                            break;
                        case "nombreDueno":
                            echo "Nombre del dueño: $valor";
                            break;
                        case "tefDueno":
                            echo "Teléfono del dueño: $valor";
                            break;
                        case "estAnimo":
                            echo "Estado de ánimo: $valor";
                            break;
                    }
                    echo "</td></tr>";
                }

                // CONTINUAR DESDE AQUI, XAMPP ESTA BUG Y NO ME REFRESCA LA PAGINA
                echo "<div>";
                echo "<tr><td><input class='botonesPerro' type='submit' name='botonJugar' value='Jugar'></td></tr>";
                echo "<tr><td><input class='botonesPerro' type='submit' name='botonComer' value='Comer'></td></tr>";
                echo "<tr><td><input class='botonesPerro' type='submit' name='botonDucha' value='¡Duchita!'></td></tr>";
                echo "</div>";
                echo "</table>";
            }
            echo "</table>";
        }
    } elseif (isset($_POST["mostrarInstructores"])) {
    }

    if (isset($_POST["anadirPerro"])) {
        $nuevoPerro = array(
            "nombre" => $_POST["nombre"],
            "raza" => $_POST["raza"],
            "edad" => $_POST["edad"],
            "nombreDueno" => $_POST["nombreDueno"],
            "tefDueno" => $_POST["tefDueno"],
            "estAnimo" => $_POST["estAnimo"]
        );

        array_push($_SESSION["arrayPerros"], new Perro($nuevoPerro));
        echo "<p>Nuevo perro agregado correctamente.</p>";
    }

    ?>
    <!-- <?php
            echo "<div id='codigo'><a href='../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
            ?> -->
</body>

</html>