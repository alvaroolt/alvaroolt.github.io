<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Días del mes.</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Días del mes.</h2>
    <form action="diaDelMes.php" method="post">
        Mes (en números): <input type="number" name="mes"></br>
        Año: <input type="number" name="ano">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST["mes"]) && ($_POST["mes"] != "") && ($_POST["mes"] > 0 && $_POST["mes"] < 13) && isset($_POST["ano"]) && ($_POST["ano"] != "") && ($_POST["ano"] > -1)) {

        $mes = $_POST["mes"];
        $ano = $_POST["ano"];

        echo "</br>Fecha: " . $mes . "/" . $ano;

        switch ($mes) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $dias = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $dias = 30;
                break;
            case 2:
                if (($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0) {
                    $dias = 29;
                } else {
                    $dias = 28;
                }
                break;
        }

        echo "</br></br>" . $dias . " días.";
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>