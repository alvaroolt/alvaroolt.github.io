<?php
$listaObras = $_SESSION["obra"]->get();

echo "<table><tr><th>Título</th><th>Descripción</th><th>Portada</th><th>Fecha de inicio</th><th>Fecha final</th><th>Número de valoraciones</th><th>Valoración media</th></tr>";
foreach ($listaObras as $value) {
    echo "<tr><td>" . $value["titulo"] . "</td><td>" . $value["descripcion"] . "</td><td><img src=\"./img/" . $value["portada"] . "\" alt=\"Imagen de la serie\" width=\"150\" height=\"150\"></img></td><td>" . $value["fecha_inicio"] . "</td><td>" . $value["fecha_final"] . "</td><td>" . $value["numero_valoraciones"] . "</td><td>" . $value["valoracion_media"] . "</td></tr>";
}
echo "</table>";
