<?php

class Baraja
{

    private $_baraja = array();

    public function __construct()
    {

        for ($i = 1; $i < 5; $i++) {
            for ($j = 1; $j < 11; $j++) {
                $this->_baraja[$i][$j] = $j;
            }
        }
    }

    public function getBaraja()
    {
        return $this->baraja;
    }
}
?>