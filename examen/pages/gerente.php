<?php
if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "gerente") {
    header("Location: index.php");
}
$listaLogs = $_SESSION["log"]->get();

echo "Bienvenido gerente.</br>";
echo "<table><tr><th>ID</th><th>Fecha y hora</th><th>Usuario</th><th>Descripción</th></tr>";
foreach ($listaLogs as $value) {
    echo "<tr><td>" . $value["id"] . "</td><td>" . $value["fecha_hora"] . "</td><td>" . $value["usuario"] . "</td><td>" . $value["descripcion"] . "</td></tr>";
}
echo "</table>";

// if (isset($_GET["activar"])) {
//     $_SESSION["usuario"]->activarUser($_GET["activar"]);
//     header("Location: index.php?page=gerente");
// }
// if (isset($_GET["desactivar"])) {
//     $_SESSION["usuario"]->desactivarUser($_GET["desactivar"]);
//     header("Location: index.php?page=gerente");
// }