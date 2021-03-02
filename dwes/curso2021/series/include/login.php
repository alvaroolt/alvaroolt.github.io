<?php
    echo "Usted está logeado como " . $_SESSION["perfil"];
    echo "<form action='./index.php' method='post'>";
    echo "Usuario <input type='text' name='user'><br/>";
    echo "Contraseña <input type='password' name='pass'><br/>";
    echo "<input type='submit' name='login' value='Enviar'>";
    echo "</form>";
?>