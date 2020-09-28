<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Calcular la edad.</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Calcular la edad.</h2>
    <form action="calcularEdad.php" method="post">
        Día: <input type="number" name="dia"></br>
        Mes: <input type="number" name="mes"></br>
        Año: <input type="number" name="ano">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST["dia"]) && ($_POST["dia"] != "") && ($_POST["dia"] > 0) && isset($_POST["mes"]) && ($_POST["mes"] != "") && ($_POST["mes"] > 0 && $_POST["mes"] < 13) && isset($_POST["ano"]) && ($_POST["ano"] != "") && ($_POST["ano"] > -1)) {

        $dia = $_POST["dia"];
        $mes = $_POST["mes"];
        $ano = $_POST["ano"];

        switch ($mes) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $diaMes = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $diaMes = 30;
                break;
            case 2:
                if (($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0) {
                    $diaMes = 29;
                } else {
                    $diaMes = 28;
                }
                break;
        }
        if ($dia > $diaMes) {
            echo "<p class='error'>En ese mes no hay " . $dia . " días.</p>";
        } else {
            echo "</br>Fecha de nacimiento: " . $dia . "/" . $mes . "/" . $ano;
        }

        $diaHoy = date("j");
        $mesHoy = date("n");
        $anoHoy = date("Y");
        #En esta pagina encontre info muy util sobre date() y más maneras de usarlo: https://www.anerbarrena.com/php-date-1018/

        echo "</br>Fecha de hoy: " . $diaHoy . "/" . $mesHoy . "/" . $anoHoy;

        $edad = $anoHoy - $ano;
        if ($mesHoy < $mes || ($mesHoy == $mes && $diaHoy < $dia)) {
            $edad--;
        }

        echo "</br>Tienes " . $edad . " años.";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>