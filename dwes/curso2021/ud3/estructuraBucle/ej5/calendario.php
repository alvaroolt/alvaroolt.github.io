<?php
$calendario = "<table><tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>";
$semana = array(1, 2, 3, 4, 5, 6, 7);
/*
1==lunes
2==martes
3==miercoles
4==jueves
5==viernes
6==sabado
7==domingo
*/
$festivos = array("1-1", "6-1", "10-4", "1-5", "15-8", "12-10", "8-12", "25-12");
$mesEmpiezaEnDomingo = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej5 - Calendario</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 2px solid black;
            margin-top: 2%;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }

        th,
        td {
            padding: 10px;
        }

        .hoy {
            background-color: lightgreen;
        }

        .festivo {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <h2>Calendario.</h2>
    <form action="calendario.php" method="post">
        <label for="meses">Mes: </label>
        <select name="meses" id="meses">
            <option value="0"></option>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <label for="meses"> Año: </label>
        <select name="anos" id="anos">
            <option value="0"></option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
        </select>
        <input type="submit" name="enviar" value="Aceptar">
    </form>
    <div>
        <?php
        if (isset($_POST["meses"]) && ($_POST["meses"] != "0") && isset($_POST["anos"]) && ($_POST["anos"] != "0")) {
            $mesEscogido = $_POST["meses"]; #recogemos el mes del usuario
            $anoEscogido = $_POST["anos"]; #recogemos el año del usuario

            #switch para determinar cuantos dias del mes tiene el escogido por el usuario
            switch ($mesEscogido) {
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
                    if (($anoEscogido % 4 == 0 && $anoEscogido % 100 != 0) || $anoEscogido % 400 == 0) {
                        $dias = 29;
                        // echo "bisiesto";
                    } else {
                        $dias = 28;
                    }
                    break;
            }

            $primerDiaSemanaMes = $semana[date("w", mktime(0, 0, 0, $mesEscogido, 1, $anoEscogido))] - 1;
            $x = 8 - $primerDiaSemanaMes; # x dias hasta el comienzo de la proxima semana

            echo "</br>$mesEscogido - $anoEscogido";

            if ($primerDiaSemanaMes == 0)
                $mesEmpiezaEnDomingo = true;

            for ($i = 1; $i < $primerDiaSemanaMes; $i++) {
                $calendario .= "<td></td>";
            }
            for ($j = 1; $j <= $dias; $j++) {
                if ($mesEmpiezaEnDomingo == true) { #necesito este if porque sin él, cuando el mes empezaba en domingo se bugeaba la tabla y se descuadraba
                    $calendario .= "<td></td><td></td><td></td><td></td><td></td><td></td><td class='festivo'>$j</td></tr><tr>";
                    $mesEmpiezaEnDomingo = false;
                    $x--;
                } elseif (date("j-n-Y") == date("$j-$mesEscogido-$anoEscogido")) {
                    $calendario .= "<td class='hoy'>" . $j . "</td>";
                    $x--;
                } elseif (array_search(date("$j-$mesEscogido"), $festivos) || $x <= 1) {
                    $calendario .= "<td class='festivo'>" . $j . "</td>";
                    $x--;
                } else {
                    $calendario .= "<td>" . $j . "</td>";
                    $x--;
                }
                if ($x == 0) {
                    $x += 7;
                    $calendario .= "</tr><tr>";
                }
            }
            $calendario .= "</tr></table>";
            echo $calendario;
        }
        ?>
    </div>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>