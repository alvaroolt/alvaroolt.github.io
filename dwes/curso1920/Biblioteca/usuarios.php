<?php
echo '<br>
    <form action="administracion.php" method="post">
    <label>Buscar Usuario:<input type="text" name="busquedaUser"></label>
    <input type="submit" name="buscarUser" value="Buscar">
    </form><br><br>
    ';
echo "<fieldset><h3>Listado de usuarios</h3>";

if (empty($vistaUsers)) {
    echo "<p style='color: red;'>Ningún usuario coincide con la busqueda.</p>";
} else {
    foreach ($vistaUsers as $key => $usuario) {
        echo "<fieldset>";
        foreach ($usuario as $clave => $valor) {
            echo "<strong>" . $clave . ":</strong> " . $valor . "<br>";
        }
        echo '
        <form action="administracion.php" method="post">
        <input type="hidden" name="usuarioEscogido" value="' . $usuario["id"] . '">
        ';
        if ($usuario["estado"] == "bloqueado" || $usuario["estado"] == "pendiente") {
            echo '<input style="background-color:lightgreen" type="submit" name="cambiaPermiso" value="Conceder acceso">';
        }
        if ($usuario["estado"] == "acceso") {
            echo '<input style="background-color:lightcoral" type="submit" name="bloquear" value="Bloquear">';
        }
        echo '
        </form></fieldset><br>
        ';
    }
    echo "</fieldset><br>";
}
