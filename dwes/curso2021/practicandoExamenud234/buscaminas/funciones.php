<?php
/**
 * Funciones para buscaminas
 * @author
 * 19/11/2020
 */

/**
 * Función que crea tablero de la dimensión dada
 * @param tablero , tablero es un array donde se almacena el tablero
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero creado con filas y columnas
 */
function crearTablero($tablero, $filas, $columnas){
    $tablero = array();
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], array("valor" => "0", "visible" => 0));
        }
    }
    return $tablero;
}

/**
 * Función que crea tableros de la dimensión dada
 * @param tablero , tablero es un array donde se almacena el tablero
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero creado con filas y columnas
 */
function crearTableroVisible($tablero, $filas, $columnas){
    $tablero = array();
    for($i=0; $i<$filas; $i++){
        array_push($tablero, array());
        for($j=0; $j<$columnas; $j++){
            array_push($tablero[$i], "<input type=\"submit\" value=\" \">");
        }
    }
    return $tablero;
}

/**
 * Función para poner bombas en el tablero y modificar las casillas adyacentes
 * @param tablero , tablero donde se almacena las bombas y las casillas modificadas
 * @param bombas , número de bombas que se van a colocar
 * @param filas , número de filas del tablero
 * @param columnas ,número de columnas del tablero
 * @return tablero , tablero con las modificaciones
 */
function ponerBombas($tablero, $bombas, $filas, $columnas){
    $bombasColocadas = 0;
    do{
        $fRandom = rand(0, $filas - 1);
        $cRandom = rand(0, $columnas - 1);
        if($tablero[$fRandom][$cRandom]["valor"] == "0"){
            $tablero[$fRandom][$cRandom]["valor"] = "*";
            $bombasColocadas++;
        }
    }while($bombasColocadas < $bombas);

    for($i=0; $i<$filas; $i++){
        for($j=0; $j<$columnas; $j++){
            // echo $tablero[$i][$j]["valor"];
            if($tablero[$i][$j]["valor"] != "*"){
                for($k=$i-1; $k<=($i+1); $k++){
                    for($l=$j-1; $l<=($j+1); $l++){
                        if($k >= 0 && $l >= 0 && $k < $filas && $l < $columnas){
                            if($tablero[$k][$l]["valor"] == "*"){
                                $tablero[$i][$j]["valor"]++;
                            }
                        }
                    }
                }
            }
        }
    }
    return $tablero;
}

/**
 * Función para imprimir el tablero
 * @param tablero , tablero es un array
 */
function imprimirTablero($tablero){
    echo "<table border=\"1px solid black\">";
    foreach($tablero as $fila => $columna){
        echo "<tr>";
        foreach($columna as $key => $value){
            echo "<td>$value[valor]</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Función para imprimir el tablero visible
 * 
 */
function imprimirTableroJuego($tablero, $filas, $columnas){
    echo "<table border=\"1px solid black\">";
    for($i=0; $i < $filas; $i++) {
        echo "<tr>";
        for($j = 0; $j < $columnas; $j++) {
            echo "<td>";
            if ($tablero[$i][$j]["visible"] == 1) {
                echo $tablero[$i][$j]["valor"];
            }else {
                echo "<a href=\"index.php?page=buscaminas&fila=$i&columna=$j\"><input type=\"submit\" value=\"\"/></a>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }	
    echo "</table>";
}

function checkVictoria($tablero, $filas, $columnas, $bombas){
    $hasGanado = false;
	foreach ($tablero as $array => $filas) {
        foreach ($filas as $columnas=>$casillas) {
            if($casillas["visible"] == 0 && $casillas["valor"] !== "*"){
                return ;
            }
	    }
	}
    $hasGanado = true;
    return $hasGanado;
}

function clickCasilla($tablero, $f, $c, $filas, $columnas, $bombas){
    if(!$_SESSION["finPartida"]){
        if ($tablero[$f][$c]["visible"] == 0) {
            $tablero[$f][$c]["visible"] = 1;
            // echo "cambiado: ".$tablero[$f][$c]["visible"];
            if ($tablero[$f][$c]["valor"] == "*"){
                $_SESSION["finPartida"] = true;
                echo "Has perdido";
            }else {
                if (checkVictoria($tablero, $filas, $columnas, $bombas)){
                    echo "Has ganado";
                    $_SESSION["finPartida"] = true;
                }else {
                    if ($tablero[$f][$c]["valor"]==0){
                        for($k=$f-1; $k<=($f+1); $k++){
                            for($l=$c-1; $l<=($c+1); $l++){  
                                if($k >= 0 && $l >= 0 && $k < $filas && $l < $columnas){
                                    // echo "aa";
                                    $tablero = clickCasilla($tablero, $k, $l, $filas, $columnas, $bombas);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $tablero;
}
?>