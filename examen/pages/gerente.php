<?php
if (!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "gerente") {
    header("Location: index.php");
}
if ($_SESSION["estado"] == 0) {
    $listaLogs = $_SESSION["log"]->get();

    echo "Bienvenido " . $_SESSION["user"] . ".</br></br>";
    echo "<table><tr><th>Fecha y hora</th><th>Usuario</th><th>Descripción</th></tr>";
    foreach ($listaLogs as $value) {
        echo "<tr><td>" . $value["fecha_hora"] . "</td><td>" . $value["usuario"] . "</td><td>" . $value["descripcion"] . "</td></tr>";
    }
    echo "</table></br></br>";

    echo "<h2>Registro</h2>";
    echo "<form enctype='multipart/form-data' action='index.php?page=gerente' method='post'>";
    echo "Titulo <input type='text' name='titulo' required></br>";
    echo "Descripción </br><textarea name='descripcion' cols='30' rows='6' maxlength='255'></textarea></br>";
    echo "<input type='hidden' name='MAX_FILE_SIZE' value='800000'>";
    echo "Portada <input type='file' name='portada' required></br>";
    echo "Fecha de inicio <input type='text' name='fecha_inicio' required></br>";
    echo "Fecha final <input type='text' name='fecha_final' required></br>";
    echo "<input type='submit' name='anadirObra' value='Registrar nueva obra'>";
    echo "</form>";

    if (isset($_POST["anadirObra"])) {

        $portada = "img_" . (count(glob('img/{*}', GLOB_BRACE)) + 1) . ".jpg";
        move_uploaded_file($_FILES["portada"]["tmp_name"], "./img/" . $portada);

        $arrayNuevaObra = array(
            "titulo" => $_POST["titulo"],
            "descripcion" => $_POST["descripcion"],
            "portada" => $portada,
            "fecha_inicio" => $_POST["fecha_inicio"],
            "fecha_final" => $_POST["fecha_final"]
        );

        $_SESSION["obra"]->set($arrayNuevaObra);
    }
} else {
    echo "Tu cuenta ha sido bloqueada.";
}
