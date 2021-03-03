<?php
if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "admin") {
    header("Location: index.php");
}
$listaUsuarios = $_SESSION["usuario"]->getUsuarios();

echo "bienvenido administrador</br>";
echo "<table><tr><th>ID</th><th>Usuario</th><th>Estado</th></tr>";
foreach ($listaUsuarios as $value) {
    echo "<tr><td>" . $value["id"] . "</td><td>" . $value["usuario"] . "</td>";
    if ($value["estado"] == 0) {
        echo "<td><a href=\"index.php?page=admin&activar=" . $value["id"] . "\"><button>Activar</button></a></td></tr>";
    } else {
        echo "<td><a href=\"index.php?page=admin&desactivar=" . $value["id"] . "\"><button>Desactivar</button></a></td></tr>";
    }
}
echo "</table>";

if (isset($_GET["activar"])) {
    $_SESSION["usuario"]->activarUser($_GET["activar"]);
    header("Location: index.php?page=admin");
}
if (isset($_GET["desactivar"])) {
    $_SESSION["usuario"]->desactivarUser($_GET["desactivar"]);
    header("Location: index.php?page=admin");
}
