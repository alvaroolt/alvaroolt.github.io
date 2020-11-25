<?php
session_start();
session_destroy();
header("Location:buscaminas.php");
?>