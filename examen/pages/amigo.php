<?php
if ($_SESSION["perfil"] == "invitado" || $_SESSION["perfil"] == "admin") {
    header("Location: index.php");
} else {
    if ($_SESSION["estado"] == 0) {

        $listaObras = $_SESSION["obra"]->get();

        echo "<table><tr><th>Título</th><th>Descripción</th><th>Portada</th><th>Fecha de inicio</th><th>Fecha final</th><th>Número de valoraciones</th><th>Valoración media</th></tr>";
        foreach ($listaObras as $value) {
            echo "<tr><td>" . $value["titulo"] . "</td><td>" . $value["descripcion"] . "</td><td><img src=\"./img/" . $value["portada"] . "\" alt=\"Imagen de la serie\" width=\"250\" height=\"250\"></img></td><td>" . $value["fecha_inicio"] . "</td><td>" . $value["fecha_final"] . "</td><td>" . $value["numero_valoraciones"] . "</td><td>" . $value["valoracion_media"] . "</td>";
            echo "<td>Valorar</br>";
            for ($i = 1; $i <= 5; $i++) {
                echo "<a href=\"index.php?page=amigo&valoracion=" . $i . "&id=" . $value["id"] . "\"><button>" . $i . "</button></a>";
            }
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Tu cuenta ha sido bloqueada.";
    }
}
