<?php

/**
 * Clase Instructor
 * @author Álvaro Leiva Toledano
 */
class Instructor
{
    public $nombre;
    public $nivFormacion;

    public function __construct($arrayDatos)
    {
        $this->nombre = $arrayDatos['nombre'];
        $this->nivFormacion = $arrayDatos['nivFormacion'];
    }

    public function getNombre() {
        $this->nombre;
    }

    public function getNivFormacion() {
        $this->nivFormacion;
    }

    public function setNivFormacion($nivFormacion) {
        $this->nivFormacion = $nivFormacion;
    }
}
