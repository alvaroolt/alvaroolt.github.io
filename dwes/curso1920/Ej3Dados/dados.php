<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3</title>
    <style>
    img{
        width: 50px;
    }
    </style>
</head>

<body>
    <h2>Tirada de dados</h2>
    <?php
    $dado1 = rand(1, 6);
    $dado2 = rand(1, 6);
    $dado3 = rand(1, 6);
    $sumaDados = $dado1 + $dado2 + $dado3;

    // echo $dado1 . " " . $dado2 . " " . $dado3 . " ";
    echo mostrarDado($dado1);
    echo mostrarDado($dado2);
    echo mostrarDado($dado3);

    echo "<br/>La suma de los dados es " . $sumaDados;

    function mostrarDado($dado)
    {
        switch ($dado) {
            case 1:
                echo "<img src='icons/dado1.svg'>";
                break;
            case 2:
                echo "<img src='icons/dado2.svg'>";
                break;
            case 3:
                echo "<img src='icons/dado3.svg'>";
                break;
            case 4:
                echo "<img src='icons/dado4.svg'>";
                break;
            case 5:
                echo "<img src='icons/dado5.svg'>";
                break;
            default:
                echo "<img src='icons/dado6.svg'>";
                break;
        }
    }

    echo "<br/><a href='../verCodigo.php?src=" . __FILE__ . "'><button>Ver Codigo</button></a>";
    ?>
</body>

</html>