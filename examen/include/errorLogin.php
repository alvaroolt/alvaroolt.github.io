<?php
if ($_SESSION["intentos"] == 3) { 
    echo "Usuario bloqueado";
} else {
    echo "Error al iniciar sesión. Te quedan " . 3-$_SESSION["intentos"] . " intentos."; 
}