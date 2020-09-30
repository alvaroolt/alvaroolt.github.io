<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Paleta colores</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        tr:nth-child(odd) {
            background-color: lightgray;
        }

        div {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        span {
            display: flex;
            align-items: center;
            margin: 5px;
            width: 80px;
            height: 40px;
        }

        p:hover {
            color: white;
        }

        p{
            margin: auto;
        }
    </style>
</head>

<body>
    <h2>Paleta de colores.</h2>
    <div>
        <?php
        for ($i = 0; $i < 256; $i += 10) {
            for ($j = 0; $j < 256; $j += 10) {
                for ($k = 0; $k < 256; $k += 10) {

                    #strlen se usa para obtener la longitud de un string
                    $color = (strlen($i) < 2 ? '0' : '') . $i;
                    $color .= (strlen($j) < 2 ? '0' : '') . $j;
                    $color .= (strlen($k) < 2 ? '0' : '') . $k;

                    echo "<span style='background-color:rgb($i,$j,$k);'><p>#$color</p></span>";
                    if ($i == 200 & $j == 200 & $k == 200)
                        echo "<br/>";
                }
            }
        }
        ?>
    </div>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>