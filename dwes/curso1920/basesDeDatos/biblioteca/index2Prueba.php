
<?php

include("configuracion/config_dev.php");
include("class/Libro.php");


echo "Añadiendo<br/>";


// Obtener lo que tiene un cierto id

$libro = Libro::getInstancia();

$id = 35;

$resultado = $libro->get($id);

print_r($resultado);

// Editar un libro

$datos = array("id"=>35,"titulo"=>"Cenicienta","autor"=>"Anton");

$libro->edit($datos);

$resultado = $libro->get($id);

print_r($resultado);

// Borrar un Libro

$id = 36;

$libro->delete($id);

$resultado = $libro->get(36);
if(!$resultado){
    echo "El libro no existe";
    
}
?>
