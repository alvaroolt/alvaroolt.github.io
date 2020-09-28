<?php
class Dni
{
    private $_dni;
    private $_mensaje = "";

    public function __construct($dni)
    {
        $this->_dni = $this->validarDni($dni);
    }

    private function validarDni($dni)
    {
        $numero = substr($dni, 0, 8); //recoge la cadena de dni del indice 0 al 8 y lo guarda en numero
        $letra = $dni[8];

        // si la longitud de numero es 8 y la de letra es 1, entra en el if
        if (strlen($numero) == 8 && strlen($letra) == 1) {
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numero % 23, 1) == $letra) {
                $this->_mensaje = "DNI correcto";
            } else {
                $this->_mensaje = "DNI incorrecto";
            }
        }
    }

    public function getMensaje()
    {
        return $this->_mensaje;
    }
}
?>