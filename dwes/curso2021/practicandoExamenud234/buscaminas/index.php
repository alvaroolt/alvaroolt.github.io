<?php
/**
 * Buscaminas
 * @author
 * 17/11/2020
 */
session_start();
include "funciones.php";

$FILAS = 8;
$COLUMNAS = 10;
$BOMBAS = 10;

if (!isset($_SESSION["juego"])) {
	$_SESSION["tablero"] = array();
	$_SESSION["finPartida"] = false;
	$_SESSION["tableroVisible"] = array();
	$_SESSION["tablero"] = crearTablero($_SESSION["tablero"], $FILAS, $COLUMNAS);
	$_SESSION["tablero"] = ponerBombas($_SESSION["tablero"], $BOMBAS, $FILAS, $COLUMNAS);
}
echo "<a href=\"cerrarSesion.php\">Cerrar Sesión</a>";
$_SESSION["juego"] = true;


if (isset($_GET['fila'])) {
	$filEntrada = $_GET['fila'];
	$colEntrada = $_GET['columna'];
	$_SESSION["tablero"] = clickCasilla($_SESSION["tablero"], $filEntrada, $colEntrada, $FILAS, $COLUMNAS, $BOMBAS);
}
imprimirTableroJuego($_SESSION["tablero"], $FILAS, $COLUMNAS);
?>