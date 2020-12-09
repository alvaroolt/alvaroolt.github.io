<?php
    echo "<div class=\"login\">Usted está logeado como: ".$_SESSION['nombre']."</div>";
    echo "<form action=".$_SERVER['PHP_SELF']." method=\"post\" class=\"login\">";
    echo "<input type=\"submit\" value=\"Salir\" name=\"salir\">";
    echo "</form>";
?>