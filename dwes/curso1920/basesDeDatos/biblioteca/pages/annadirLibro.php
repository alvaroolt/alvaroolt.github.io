<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "../includes/header.php";  ?>
    </header>


<?php
    include("../configuracion/config_dev.php");
    include("../class/Libro.php");

    session_start();

    echo "<p>Rol actual: ".$_SESSION['rol']."</p>";

    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <?php

    echo "<h3>Registrarse: </h3>";
    echo "<p>Indroduce Titulo: <input type='text' name='titulo' /></p>";
    echo "<p>Indroduce Autor: <input type='pass' name='autor' /></p>";
    echo "<p>Indroduce Editorial: <input type='pass' name='editorial' /></p>";
    echo "<p><input type='submit' name='annadirLibro' value='Añadir Libro' /></p>";
    // echo "<p><input type='submit' name='borrarRegistros' value='Borrar Usuarios' /></p>";

    echo "</form>";
    

    if(isset($_POST["annadirLibro"])){
        if(!empty(filtrado($_POST["titulo"])) && !empty(filtrado($_POST["autor"]) )){
            $libro = Libro::getInstancia();
            $libro->setTitulo(filtrado($_POST["titulo"]));
            $libro->setAutor(filtrado($_POST["autor"]));
            $libro->setEditorial(filtrado($_POST["editorial"]));

            $libro->persist();

            echo $libro->mensaje;
        }
        else{
            echo "El Libro no ha sido creado correctamente, ningun campo puede quedar vacío";
        }
    }

    echo "<br><br><button><a href='libros.php'>Volver</a></button>";
?>

</body>
<footer>
<?php include "../includes/footer.php";  ?>
</footer>
</html>