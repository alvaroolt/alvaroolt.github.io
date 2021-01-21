
<?php

include("configuracion/config_dev.php");
include("class/Usuario.php");

session_start();

if(!isset($_SESSION["rol"])){
    $_SESSION["rol"] = "Ninguno";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "includes/header.php";  ?>
    </header>


<?php

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<?php

    echo "<p>Rol actual: ".$_SESSION['rol']."</p>
        Usuario: <input type='text' name='usuario' /> Contraseña: <input type='pass' name='password'/><input type='submit' name='iniciaSesion' value='Iniciar sesión' />
        <button><a href='pages/registro.php'>Registrarse</a></button>
        </div>";
echo "</form>";
if(isset($_POST["iniciaSesion"])){
    if($_POST["usuario"] == "admin" && $_POST["password"] == "admin"){
        $_SESSION["rol"] = "admin";
        header("Location: pages/admin.php");
        echo "admin";
    }
    else{

        $usuario = Usuario::getInstancia();

        foreach ($usuario->obtenerUsuarios() as $usuarios) {
            // echo "<h2>".$usuarios["usuario"]."</h2>";
            // echo "<h2>".$usuarios["contrasenna"]."</h2>";
            if($_POST["usuario"] == $usuarios["usuario"] && $_POST["password"] == $usuarios["password"]){
                $_SESSION["rol"] = "lector";
                header("Location: pages/lector.php");
                $_SESSION["usuario"] = $_POST["usuario"];
            }
            
        }
    }
}
?>

</body>
<footer>
<?php include "includes/footer.php";  ?>
</footer>
</html>