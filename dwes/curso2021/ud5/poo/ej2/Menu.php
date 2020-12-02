<?php
class Empleado
{
    private $_nombre;
    private $_sueldo;

    public function __construct($nombre, $sueldo)
    {
        $this->_nombre = $nombre;
        $this->_sueldo = $sueldo;
    }

    private function set_nombre($nombre)
    {
        $this->_nombre = $nombre;
    }
    public function get_nombre()
    {
        return $this->_nombre;
    }
}