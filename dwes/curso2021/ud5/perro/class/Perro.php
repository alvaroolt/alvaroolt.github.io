<?php

/**
 * Clase Perro
 * @author Álvaro Leiva Toledano
 */

class Perro
{
    public $nombre;
    public $raza;
    public $edad;
    public $nombreDueno;
    public $tefDueno;
    public $estAnimo;

    public function __construct($arrayDatos)
    {
        $this->nombre = $arrayDatos['nombre'];
        $this->raza = $arrayDatos['raza'];
        $this->edad = $arrayDatos['edad'];
        $this->nombreDueno = $arrayDatos['nombreDueno'];
        $this->tefDueno = $arrayDatos['tefDueno'];
        $this->estAnimo = $arrayDatos['estAnimo'];
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getNombreDueno()
    {
        return $this->nombreDueno;
    }

    public function getTefDueno()
    {
        return $this->tefDueno;
    }

    public function getEstAnimo()
    {
        return $this->estAnimo;
    }




    // metodos de los perros

    public function jugar() {
        if ($this->edad > 10) {
            $this->estAnimo = 'cabreado';
        } else {
            $this->estAnimo = 'feliz';
        }
    }

    public function comer() {
        $this->estAnimo = 'feliz';
    }

    public function ducha() {
        $this->estAnimo = 'triste';
    }
}
