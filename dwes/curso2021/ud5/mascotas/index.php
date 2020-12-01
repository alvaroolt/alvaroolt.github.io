<?php
// require_once "app\models\Persona.php";
require_once "vendor\autoload.php";

use App\Models\Persona;

echo "He entrado en el index de mascotas.</br>";
$persona = new Persona("Alvaro", "Leiva", "Toledano");
$persona->saluda();
