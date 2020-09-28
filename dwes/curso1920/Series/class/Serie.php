<?php

class Serie
{

    private $_nombre;
    private $_plataforma;

    public function __construct($nombre, $plataforma)
    {
        $this->_nombre = $nombre;
        $this->_plataforma = $plataforma;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getPlataforma()
    {
        return $this->_plataforma;
    }
}
