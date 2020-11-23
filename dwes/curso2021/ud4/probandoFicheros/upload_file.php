<?php
if($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "</br>";
} else {
    echo "Upload: " . $_FILES["file"]["error"] . "</br>";
    echo "Type: " . $_FILES["file"]["name"] . "</br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB </br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
}
// Al utilizar el mundial PHP array $_FILES puede cargar archivos desde un equipo cliente al servidor remoto
