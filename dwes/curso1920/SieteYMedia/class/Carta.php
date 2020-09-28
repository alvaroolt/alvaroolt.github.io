<?php

class Carta
{

    private $_palo;
    private $_figura;
    private $_valor;
    private $_imagenCarta;

    public function __construct($palo, $figura)
    {
        $this->_palo = $palo;
        $this->_figura = $figura;
        $this->_valor = $this->getValor();
        $this->_imagenCarta = "img/" . $this->cambiarPaloANombre($this->_palo) . "/$this->_figura.jpg";
    }

    public function getPalo()
    {
        return $this->_palo;
    }

    public function getFigura()
    {
        return $this->_figura;
    }

    public function getValor()
    {
        $valor = 0;
        if ($this->getFigura() < 8) {
            $valor = $this->getFigura();
        } else {
            $valor = 0.5;
        }
        return $valor;
    }

    public function getImagenCarta()
    {
        return $this->_imagenCarta;
    }

    public function cambiarPaloANombre($palo)
    {
        if ($palo == 1) {
            return "basto";
        }
        if ($palo == 2) {
            return "copa";
        }
        if ($palo == 3) {
            return "espada";
        } else {
            return "oro";
        }
    }
}
?>