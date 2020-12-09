<?php
    /**
     * 
     */

    function limpiarDatos($dato) {
        $dato = trim($dato);
        $dato=stripcslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

    /**
     * Se saca una carta de la baraja:
     */
    function sacaCarta() {
        do {
            $tirada = rand(0,39);
        } while (!$_SESSION['cartas'][$tirada]['disponible']);
        $_SESSION['cartas'][$tirada]['disponible'] = false;
        return $tirada;
    }

    /**
     * Se muestran las cartas de la mano del jugador/IA pasados por parámetro:
     */
    function muestraCartas($arrayCartas) {
        for ($i=0; $i<sizeof($arrayCartas); $i++) 
            echo "<img src="."images/".$_SESSION['cartas'][$arrayCartas[$i]]['palo']."/".$_SESSION['cartas'][$arrayCartas[$i]]['numero'].".jpg"." alt=\"Carta\">";
    }

    /**
     * Acabado la maniobra del jugador o la IA se determina quién gana
     */
    function determinaGanador() {
        if ($_SESSION['puntosJugador']>7.5) {
            $_SESSION['ganaIA'] = true;
            $_SESSION['partida'] = false;
        } elseif ($_SESSION['puntosIA']>7.5){
            $_SESSION['ganaJugador'] = true;
            $_SESSION['partida'] = false;
        } elseif ($_SESSION['puntosJugador']==$_SESSION['puntosIA']) { //La banca siempre gana
            $_SESSION['ganaIA'] = true;
            $_SESSION['partida'] = false;
        } elseif ($_SESSION['puntosIA']>$_SESSION['puntosJugador']) {
            $_SESSION['ganaIA'] = true;
            $_SESSION['partida'] = false;
        }
    }

    /**
     * Funcionamiento de la IA:
     */
    function juegaIA() {
        while (!determinarSePlantaIA()) {
            $carta = 0;
            $carta = sacaCarta($_SESSION['cartas']);
            array_push($_SESSION['cartasIA'], $carta);
            $_SESSION['puntosIA'] += $_SESSION['cartas'][$carta]['puntos'];
        }
    }

    /**
     * Determina si la IA se planta:
     */
    function determinarSePlantaIA() {
        if ($_SESSION['puntosIA']==7.5) return true;
        elseif ($_SESSION['puntosIA']>$_SESSION['puntosJugador']) return true;
        elseif ($_SESSION['puntosIA']>7.5) return true;
        else return false;
    }
?>