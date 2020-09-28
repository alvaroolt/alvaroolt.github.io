<?php
class Barco
{
    private $_id;
    private $_tipo; //1, 2, 3, 4
    private $_modulo = array(); //$fila, $columna, $estado
    private $_color;
    private $_mensaje;

    public function __construct($id, $tipo)
    {
        $this->_id = $id;
        $this->_tipo = $tipo;
        for ($i = 0; $i < $tipo; $i++) {
            $this->_modulo[] = array("fila" => -1, "columna" => -1, "estado" => 0); //estado 0 no tocado
        }
        $this->_mensaje = "Barco $tipo creado con id $id";
    }

    public function getMensaje()
    {
        return $this->_mensaje;
    }

    public function navega($fila, $columna, $direccion, $flota)
    {
        //Valores direccion; N, S, E, O
        switch ($direccion) {
            case "N":
                $columnaFinal = $columna;
                $filaFinal = $fila - $this->_tipo - 1;
                $saltoFila = -1;
                $saltoColumna = 0;
                $lerror = ($filaFinal < 0) ? true : false;
                break;
            case "S":
                $columnaFinal = $columna;
                $filaFinal = $fila + $this->_tipo - 1;
                $saltoFila = 1;
                $saltoColumna = 0;
                $lerror = ($filaFinal > 9) ? true : false;
            case "E":
                $filaFinal = $fila;
                $columnaFinal = $columna + $this->_tipo - 1;
                $saltoFila = 0;
                $saltoColumna = 1;
                $lerror = ($columnaFinal > 9) ? true : false;
            case  "O";
                $filaFinal = $fila;
                $columnaFinal = $columna - $this->_tipo - 1;
                $saltoFila = 0;
                $saltoColumna = -1;
                $lerror = ($columnaFinal < 0) ? true : false;
            default:
                break;
        }
        if (!$lerror && !objetoEnRadar(min($fila, $filaFinal), min($columna, $columnaFinal), max($filaFinal, $fila), max($columnaFinal, $columna))) {
            for ($i = 0; $i < $this->_tipo; $i++) {
                $this->_modulo[$i][$fila] = $fila;
                $this->_modulo[$i][$columna] = $columna;
                $flota->ocupaEspacio($fila, $columna, $this->_tipo);
                $fila = $fila + $saltoFila;
                $columna = $columna + $saltoColumna;
            }
            $this->_mensaje = "En posición $fila : $columna";
            return true;
        } else {
            $this->_mensaje = "Barco no colocado";
            return false;
        }
    }

    private function objetoRadar($filaInicio, $columnaInicio, $filaFinal, $columnaFinal, $flota)
    {
        $filInicio = max();
        
    }
}
