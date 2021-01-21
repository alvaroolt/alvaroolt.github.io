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
include("../class/Libro.php");

$libro = Libro::getInstancia();

// function borrarUsuario($usuario)
// {
//     $this->delete($usuario);
// }

session_start();

echo "<p>Rol actual: ".$_SESSION['rol']."</p>";

if($_SESSION["rol"] != "admin" && $_SESSION["rol"] != "lector"){
    header("Location: ../index.php");
}

// if(!empty($_GET["delete"])){
//     $delete = $_GET["delete"];
// }

if(isset($_GET["delete"])){
    $libro->delete($_GET["delete"]);
}

if($_SESSION["rol"] == "admin"){
    include "../includes/menuAdmin.php";

}
else{
    include "../includes/menuLector.php";

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

        <th>Titulo</th>

        <th>Autor</th>
        <th>Editorial</th>

    </tr>';

    foreach($libro->buscar($_POST["filtro"]) as $libros){
        echo "<tr>";

        echo "<td>".$libros["id"] . "</td>";
        echo "<td>".$libros["titulo"] . "</td>";
        echo "<td>".$libros["autor"] . "</td>";
        echo "<td>".$libros["editorial"] . "</td>";
        if($_SESSION["rol"] == "admin"){
            echo "<td><a href='libros.php?delete=".$libros["id"]."' >Borrar Libro</a></td>";

        }
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

      <th>Titulo</th>

      <th>Autor</th>
      <th>Editorial</th>
    
      </tr>
    
      
    
    
    ';
        foreach ($libro->obtenerLibrosCompletos() as $libros) {
            // echo "<h2>".$usuarios["usuario"]."</h2>";
            // echo "<h2>".$usuarios["contrasenna"]."</h2>";
    
            echo "<tr>";
    
            echo "<td>".$libros["id"] . "</td>";
            echo "<td>".$libros["titulo"] . "</td>";
            echo "<td>".$libros["autor"] . "</td>";
            echo "<td>".$libros["editorial"] . "</td>";
            if($_SESSION["rol"] == "admin"){

                echo "<td><a href='libros.php?delete=".$libros["id"]."' >Borrar Libro</a></td>";
            }
            // echo $usuario->_id;
            // echo "<td><button onclick=".$usuario->delete($usuarios["id"]).">Click me</button>";
            // echo $_GET["delete"];
            echo "</tr>";
            
            
        }
        echo "</table>";
        echo "</div>";
}

if($_SESSION["rol"] == "admin"){

    echo "<button><a href='annadirLibro.php' >Añadir libro</a></button>";
}


echo "<br><br><br><a href='../includes/logout.php' >Cerrar sesión</a>";
?>

</body>
<footer>
<?php include "../includes/footer.php";  ?>
</footer>
</html>