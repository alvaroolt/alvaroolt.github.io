<?php
if ($_SESSION["perfil"] == "invitado" || $_SESSION["perfil"] == "admin") {
    header("Location: index.php");
}
if ($_SESSION["estado"] == 0) {

    $listaObras = $_SESSION["obra"]->getObrasPasadas(date("Y-m-d H:i:s"));
    echo "<h3>Obras finalizadas</h3>";
    echo "<table border=\"1px solid black\">";
    echo "<tr><th>Titulo</th><th>Descripcion</th><th>Portada</th><th>Número de valoraciones</th><th>Valoración Media</th><th>Votar</th></tr>";
    foreach ($listaObras as $key => $value) {
        echo "<tr>";
        foreach ($value as $key2 => $value2) {
            switch ($key2) {
                case "id";
                    $id = $value2;
                    break;
                case "titulo";
                    echo "<td>$value2</td>";
                    break;
                case "portada":
                    echo "<td><img src=\"img/$value2\" width=\"150px\" /></td>";
                    break;
                case "descripcion":
                    echo "<td>$value2</td>";
                    break;
                case "numero_valoraciones":
                    (empty($value2)) ? $numVal = 0 : $numVal = $value2;
                    echo "<td>$value2</td>";
                    break;
                case "valoracion_media":
                    (empty($value2)) ? $valMed = 0 : $valMed = $value2;
                    echo "<td>$value2</td>";
                    break;
            }
        }
        echo "<td><a href=\"index.php?page=amigo&btnVotar=$id&numVal=$numVal&valMed=$valMed\">Votar</a></td>";
        echo "</tr>";
    }
    echo "</table></br>";

    $listaEstrenos = $_SESSION["obra"]->getEstrenos(date("Y-m-d H:i:s"));
    echo "<h3>Nuevos estrenos</h3>";
    echo "<table border=\"1px solid black\">";
    echo "<tr><th>Titulo</th><th>Descripcion</th><th>Portada</th><th></th></tr>";
    foreach ($listaEstrenos as $key => $value) {
        echo "<tr>";
        foreach ($value as $key2 => $value2) {
            switch ($key2) {
                case "id";
                    $id = $value2;
                    break;
                case "titulo";
                    echo "<td>$value2</td>";
                    break;
                case "portada":
                    echo "<td><img src=\"img/$value2\" width=\"150px\" /></td>";
                    break;
                case "descripcion":
                    echo "<td>$value2</td>";
                    break;
            }
        }
        echo "<td><a href=\"index.php?page=amigo&btnComprar=$id\">Comprar entradas</a></td>";
        echo "</tr>";
    }
    echo "</table></br>";

    if (isset($_GET["btnVotar"])) {
        $obraElegida = $_SESSION["obra"]->getObraById($_GET["btnVotar"]);
        echo "<div border=\"1px solid black\">";
        echo "<p>Votacion de la obra " . $obraElegida[0]["titulo"] . "</p>";
        echo "<form action=\"index.php?page=amigo\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET["btnVotar"] . "\" />";
        for ($i = 1; $i < 6; $i++) {
            echo "<input type=\"radio\" value=\"$i\" name=\"valoracion\">$i</input><br>";
        }
        echo "<input type=\"hidden\" name=\"numVal\" value=\"" . $obraElegida[0]["numero_valoraciones"] . "\" />";
        echo "<input type=\"hidden\" name=\"valMed\" value=\"" . $obraElegida[0]["valoracion_media"] . "\" />";
        echo "<p><input type=\"submit\" name=\"btnValoracion\" value=\"Enviar valoracion\">";
        echo "</form>";
        echo "</div>";
    }

    if (isset($_POST["valoracion"])) {
        if ($_POST["valMed"] != 0) {
            $media = ($_POST["valMed"] + $_POST["valoracion"]) / ($_POST["numVal"] + 1);
        } else {
            $media = $_POST["valoracion"];
        };
        $arrayData = array(
            "numero_valoraciones" => $_POST["numVal"] += 1,
            "valoracion_media" => $media,
            "id" => $_POST["id"]
        );
        $_SESSION["obra"]->edit($arrayData);
        echo "Has votado";
    }

    if (isset($_GET["btnComprar"])) {

        $obraElegida = $_SESSION["obra"]->getObraById($_GET["btnComprar"]);
        $entradasObraElegida = $_SESSION["entrada"]->getEntradaByIdObra($_GET["btnComprar"]);
        $tarifasObraElegida = $_SESSION["tarifa"]->getTarifaByIdObra($_GET["btnComprar"]);

        echo "<h3>Butacas para " . $obraElegida[0]["titulo"] . "</h3>";
        echo "<form action=\"index.php?page=amigo&btnComprar=$id\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET["btnComprar"] . "\" />";
        echo "<table border=\"1px solid black\"><tr><td></td>";
        for ($i = 1; $i <= 20; $i++) {
            echo "<td>Columna $i</td>";
        }
        echo "</tr>";
        for ($fila = 1; $fila <= 20; $fila++) {
            echo "<tr><td>Fila $fila</td>";
            for ($columna = 1; $columna <= 20; $columna++) {
                foreach ($entradasObraElegida as $key => $value) {
                    if (($entradasObraElegida[$key]["columna"] == $columna) && ($entradasObraElegida[$key]["fila"] == $fila)) {
                        echo "<td>X</td>";
                        $columna = $columna + 1;
                    } else {
                        // echo "<td><input title=\"Texto flotante\" type=\"checkbox\" id=\"vehicle1\" name=\"vehicle1\" value=\"Bike\"></td>";
                        // $columna = $columna + 1;
                    }
                }
                $precio = "";
                switch ($fila) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                        $precio = $tarifasObraElegida[0]["zonaA"];
                        break;
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                        $precio = $tarifasObraElegida[0]["zonaB"];
                        break;
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                    case 15:
                    case 16:
                    case 17:
                    case 18:
                    case 19:
                    case 20:
                        $precio = $tarifasObraElegida[0]["zonaC"];
                        break;
                }
                echo "<td><input title=\"Precio de butaca $fila,$columna: $precio" . "€\"" . " type=\"checkbox\" id=\"vehicle1\" name=\"butaca\" value=$precio></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<p><input type=\"submit\" name=\"btnComprarEntrada\" value=\"Confirmar compra de entradas\"></p>";
        echo "</form>";
    }

    if (isset($_POST["btnComprarEntrada"])) {
        echo "Entradas compradas con éxito";
    }
} else {
    echo "Tu cuenta ha sido bloqueada.";
}
