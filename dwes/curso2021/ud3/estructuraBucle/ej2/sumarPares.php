<?php
$num = 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Sumar pares</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Sumar los 3 primeros números pares.</h2>
    <?php
    for($i = 0; $i <3; $num++){
        if($num % 2 == 0){
            echo "<p>" . $num . "</p>";
            $i++;
        }
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>