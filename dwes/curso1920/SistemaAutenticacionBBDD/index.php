<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_sistema_aut";

$conn = new mysqli($servername, $username, $password, $dbname);



function formularioAnonimo(){
    echo "<h2>Autenticación de usuarios (BBDD)</h2>";
    echo"<form action=\"index.php\" method=\"post\">
    Usuario: <input type=\"text\" name=\"user\"/><br><br>
    Contraseña: <input type=\"password\" name=\"pswd\"/><br><br>
    <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
    </form>
    "; 
}

function formularioAdmin(){
    echo "<h2 style='color:green'>Has logeado como administrador</h2>
    <form action=\"index.php\" method=\"post\">
    Nombre del nuevo usuario: <input type=\"text\" name=\"nuevoUser\"/><br><br>
    Contraseña del nuevo usuario: <input type=\"password\" name=\"nuevaPswd\"/><br><br>
    <input type=\"submit\" name=\"crear\" value=\"Crear Usuario\">
    </form>
    <br><table style='border: 3px solid black'>
    <h3>Listado Usuarios</h3>";
    $sql = "SELECT  nombre, contrasena FROM usuarios";
    $conn = new mysqli("localhost", "root", "", "bd_sistema_aut");
    $todosUsuarios = $conn->query($sql);

    if ($todosUsuarios->num_rows > 0) {
    while($row = $todosUsuarios->fetch_assoc()) {
        echo "<tr><td style='border: 2px solid black'>Nombre: " . $row["nombre"]. "</td><td style='border: 2px solid black'>Contraseña: " . $row["contrasena"]. "</td></tr>";
    }
    } else {
         echo "Todavía no ha introducino ningún usuario";
        }
    echo "</table>";

}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (!isset($_SESSION["perfil"])){
    $_SESSION["perfil"]="anonimo";
}

if ($_SESSION["perfil"] == "anonimo"){
    formularioAnonimo();
}

if ($_SESSION["perfil"] == "admin"){
    formularioAdmin();
}

if ($_SESSION["perfil"] == "registrado"){
    header("Location: privado.php");
}

if (isset($_POST["enviar"])) {
    if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["pswd"]) && $_POST["pswd"] != "") {
        if ($_POST["user"] == "admin" && $_POST["pswd"] == "admin") {
            $_SESSION["perfil"]="admin";
            header("Location: index.php");
        }else{
            $sql = "SELECT * FROM usuarios WHERE nombre = '".$_POST["user"]."' AND contrasena = '".$_POST["pswd"]."'";
            $registrado = $conn->query($sql);
            if (mysqli_num_rows($registrado) >= 1) {
                $_SESSION["perfil"]="registrado";
                header("Location: index.php");
            }else{
                echo "<p style='color:red'> El usuario que ha introducido no existe. </p>";
            }
        } 
    }
}

if (isset($_POST["crear"]) && isset($_POST["nuevoUser"]) && $_POST["nuevoUser"] != "" && isset($_POST["nuevaPswd"]) && $_POST["nuevaPswd"] != "") {
    $repetido = false;
   $sql = "SELECT * FROM usuarios WHERE nombre = '".$_POST["nuevoUser"]."'";
   $duplicado = $conn->query($sql);

   if (mysqli_num_rows($duplicado) >= 1) {
        $repetido = true;
    }
    
    if (!$repetido) {
        $sql = "INSERT INTO usuarios (nombre, contrasena) VALUES ('".$_POST["nuevoUser"]."', '".$_POST["nuevaPswd"]."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green'>Usuario creado correctamente. </p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    header("Location: index.php");
    }else{
    echo "<p style='color:red'> El usuario que intenta introducir ya existe. </p>";
    }
}

echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a><br>";