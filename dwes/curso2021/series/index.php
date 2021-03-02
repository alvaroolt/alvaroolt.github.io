<?php
   include "config/config.php";
   include "class/Usuario.php";
   include "class/Serie.php";
//    include "class/Encuesta.php";
//    include "class/Pago.php";

   session_start();
   
    if(!isset($_SESSION["perfil"])){
        $_SESSION["serie"] = Serie::getInstancia();
        $_SESSION["usuario"] = Usuario::getInstancia();
        // $_SESSION["encuesta"] = Encuesta::getInstancia();
        // $_SESSION["pago"] = Pago::getInstancia();
        $_SESSION["perfil"]="invitado";
        $_SESSION["mensaje"] = "";
    }

    $series = $_SESSION["serie"]->getSeries();

    if(isset($_POST["login"])){
        $arrayUsuario = $_SESSION["usuario"]->get($_POST["user"]);
        print_r($arrayUsuario);
        // if(sizeof($arrayUsuario) == 1 && $arrayUsuario[0]["passwd"] == $_POST["pass"]){  
        //     $_SESSION["id_usuario"] = $arrayUsuario[0]["id"];
        //     $_SESSION["user"] = $arrayUsuario[0]["usuario"];
        //     $_SESSION["perfil"] = $arrayUsuario[0]["perfil"];
        //     $_SESSION["plan"] = $_SESSION["usuario"]->getPlan($_SESSION["perfil"]);

        //     if ($_SESSION["perfil"] == "admin") {
        //         header("Location:index.php?page=admin");
        //     }   
        //     if (($_SESSION["perfil"] == "premium") || ($_SESSION["perfil"] == "basico") ) {
        //         header("Location:index.php?page=registrado");
        //     }   
        // }else{
        //     include "pages/home.php";
        // }
    }
    if(isset($_POST["cerrarSesion"])){
        include "include/logout.php";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Series TV</title>
</head>
<body>
    <?php include "include/header.php"; ?>
    <?php
    if($_SESSION["perfil"] == "invitado"){
        include "include/login.php";
    }else{
        echo "<form action='index.php' method='post'>";
            echo "<input type='submit' name='cerrarSesion' value='Cerrar Sesión'>";
        echo "</form>";
    }
    ?>
    <main>
        <?php
        if (isset($_GET["page"])){
            if ($_GET["page"]=="index") {
                header("Location: index.php");
            }else if ($_GET["page"]=="admin") {
                // include ("pages/admin.php"); 
                echo "eres admin";
            }else if (($_GET["page"]=="registrado")) {
                // include ("pages/registrado.php"); 
                echo "eres registrado";
            }
        } else {
            // echo "<table>";
            //     echo "<tr><th colspan='100'>TABLA SERIES</th></tr><tr><th>Título</th><th>Carátula</th><th>Número de reproducciones</th><th> </th></tr>";
            //     foreach ($series as $value) {
            //         echo "<tr><td>" . $value["titulo"] . "</td>";
            //         echo "<td><img src=\"img/" . $value["caratula"] . "\" alt=\"Imagen de la serie\" width=\"250\" height=\"250\"></img></td>";
            //         if ($_SESSION["plan"][0]["id"] == 2) {
            //             echo "<td><a href=\"index.php?page=registrado&btnPlay&id=" . $value["id"] . "\"><button>Reproducir</button></a>";
            //         } else {
            //             if ($value["id_plan"] == $_SESSION["plan"][0]["id"]) {
            //                 echo "<td><a href=\"index.php?page=registrado&btnPlay&id=" . $value["id"] . "\" ><button>Reproducir</button></a>";
            //             } else {
            //                 echo "<td><a href=\"index.php?page=registrado&btnPremium\"><button>Pasarse a Premium</button></a>";
            //             }
            //         }
            //         echo "<td>" . $value["numero_reproducciones"] . "</td>";
            //         echo "</tr>";
            //     }
            //     echo "</table>";
        }
        ?>
    </main>
</body>
<footer><?php include "include/footer.php" ?></footer>
</html>