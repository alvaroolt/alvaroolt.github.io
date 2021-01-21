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
    include("../class/Usuario.php");

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
    echo "<p>Indroduce usuario: <input type='text' name='usuario' /></p>";
    echo "<p>Indroduce contraseña: <input type='pass' name='contrasenna' /></p>";
    echo "<p><input type='submit' name='annadirUsuario' value='Añadir Usuario' /></p>";
    // echo "<p><input type='submit' name='borrarRegistros' value='Borrar Usuarios' /></p>";

    echo "</form>";
    

    if(isset($_POST["annadirUsuario"])){
        if(!empty(filtrado($_POST["usuario"])) && !empty(filtrado($_POST["contrasenna"]))){
            $usuario = Usuario::getInstancia();
            $usuario->setUsuario(filtrado($_POST["usuario"]));
            $usuario->setContrasenna(filtrado($_POST["contrasenna"]));
            $usuario->persist();

            echo $usuario->mensaje;
        }
        else{
            echo "El usuario no ha sido creado correctamente, ningun campo puede quedar vacío";
        }
    }

    echo "<br><br><button><a href='../index.php'>Salir</a></button>";
?>

</body>
<footer>
<?php include "../includes/footer.php";  ?>
</footer>
</html>