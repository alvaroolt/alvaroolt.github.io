<?php
echo '<br>
    <form action="administracion.php" method="post">
    <label>Buscar Prestamo:<input type="text" name="busquedaPrestamo"></label>
    <input type="submit" name="buscarPrestamo" value="Buscar">
    </form><br><br>
    ';
echo "<fieldset><h3>Listado de prestamos</h3>";

if (empty($vistaPrestamos)) {
    echo "<p style='color: red;'>Ningún prestamo coincide con la busqueda.</p>";
} else {
    foreach ($vistaPrestamos as $key => $prestamo) {
        echo "<fieldset>";
        foreach ($prestamo as $clave => $valor) {
            echo "<strong>" . $clave . ":</strong> " . $valor . "<br>";
        }
        echo '</fieldset><br>';
    }
    echo "</fieldset><br>";
}
