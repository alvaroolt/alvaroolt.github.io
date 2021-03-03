<?php
echo "<h2>Registro</h2>";
    echo "<form action='index.php' method='post'>";
        echo "Usuario <input type='text' name='user' required>";
        echo "Contraseña <input type='text' name='pass' required>";
        echo "<input type='submit' name='registrarse' value='Registrarse'>";
        echo "<a href=\"index.php\">Inicio</a>";
    echo "</form>";
?>