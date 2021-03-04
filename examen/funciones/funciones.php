<?php

    function limpiarDatos($limpiar){
        $error = trim($limpiar);
        $error = stripslashes($limpiar);
        $error =  htmlspecialchars($limpiar);
        return $error;
    }

    function cerrarSesion(){
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id();
        header("Location:index.php");
    } 
?>