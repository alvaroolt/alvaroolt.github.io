<?php
class Empleado {

    private $nombre;
    private $sueldo;

    function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    function get_nombre() {
        return $this->nombre;
    }

    function set_sueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    function get_sueldo() {
        return $this->sueldo;
    }
}

function inicializarEmpleado($empleado) {
    echo "<p>Empleado " . $empleado->get_nombre . ". Sueldo " . $empleado->get_sueldo . "€</p>";
}