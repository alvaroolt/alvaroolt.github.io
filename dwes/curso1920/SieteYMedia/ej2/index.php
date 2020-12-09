<?php

/**
 * Examen DWES diciembre 2019. Ejercicio 2: Siete y media.
 * 
 * @author Fco Javier González Sabariego
 */



session_start();    //Iniciamos sesión

//Incluimos ficheros
include "config/config.php";
include "include/funciones.php";
include "include/constantes.php";

$carta = 0;

//Destruimos la sesión:
if (isset($_POST['nuevapartida']) || isset($_POST['rendirse'])) {
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id();
    header('Location:index.php');
}

//Si la sesión de la partida no existe la creamos:
if (!isset($_SESSION['partida'])) {
    $_SESSION['partida'] = true;            //La partida está activa
    $_SESSION['puntosJugador'] = 0;         //Puntos acumulados jugador
    $_SESSION['puntosIA'] = 0;              //Puntos acumulados IA
    $_SESSION['ganaJugador'] = false;       //Jugador ha ganado
    $_SESSION['ganaIA'] = false;            //IA ha ganado
    $_SESSION['cartasJugador'] = array();   //Lista de cartas del jugador
    $_SESSION['cartasIA'] = array();        //Lista de cartas de la IA
    $_SESSION['jugadorSePlanta'] = false;   //El jugador humano se planta
    $_SESSION['IASePlanta'] = false;        //La IA se planta
    $_SESSION['cartas'] = $cartas;          //Cartas de la sesión
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Fco Javier González Sabariego">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $TITLE; ?></title>
</head>

<body>
    <header>
        <?php include "include/header.php"; ?>
    </header>
    <nav class="menu">
        <?php

        ?>
    </nav>
    <main>
        <?php

        if ($_SESSION['partida']) { //Si la partida está activa empieza el jugador humano:
            if (isset($_POST['plantarse']))    //El jugador opta por plantarse
                $_SESSION['jugadorSePlanta'] = true;

            if (!$_SESSION['jugadorSePlanta']) {    //Si jugador humano no se ha plantado juega:
                echo "<h3>Turno del jugador humano: </h3>";
                if (isset($_POST['carta'])) {   //Elige carta
                    $carta = sacaCarta();
                    array_push($_SESSION['cartasJugador'], $carta);
                    $_SESSION['puntosJugador'] += $_SESSION['cartas'][$carta]['puntos'];
                    echo "Cartas del jugador:<br/>";
                    muestraCartas($_SESSION['cartasJugador']);
                    echo "<br/>Total puntos jugador: " . $_SESSION['puntosJugador'] . "<br/>";

                    determinaGanador();
                }
            } else {
                echo "Cartas del jugador:<br/>";
                muestraCartas($_SESSION['cartasJugador']);
                echo "<br/>Total puntos del jugador: " . $_SESSION['puntosJugador'] . "<br/>";

                echo "<br/>Cartas de la banca:<br/>";
                juegaIA();   //Esta es la función que determina el juego de la IA
                muestraCartas($_SESSION['cartasIA']);
                echo "<br/>Total puntos de la banca: " . $_SESSION['puntosIA'] . "<br/>";

                determinaGanador();

                if ($_SESSION['ganaJugador'])
                    echo "<h3>Jugador gana la partida.</h3>";
                elseif ($_SESSION['ganaIA'])
                    echo "<h3>La banca gana la partida. La banca siempre gana.</h3>";
            }
        }

        echo "<form action=" . $_SERVER['PHP_SELF'] . " method=\"post\">";
        if ($_SESSION['partida']) {
            echo "<input type=\"submit\" value=\"Nueva carta\" name=\"carta\">";
            echo "<input type=\"submit\" value=\"Plantarse\" name=\"plantarse\">";
            echo "<input type=\"submit\" value=\"Rendirse\" name=\"rendirse\">";
        } else
            echo "<input type=\"submit\" value=\"Nueva partida\" name=\"nuevapartida\">";
        echo "</form>";
        ?>
    </main>
    <aside></aside>
    <footer>
        <?php include "include/footer.php"; ?>
    </footer>
</body>

</html>