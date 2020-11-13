<?php
session_start();
session_destroy();
header("Location:gestionAcademica.php");
?>