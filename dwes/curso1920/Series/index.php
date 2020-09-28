<?php

include "class/Serie.php";

session_start();

if (!isset($_SESSION["series"])) {
    $_SESSION["series"] = [];
}

if (!isset($_POST["submit"])) {

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Series</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <?php
            echo "<head><link rel='stylesheet' href='css/styles.css'></head>";
            echo "<br><br>";
            echo "<p>Añadir pelicula a favoritos:</p>";
            echo "<input type='text' name='nombrePelicula'  placeholder='Nombre Pelicula'><br><br>";
            echo "<input type='text' name='plataforma'  placeholder='Plataforma'>";
            echo "<p><input type='submit' name='submit' value='Añadir Pelicula' /></p>";
            echo "<a href='cerrarSesion.php' >Cerrar sesión</a>";
            ?>
        </form>
    </body>

    </html>

<?php



} else {

    $serie = new Serie($_POST["nombrePelicula"], $_POST["plataforma"]);

    array_push($_SESSION["series"], $serie);

?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <?php
        echo "<head><link rel='stylesheet' href='css/styles.css'></head>";
        echo "<br><br>";
        echo "<p>Agregar pelicula:</p>";
        echo "<input type='text' name='nombrePelicula'  placeholder='Nombre de la película'><br><br>";
        echo "<input type='text' name='plataforma'  placeholder='Plataforma'>";
        echo "<p><input type='submit' name='submit' value='Añadir película' /></p>";
        echo "<a href='cerrarSesion.php' >Cerrar sesión</a>";
        ?>
    </form>
    <table>
    <?php
    echo '<tr>';
    echo "<th>Nombre</th>";
    echo "<th>Plataforma</th>";
    echo '</tr>';
    foreach ($_SESSION["series"] as $clave => $valor) {
        echo '<tr>';
        echo "<td>" . $valor->getNombre() . "</td>";
        echo "<td>" . $valor->getPlataforma() . "</td>";
        echo '</tr>';
    }
}

    ?>
    </table>