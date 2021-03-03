<?php

if ($_SESSION["perfil"] == "invitado" || $_SESSION["perfil"] == "admin") {
    header("Location: index.php");
}

if (isset($_POST["btnPagar"])) {
    if ($_SESSION["plan"] == 2) {
        $importe = 15;
    } else {
        $importe = 7;
    }
    for ($i = 0; $i < strlen($_POST["meses"]) - 1; $i++) {
        $arrayPago = array(
            "idUser" => $_SESSION["id_usuario"],
            "mes" => $_POST["meses"][$i],
            "anyo" => "2020",
            "importe" => $importe,
            "pagado" => 1
        );
        $_SESSION["pago"]->set($arrayPago);
        $entrada = fopen("facturas/factura.txt", "r");
        $salida = fopen("facturas/factura" . $_SESSION["user"] . ".txt", "w");
        do {
            $filaEntrada = fgets($entrada);

            $filaInicial = str_replace("{{nombre}}", $_SESSION["user"], $filaEntrada);
            $filaIntermedia = str_replace("{{importe}}", $importe, $filaInicial);
            $fecha = "Mes: " . $_POST["meses"][$i] . ", año 2020";
            $filaSalida = str_replace("{{fecha}}", $fecha, $filaIntermedia);

            fwrite($salida, $filaSalida);
        } while (!feof($entrada));
        fclose($entrada);
        fclose($salida);
    }
    echo "MENSUALIDADES PAGADAS<br>";
    echo "<a href=\"./facturas/factura" . $_SESSION["user"] . ".txt\" download=\"factura" . $_SESSION["user"] . ".txt\">Descargar factura</a>";
}
$arrayMeses = array(1, 2, 3, 4, 5, 6);
$arrayMesesPagados = array();
foreach ($_SESSION["pago"]->getPagos($_SESSION["id_usuario"]) as $key => $value) {
    array_push($arrayMesesPagados,  $value["mes"]);
}
$moroso = false;
if (array_diff($arrayMeses, $arrayMesesPagados)) {
    $moroso = true;
    $mesesPendientes = array_diff($arrayMeses, $arrayMesesPagados);
    $meses = "";
    foreach ($mesesPendientes as $key => $value) {
        $meses = $meses . $value;
    }
    echo "<br>Tienes " . count($mesesPendientes) . " mensualidades pendientes. Para poder seguir disfrutando de series debes pagar los meses pendientes";
    echo "<form action=\"index.php?page=registrado\" method=\"post\">";
    echo "<input type=\"hidden\" name=\"meses\" value=\"" . $meses . " \" />";
    echo "<input type=\"submit\" name=\"btnPagar\" value=\"Pagar\" />";
    echo "</form>";
}
//
if (isset($_GET["btnPlay"])) {
    if ($_SESSION["plan"][0]["id"] == 1) {
        if ($_SESSION["plan"][0]["id"] == $_SESSION["serie"]->getPlan($_GET["id"])[0]["id_plan"]) {
            $numRepro = $_SESSION["serie"]->getNumRepro($_GET["id"]);

            $arrayData = array(
                "id" => $_GET["id"],
                "numero_reproducciones" => $numRepro[0]["numero_reproducciones"] + 1
            );
            $_SESSION["serie"]->aumentarReproducciones($arrayData);
            echo "Reproduciendo " . $_SESSION["serie"]->getSerieById($_GET["id"])[0]["titulo"] . "<br>";
        }
    } else {
        $numRepro = $_SESSION["serie"]->getNumRepro($_GET["id"]);

        $arrayData = array(
            "id" => $_GET["id"],
            "numero_reproducciones" => $numRepro[0]["numero_reproducciones"] + 1
        );
        $_SESSION["serie"]->aumentarReproducciones($arrayData);
        echo "Reproduciendo " . $_SESSION["serie"]->getSerieById($_GET["id"])[0]["titulo"] . "<br>";
    }
}

if (isset($_GET["btnPremium"])) {
    if ($_SESSION["plan"][0]["id"] !== 2) {
        $_SESSION["usuario"]->hacersePremium($_SESSION["id_usuario"]);
    }
}
if (!$moroso) {
    $listaSeries = $_SESSION["serie"]->get();
    echo "<b>Series</b>";
    echo "<table>";
    echo "<tr><th>Título</th><th>Carátula</th><th>Reproducir Serie</th></th><th>Número Reproducciones</th></tr>";
    foreach ($listaSeries as $value) {
        echo "<tr>";
        echo "<td>" . $value["titulo"] . "</td>";
        echo "<td><img src=\"./img/" . $value["caratula"] . "\" alt=\"Imagen de la serie\" width=\"250\" height=\"250\"></img></td>";
        if ($_SESSION["plan"][0]["id"] == 2) {
            echo "<td><a href=\"index.php?page=registrado&btnPlay&id=" . $value["id"] . "\" ><button>Reproducir</button></a></td>";
        } else {
            if ($value["id_plan"] == $_SESSION["plan"][0]["id"]) {
                echo "<td><a href=\"index.php?page=registrado&btnPlay&id=" . $value["id"] . "\" ><button>Reproducir</button></a></td>";
            } else {
                echo "<td><a href=\"index.php?page=registrado&btnPremium\"><button>Pasarse a Premium</button></a></td>";
            }
        }
        echo "<td>" . $value["numero_reproducciones"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
