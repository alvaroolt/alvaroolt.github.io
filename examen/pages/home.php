<?php
$listaObras = $_SESSION["obra"]->getEstrenos(date("Y-m-d H:i:s"));

echo "<table><tr><th>Título</th><th>Descripción</th><th>Portada</th><th>Fecha de inicio</th><th>Fecha final</th></tr>";
foreach ($listaObras as $value) {
    echo "<tr><td>" . $value["titulo"] . "</td><td>" . $value["descripcion"] . "</td><td><img src=\"./img/" . $value["portada"] . "\" alt=\"Imagen de la serie\" width=\"150\" height=\"150\"></img></td><td>" . $value["fecha_inicio"] . "</td><td>" . $value["fecha_final"] . "</td></tr>";
}
echo "</table>";
