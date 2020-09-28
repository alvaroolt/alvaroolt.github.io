<?php
echo '<br>
    <form action="administracion.php" method="post">
    <label>Buscar Libros:<input type="text" name="busquedaLibro"></label>
    <input type="submit" name="buscarLibro" value="Buscar">
    <input type="submit" name="nuevoLibro" value="Nuevo">
    </form><br><br>
    ';
echo "<fieldset><h3>Listado de libros</h3>";
if (empty($vistaLibros)) {
    echo "<p style='color: red;'>Ningún libro coincide con la busqueda.</p>";
} else {
    foreach ($vistaLibros as $key => $libro) {
        echo "<fieldset>";
        foreach ($libro as $clave => $valor) {
            echo "<strong>" . $clave . ":</strong> " . $valor . "<br>";
        }
        echo '
        <form action="administracion.php" method="post">
        <input type="hidden" name="libroEscogido" value="' . $libro["id"] . '">
        <input style="background-color:lightblue"  type="submit" name="editaLibro" value="Modificar">
        <input style="background-color:red; color:white; "  type="submit" name="borraLibro" value="Borrar">
        </form></fieldset><br>';
    }
    echo "</fieldset><br>";
}
