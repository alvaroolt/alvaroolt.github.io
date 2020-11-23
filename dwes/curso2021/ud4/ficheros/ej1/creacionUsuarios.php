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
        div {
            display: flex;
            flex-wrap: wrap;
        }

        img {
            padding: 20px 5px;
        }
    </style>
</head>

<body>
    <h2>Script de creación de usuarios</h2>
    <form action="galeria.php" method="POST" enctype="multipart/form-data">
        Añadir imagen: <input name="archivo" id="archivo" type="file" />
        <input type="submit" name="subir" value="Subir imagen" />
    </form>
    <?php
    if (isset($_POST["subir"])) {
        $archivo = $_FILES["archivo"]["name"];
        if (isset($archivo) && $archivo != "") {
            $tipo = $_FILES['archivo']['type'];
            $tamano = $_FILES['archivo']['size'];
            $temp = $_FILES['archivo']['tmp_name'];
            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            } else {
                if (move_uploaded_file($temp, 'images/' . $archivo)) {
                    echo "<p>Imagen subida correctamente.</p>";
                }
            }
        }
    } else {
        echo "<p>Hubo algún error al subir la imagen.</p>";
    }
    $directorio = dir("images");
    echo "<div>";
    while (($archivo = $directorio->read()) !== false) {
        if ((strpos($archivo, "jpg") !== false) || (strpos($archivo, "jpeg") !== false) || (strpos($archivo, "png") !== false))
            echo "<img src=\"images/" . $archivo . "\" width=\"100px\"><br>";
    }
    echo "</div>";
    $directorio->close();
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>