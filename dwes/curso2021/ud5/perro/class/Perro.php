<?php

/**
 * Clase Perro
 * @author Álvaro Leiva Toledano
 */

class Perro
{
    public $nombrePerro;
    public $raza;
    public $edad;
    public $nombreDueno;
    public $tefDueno;
    public $estAnimo;

    public function __construct($arrayDatos)
    {
        $this->nombrePerro = $arrayDatos['nombrePerro'];
        $this->raza = $arrayDatos['raza'];
        $this->edad = $arrayDatos['edad'];
        $this->nombreDueno = $arrayDatos['nombreDueno'];
        $this->tefDueno = $arrayDatos['tefDueno'];
        $this->estAnimo = $arrayDatos['estAnimo'];
    }

    public function getnombrePerro()
    {
        return $this->nombrePerro;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getnombreDueno()
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
        echo "</br>" . $this->nombrePerro . " está jugando.";
        if ($this->edad > 10) {
            echo "</br>" . $this->nombrePerro . " es muy mayor para jugar...";
            $this->estAnimo = 'cabreado';
        } else {
            $this->estAnimo = 'feliz';
        }
    }

    public function comer() {
        echo "</br>" . $this->nombrePerro . " está comiendo.";
        $this->estAnimo = 'feliz';
    }

    public function ducha() {
        echo "</br>Han duchado a " . $this->nombrePerro . ". Pobre... no le gusta mucho.";
        $this->estAnimo = 'triste';
    }
}
