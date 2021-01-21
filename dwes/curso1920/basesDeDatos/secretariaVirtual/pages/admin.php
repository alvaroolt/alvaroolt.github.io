<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link REL=StyleSheet HREF="../css/style.css" TYPE="text/css" MEDIA=screen>
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "../includes/header.php";  ?>
    </header>
<?php

include("../configuracion/config_dev.php");
include("../class/Usuario.php");

$usuario = Usuario::getInstancia();

session_start();

echo "<p>Rol actual: ".$_SESSION['rol']."</p>";

if($_SESSION["rol"] != "admin"){
    header("Location: ../index.php");
}

echo "Bienvenido, usuario administrador</br></br>";

if($_SESSION["rol"] != "admin"){
    header("Location: ../index.php");
}

if(!empty($_GET["delete"])){
    $delete = $_GET["delete"];
}

if(isset($_GET["delete"])){
    $usuario->delete($_GET["delete"]);
}

if(!empty($_GET["activar"])){
    $activar = $_GET["activar"];
}

if(isset($_GET["activar"])){
    $usuario->activar($_GET["activar"]);
}

if(!empty($_GET["bloquear"])){
    $bloquear = $_GET["bloquear"];
}

if(isset($_GET["bloquear"])){
    $usuario->bloquear($_GET["bloquear"]);
}

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<?php

echo "<br><br><br>Buscar: <input type='text' name='filtro' /><input type='submit' name='buscar' value='Buscar' />";

if(isset($_POST["buscar"])){
    echo '
    <table class="egt">

    <tr>


        <th>Identificador</th>

        <th>Nombre</th>

        <th>Email</th>

        <th>Usuario</th>

        <th>Contraseña</th>

        <th>Estado</th>

    </tr>';

    foreach($usuario->buscar($_POST["filtro"]) as $usuarios){
        echo "<tr>";

        echo "<td>".$usuarios["id"] . "</td>";
        echo "<td>".$usuarios["nombre"] . "</td>";
        echo "<td>".$usuarios["email"] . "</td>";
        echo "<td>".$usuarios["usuario"] . "</td>";
        echo "<td>".$usuarios["password"] . "</td>";
        echo "<td>".$usuarios["estado"] . "</td>";
        if($usuarios["estado"] == "bloqueado"){
            echo "<td><a href='admin.php?activar=".$usuarios["id"]."' >Activar Usuario</a></td>";
        }

        if($usuarios["estado"] == "activo"){
            // $usuario->bloquear($usuarios["id"]);
            // echo "<td>bloquear</td>";
            echo "<td><a href='admin.php?bloquear=".$usuarios["id"]."' >Bloquear Usuario</a></td>";

        }
        echo "<td><a href='admin.php?delete=".$usuarios["id"]."' >Borrar Usuario</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "<br><br><div>";
    echo '
    <table class="egt">
    
      <tr>
    
    
      <th>Identificador</th>

      <th>Nombre</th>

      <th>Email</th>

      <th>Usuario</th>

      <th>Contraseña</th>

      <th>Estado</th>
    
      </tr>
    
    ';
        foreach ($usuario->obtenerUsuariosCompletos() as $usuarios) {
    
            echo "<tr>";
    
            echo "<td>".$usuarios["id"] . "</td>";
            echo "<td>".$usuarios["nombre"] . "</td>";
            echo "<td>".$usuarios["email"] . "</td>";
            echo "<td>".$usuarios["usuario"] . "</td>";
            echo "<td>".$usuarios["password"] . "</td>";
            echo "<td>".$usuarios["estado"] . "</td>";

            if($usuarios["estado"] == "bloqueado"){
                echo "<td><a href='admin.php?activar=".$usuarios["id"]."' >Activar Usuario</a></td>";

                // $usuarios->activar($usuarios["id"]);
                // echo "<td>activar</td>";
            }

            if($usuarios["estado"] == "activo"){
                echo "<td><a href='admin.php?bloquear=".$usuarios["id"]."' >Bloquear Usuario</a></td>";

            }

            echo "<td><a href='admin.php?delete=".$usuarios["id"]."' >Borrar Usuario</a></td>";
            echo "</tr>";
            
        }
        echo "</table>";
        echo "</div>";
}

echo "<br><br><br><a href='../includes/logout.php' >Cerrar sesión</a>";
?>

</body>
<footer>
<?php include "../includes/footer.php";  ?>
</footer>
</html>