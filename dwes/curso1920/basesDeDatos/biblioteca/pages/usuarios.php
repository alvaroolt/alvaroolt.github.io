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

// function borrarUsuario($usuario)
// {
//     $this->delete($usuario);
// }

session_start();

echo "<p>Rol actual: ".$_SESSION['rol']."</p>";

if($_SESSION["rol"] != "admin"){
    header("Location: ../index.php");
}

if(!empty($_GET["delete"])){
    $delete = $_GET["delete"];
}

if(isset($_GET["delete"])){
    $usuario->delete($_GET["delete"]);
}


include "../includes/menuAdmin.php";

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<?php

echo "<br><br><br>Buscar: <input type='text' name='filtro' /><input type='submit' name='buscar' value='Buscar' />";

if(isset($_POST["buscar"])){
    echo '
    <table class="egt">

    <tr>


        <th>Identificador</th>

        <th>Usuario</th>

        <th>Contraseña</th>

    </tr>';

    foreach($usuario->buscar($_POST["filtro"]) as $usuarios){
        echo "<tr>";

        echo "<td>".$usuarios["id"] . "</td>";
        echo "<td>".$usuarios["usuario"] . "</td>";
        echo "<td>".$usuarios["contrasenna"] . "</td>";
        echo "<td><a href='usuarios.php?delete=".$usuarios["id"]."' >Borrar Usuario</a></td>";
        // echo $usuario->_id;
        // echo "<td><button onclick=".$usuario->delete($usuarios["id"]).">Click me</button>";
        // echo $_GET["delete"];
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "<br><br><div>";
    echo '
    <table class="egt">
    
      <tr>
    
    
        <th>Identificador</th>
    
        <th>Usuario</th>
    
        <th>Contraseña</th>
    
      </tr>
    
      
    
    
    ';
        foreach ($usuario->obtenerUsuariosCompletos() as $usuarios) {
            // echo "<h2>".$usuarios["usuario"]."</h2>";
            // echo "<h2>".$usuarios["contrasenna"]."</h2>";
    
            echo "<tr>";
    
            echo "<td>".$usuarios["id"] . "</td>";
            echo "<td>".$usuarios["usuario"] . "</td>";
            echo "<td>".$usuarios["contrasenna"] . "</td>";
            echo "<td><a href='usuarios.php?delete=".$usuarios["id"]."' >Borrar Usuario</a></td>";
            // echo $usuario->_id;
            // echo "<td><button onclick=".$usuario->delete($usuarios["id"]).">Click me</button>";
            // echo $_GET["delete"];
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