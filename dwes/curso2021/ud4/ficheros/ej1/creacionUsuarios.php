<?php
$arrayImagenes = array();
$archivo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Script de creación de usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        label, input {
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
        
    } else {
        echo "<p>Hubo algún error al crear el fichero.</p>";
    }
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>