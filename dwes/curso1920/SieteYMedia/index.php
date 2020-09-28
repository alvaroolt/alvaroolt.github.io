<?php

include "class/Baraja.php";
include "class/Carta.php";

session_start();

if (!isset($_SESSION["juego"])) {
    $_SESSION["juego"] = [];
    $_SESSION["partidaAcabada"] = false;
}

$paloAleatorio = rand(1, 4);
$figuraAleatoria = rand(1, 10);
$puntuacionJugador = 0;
$puntuacionMaquina = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siete y Media</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <?php
        echo "<br><br>";
        echo "<h1>SIETE Y MEDIA</h1>";
        echo "<p><input type='submit' name='pedirCarta' value='Pedir Carta' /></p>";
        echo "<p><input type='submit' name='plantarse' value='Plantarse' /></p>";
        echo "<a href='cerrarSesion.php'>Finalizar Partida</a>";
        ?>
    </form>
</body>

</html>

<?php

if (isset($_POST["plantarse"])) {
    $_SESSION["partidaAcabada"] = true;

    echo "<br><br>";
    echo "Tus cartas:<br><br>";

    foreach ($_SESSION["juego"] as $array => $carta) {
        echo "<img src='" . $carta->getImagenCarta() . "'>";

        if ($carta->getfigura() < 8) {
            $puntuacionJugador += $carta->getFigura();
        } else {
            $puntuacionJugador += 0.5;
        }
    }


    if ($puntuacionJugador > 7.5) {
        echo "<br><br>Llevas $puntuacionJugador puntos. Has perdido";
    } else if ($puntuacionJugador < 7.5) {
        echo "<br><br>Llevas $puntuacionJugador puntos.Te has plantado";
    } else {
        echo "<br><br>Llevas $puntuacionJugador puntos. Has ganado";
    }
}


if (isset($_POST["pedirCarta"])) {


    if (!$_SESSION["partidaAcabada"]) {

        $carta = new Carta($paloAleatorio, $figuraAleatoria);
        array_push($_SESSION["juego"], $carta);

        echo "<br><br>";
        echo "Tus cartas:<br><br>";

        foreach ($_SESSION["juego"] as $array => $carta) {
            echo "<img src='" . $carta->getImagenCarta() . "'>";

            if ($carta->getfigura() < 8) {
                $puntuacionJugador += $carta->getFigura();
            } else {
                $puntuacionJugador += 0.5;
            }
        }

        if ($puntuacionJugador > 7.5) {
            echo "<br><br>Llevas $puntuacionJugador puntos. Has perdido";
            $_SESSION["partidaAcabada"] = true;
        } else {
            echo "<br><br>Llevas $puntuacionJugador puntos.";
        }
?>
<?php
    } else {

        echo "<br><br>";
        echo "Tus cartas:<br><br>";
        foreach ($_SESSION["juego"] as $array => $carta) {
            echo "<img src='" . $carta->getImagenCarta() . "'>";

            if ($carta->getfigura() < 8) {
                $puntuacionJugador += $carta->getFigura();
            } else {
                $puntuacionJugador += 0.5;
            }
        }

        if ($puntuacionJugador > 7.5) {
            echo "<br><br>Llevas $puntuacionJugador puntos. Has perdido";
        } else if ($puntuacionJugador < 7.5) {
            echo "<br><br>Llevas $puntuacionJugador puntos.Te has plantado";
        } else {
            echo "<br><br>Llevas $puntuacionJugador puntos. Has ganado";
        }
    }
}

?>