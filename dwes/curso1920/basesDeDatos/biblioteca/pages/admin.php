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

session_start();

echo "<p>Rol actual: ".$_SESSION['rol']."</p>";

if($_SESSION["rol"] != "admin"){
    header("Location: ../index.php");
}

echo "Bienvenido, usuario administrador</br></br>";

include "../includes/menuAdmin.php";

echo "<br><br><br><a href='../includes/logout.php' >Cerrar sesión</a>";


?>

</body>
<footer>
<?php include "../includes/footer.php";  ?>
</footer>
</html>