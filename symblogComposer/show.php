<?php

include "datos/datos.php";

if (isset($_GET["id"])) {
    print_r($blogs[$_GET["id"] - 1]);
}
