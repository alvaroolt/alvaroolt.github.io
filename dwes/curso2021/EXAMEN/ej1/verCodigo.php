<?php
$fileName=$_GET['src'];

if (!empty($fileName)) {
    $ruta=$fileName;
    highlight_file($ruta);
}
?>