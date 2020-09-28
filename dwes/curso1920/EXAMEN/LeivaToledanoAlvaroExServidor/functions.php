<?php
function limpiarDatos($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

function mostrarMenu($rol){
    switch($rol){
        case "admin":
            echo "";
        break;
        case "premium":
            echo "";
        break;
        case "basico":
            echo "";
        break;
            
    }
}
