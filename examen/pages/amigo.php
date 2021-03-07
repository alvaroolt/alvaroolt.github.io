<?php
if ($_SESSION["perfil"] == "invitado" || $_SESSION["perfil"] == "gerente") {
    header("Location: index.php");
}
if ($_SESSION["estado"] == 0) {

    $entradasVendidas = $_SESSION["entrada"]->getEntradaByEmail($_SESSION["correo"]);
    if (!empty($entradasVendidas)) {
        echo "</br>Lista de entradas adquiridas:";
        echo "</br><table border=\"1px solid black\">";
        echo "<tr><th>Obra</th><th>Fila</th><th>Columna</th><th>Precio</th></tr>";
        foreach ($entradasVendidas as $key => $value) {
            echo "<tr>";
            foreach ($value as $key2 => $value2) {

                if ($key2 == "idObra") {
                    echo "<td>" . $_SESSION["obra"]->getTituloById($value2)[0]["titulo"] . "</td>";
                }
                if ($key2 == "fila") {
                    echo "<td>$value2</td>";
                }
                if ($key2 == "columna") {
                    echo "<td>$value2</td>";
                }
                if ($key2 == "precio") {
                    echo "<td>" . $value2 . "€</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

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

        $arrayButacas = array();
        for ($fila = 0; $fila <= 19; $fila++) {
            array_push($arrayButacas, array());
            for ($columna = 1; $columna <= 20; $columna++) {
                $precio = "";
                switch ($fila) {
                        // los case no coinciden con las filas de las butacas porque el índice empieza en 0 y no en 1!!
                    case 0:
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        $precio = $tarifasObraElegida[0]["zonaA"];
                        break;
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        $precio = $tarifasObraElegida[0]["zonaB"];
                        break;
                    case 10:
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                    case 15:
                    case 16:
                    case 17:
                    case 18:
                    case 19:
                        $precio = $tarifasObraElegida[0]["zonaC"];
                        break;
                }
                array_push($arrayButacas[$fila], $precio);
            }
        }

        echo "<h3>Butacas para " . $obraElegida[0]["titulo"] . "</h3>";
        echo "<form action=\"index.php?page=amigo&btnComprar=" . $obraElegida[0]["id"] . "\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET["btnComprar"] . "\" />";
        echo "<table border=\"1px solid black\"><tr><td></td>";
        for ($i = 1; $i <= 20; $i++) {
            echo "<td>Columna $i</td>";
        }
        foreach ($arrayButacas as $key => $value) {
            echo "<tr><td>Fila " . ($key + 1) . "</td>";
            foreach ($value as $key2 => $value2) {
                $butacaLibre = true;
                foreach ($entradasObraElegida as $keyEntradas => $valueEntradas) {
                    if (($entradasObraElegida[$keyEntradas]["columna"] == ($key2 + 1)) && ($entradasObraElegida[$keyEntradas]["fila"] == ($key + 1)) && $butacaLibre == true) {
                        echo "<td>X</td>";
                        // continue;
                        $butacaLibre = false;
                    }
                }
                if ($butacaLibre == true) {
                    echo "<td><input title=\"Precio de butaca " . ($key + 1) . "," . ($key2 + 1) . ": $value2" . "€\"" . " type=\"checkbox\" id=\"butacaFila" . ($key + 1) . "Columna" . ($key2 + 1) . "\" name=\"butacaFila" . ($key + 1) . "Columna" . ($key2 + 1) . "\" value=$value2></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<p><input type=\"submit\" name=\"btnComprarEntrada\" value=\"Comprar entradas\"></p>";
        echo "</form>";

        // sin esta sesión, no puedo recoger el array de butacas escogidas por el usuario en isset($_POST["btnComprarEntrada])
        if (!isset($_SESSION["arrayButacasElegidas"])) {
            $_SESSION["arrayButacasElegidas"] = array();
        }

        if (isset($_POST["btnComprarEntrada"])) {

            $importe = 0;
            $_SESSION["arrayButacasElegidas"] = array();

            foreach ($arrayButacas as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if (isset($_POST["butacaFila" . ($key + 1) . "Columna" . ($key2 + 1)])) {
                        $importe = $importe + $_POST["butacaFila" . ($key + 1) . "Columna" . ($key2 + 1)];
                        array_push($_SESSION["arrayButacasElegidas"], array("fila" => ($key + 1), "columna" => ($key2 + 1), "precio" => $_POST["butacaFila" . ($key + 1) . "Columna" . ($key2 + 1)]));
                    }
                }
            }

            echo "<form action=\"index.php?page=amigo&btnComprar=" . $obraElegida[0]["id"] . "\" method=\"post\">";
            echo "<table><tr><td>El importe total de las entradas es de " . $importe . "€ </td><td><input type=\"submit\" name=\"btnConfirmarCompra\" value=\"Confirmar compra\"></td></tr></table>";
            echo "</form>";
        }

        if (isset($_POST["btnConfirmarCompra"])) {

            $fila = 0;
            $columna = 0;
            $precio = 0;

            foreach ($_SESSION["arrayButacasElegidas"] as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if ($key2 == "fila") {
                        $fila = $value2;
                    }
                    if ($key2 == "columna") {
                        $columna = $value2;
                    }
                    if ($key2 == "precio") {
                        $precio = $value2;
                    }
                }
                $arrayNuevaEntrada = array(
                    "idObra" => $_GET["btnComprar"],
                    "fila" => $fila,
                    "columna" => $columna,
                    "precio" => $precio,
                    "email" => $_SESSION["correo"]
                );

                $_SESSION["entrada"]->set($arrayNuevaEntrada);
            }
            echo "<p>compra confirmada</p>";
            echo "<a href=\"index.php?page=amigo\">Regresar a página principal de amigo</a>";
        }
    }
} else {
    echo "Tu cuenta ha sido bloqueada.";
}
