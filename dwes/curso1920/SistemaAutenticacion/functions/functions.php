<?php

function formularioAnonimo()
{
    echo "<h2>Autenticación de usuarios (ficheros)</h2>";
    echo "<form action=\"index.php\" method=\"post\">
            Usuario: <input type=\"text\" name=\"user\"/><br><br>
            Contraseña: <input type=\"password\" name=\"pswd\"/><br><br>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
            </form>
            ";
}

function formularioAdmin()
{
    echo "<h3 style='color: green'>Has logeado como administrador</h3>
            <form action=\"index.php\" method=\"post\">
            Nombre del nuevo usuario: <input type=\"text\" name=\"nuevoUser\"/><br><br>
            Contraseña del nuevo usuario: <input type=\"password\" name=\"nuevaPswd\"/><br><br>
            <input type=\"submit\" name=\"crear\" value=\"Crear Usuario\">
            </form>
            <br><table style='border: 3px solid black'>
            <h3>Usuarios registrados actualmente</h3>";
    foreach ($_SESSION["usuarios"]  as $indice => $usuario) {
        echo "<tr>
                <td style='border-bottom:1px solid black'>
                Nombre: " . $usuario[0] . "<br>
                Contraseña: " . $usuario[1];
        "</td>
                </tr>";
    }
    echo "</table>";
}