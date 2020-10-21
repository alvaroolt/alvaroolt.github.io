<?php
$paises = array(
    "España" => array("Madrid", "<img src='pictures/spain.jpg'>"),
    "Francia" => array("París", "<img src='pictures/french.jpg'>"),
    "Italia" => array("Roma", "<img src='pictures/italy.jpg'>"),
    "México" => array("Ciudad de México", "<img src='pictures/mexico.jpg'>"),
    "Brasil" => array("Río de Janeiro", "<img src='pictures/brasil.jpg'>"),
    "Canadá" => array("Ottawa", "<img src='pictures/canada.jpg'>"),
    "Japón" => array("Tokio", "<img src='pictures/japon.jpg'>"),
    "China" => array("Pekin", "<img src='pictures/china.jpg'>"),
    "Corea del Sur" => array("Seúl", "<img src='pictures/corea.jpg'>")
);
$tabla = "<table><tr>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3 - Países y formulario</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 1px solid black;
            margin: 15px;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }

        tr {
            text-align: center;
        }

        th,
        td {
            padding: 0 10px;
            border: 1px solid lightgray;
        }

        img {
            width: 20px;
        }
    </style>
</head>

<body>
    <h2>Países con formulario.</h2>
    <form action="paises.php" method="post">
        <label for="paises">País: </label>
        <select name="paises" id="meses">
            <option value="0"></option>
            <option value="España">España</option>
            <option value="Francia">Francia</option>
            <option value="Italia">Italia</option>
            <option value="Mexico">Mexico</option>
            <option value="Brasil">Brasil</option>
            <option value="Canadá">Canadá</option>
            <option value="Japón">Japón</option>
            <option value="China">China</option>
            <option value="Corea del Sur">Corea del Sur</option>
        </select>
        <input type="submit" name="enviar" value="Aceptar">
    </form>
    <?php
    
    if (isset($_POST["paises"]) && ($_POST["paises"] != "0")) {

        $paisEscogido = $_POST["paises"];

        foreach($paises as $pais => $datosPais){
            if($pais == $paisEscogido) {
                $tabla .= "<th colspan='2'>$pais</th></tr><tr>";
                foreach($datosPais as $dato){
                    $tabla .= "<td>$dato</td>";
                }
                $tabla .= "</tr>";
            }
        }
        $tabla .= "</table>";
        echo $tabla;
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>