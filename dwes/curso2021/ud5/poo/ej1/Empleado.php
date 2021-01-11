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

    // private function set_nombre($nombre)
    // {
    //     $this->_nombre = $nombre;
    // }
    public function get_nombre()
    {
        return $this->_nombre;
    }

    // private function set_sueldo($sueldo)
    // {
    //     $this->_sueldo = $sueldo;
    // }
    public function get_sueldo()
    {
        return $this->_sueldo;
    }

    public function inicializarEmpleado()
    {
        echo "<p>Empleado " . $this->_nombre . ". Sueldo " . $this->_sueldo . "€</p>";
    }

    public function compruebaImpuesto()
    {
        if ($this->_sueldo > 3000) {
            echo "<p>El empleado " . $this->_nombre . " debe pagar impuestos debido a que su sueldo supera los 3000€.</p>";
        } else {
            echo "<p>El empleado " . $this->_nombre . " no debe pagar impuestos.</p>";
        }
    }
}