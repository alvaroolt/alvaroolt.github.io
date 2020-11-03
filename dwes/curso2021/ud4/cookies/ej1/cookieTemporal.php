<?php
function crearCookie()
{
    setcookie("galletita", time() + 10, "/");
}

function estadoCookie()
{
    if (isset($_COOKIE["galletita"])) {
        return "La cookie 'galletita' ha sido creada";
    } else {
        return "La cookie 'galletita' no ha sido creada";
    }
}

function borrarCookie()
{
    setcookie("galletita", time(), "/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Cookie temporal</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Cookie temporal</h2>
    <form action="cookieTemporal.php" method="post">
        <input type="submit" name="crear" value="Crear cookie">
        <input type="submit" name="estado" value="Estado de la cookie">
        <input type="submit" name="borrar" value="Borrar cookie">
    </form>
    <?php
    print_r($_REQUEST);
    // if ($_POST["crear"]) {
    //     crearCookie();
    //     echo "creada";
    // }
    // if ($_POST["estado"]) {
    //     estadoCookie();
    // }
    // if ($_POST["borrar"]) {
    //     borrarCookie();
    // }
    ?> <?php
                echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
                ?>
</body>

</html>