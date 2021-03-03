<?php
if ($_SESSION["perfil"] == "invitado" || $_SESSION["perfil"] == "admin") {
    header("Location: index.php");
} else {
    if ($_SESSION["estado"] == 1) {
        echo "Tu usuario ha sido aceptado por un administrador.";
    } else {
        echo "Cuenta a la espera de ser aceptada.";
    }
}
