<?php
$listaSeries = $_SESSION["serie"]->get();

echo "<table>";
echo "<tr><th>Título</th><th>Carátula</th><th>Reproducir Serie</th></th><th>Número Reproducciones</th></tr>";
foreach ($listaSeries as $value) {
    echo "<tr>";
    echo "<td>" . $value["titulo"] . "</td>";
    echo "<td><img src=\"./img/" . $value["caratula"] . "\" alt=\"Imagen de la serie\" width=\"250\" height=\"250\"></img></td>";
    echo "<td><a href=\"index.php?page=registrado&btnPremium\"><button>Registrarse</button></a></td>";
    echo "<td>" . $value["numero_reproducciones"] . "</td>";
    echo "</tr>";
}
echo "</table>";
