<?php
$tablaMultas = "";
$tablaMultasAno = "";
function formularioLogin()
{
    echo "<form action=\"index.php\" method=\"post\">
            Usuario: <input type=\"text\" name=\"user\"/><br><br>
            Contraseña: <input type=\"password\" name=\"pswd\"/><br><br>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
            </form>
            ";
}

function mostrarTablaMultas()
{

    include "arrayMultas.php";

    $tablaMultas = "<table><tr><th>Matrícula</th><th>Descripción</th><th>Fecha</th><th>Importe</th><th>Estado</th><th></th></tr>";

    foreach ($_SESSION["aMultas"] as $multa) {
        $tablaMultas .= "<tr>";
        foreach ($multa as $valorMulta) {
            if ($multa["importe"] == $valorMulta) {
                $tablaMultas .= "<td>" . $valorMulta . "€</td>";
            } else if ($multa["estado"] == $valorMulta && $multa["estado"] == "pendiente") {
                $tablaMultas .= "<td>$valorMulta</td><td><a href='index.php?multa=" . $multa["matricula"] . "'>Pagar</a></td>";
            } else {
                $tablaMultas .= "<td>$valorMulta</td>";
            }
        }
        $tablaMultas .= "</tr>";
    }
    $tablaMultas .= "</table>";
    echo $tablaMultas;
}

function mostrarInfoAdmin()
{
    $aMultasAno = array(
        "enero" => 600,
        "febrero" => 700,
        "marzo" => 300,
        "abril" => 400,
        "mayo" => 250,
        "junio" => 100,
        "julio" => 550,
        "agosto" => 600,
        "septiembre" => 1100,
        "octubre" => 900,
        "noviembre" => 600,
        "diciembre" => 850
    );

    $tablaMultasAno = "<table><tr><th>Año 2020</th><th>Nº multas</th></tr>";

    foreach ($aMultasAno as $mesMulta => $multas) {
        $tablaMultasAno .= "<tr><td>$mesMulta</td><td>$multas</td></tr>";
    }
    $tablaMultasAno .= "</table>";
    echo $tablaMultasAno;
}

function formularioAnadirMulta() {

    echo "<form action=\"index.php\" method=\"post\">
            <p>Añadir nueva multa:</p>
            Matrícula: <input type=\"text\" name=\"matricula\"/><br><br>
            Descripción: <input type=\"text\" name=\"descripcion\"/><br><br>
            Fecha: <input type=\"text\" name=\"fecha\"/><br><br>
            Importe: <input type=\"text\" name=\"importe\"/><br><br>
            Estado: <input type=\"text\" name=\"estado\"/><br><br>
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\">
            </form>
            ";
}

function anadirMulta()
{

    include "arrayMultas.php";

    $matricula = $_POST["matricula"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $importe = $_POST["importe"];
    $estado = $_POST["estado"];

    $nuevaMulta = array(
        "matricula" => $matricula,
        "descripcion" => $descripcion,
        "fecha" => $fecha,
        "importe" => $importe,
        "estado" => $estado
    );

    array_push($_SESSION["aMultas"], $nuevaMulta);
    header("Location:index.php");

}

function pagarMulta($multaAPagar) {
    foreach ($_SESSION["aMultas"] as $multa) {
        if ($multa["matricula"] == $multaAPagar) {
            $multa["estado"] = "pagada";
        }
    }
}