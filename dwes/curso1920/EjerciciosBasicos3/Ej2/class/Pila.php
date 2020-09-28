<?php
class Pila
{
    private $_elementos = array();

    public function __construct($elementos)
    {
        $this->_elementos = $elementos;
    }

    public function devuelveInverso()
    {
        for ($i = (count($this->_elementos) - 1); $i > -1; $i--) {
            echo "<br>";
            echo $this->_elementos[$i];
        }
    }

    public function push($elemento)
    {
        array_push($this->_elementos, $elemento);
    }

    public function popOut()
    {
        array_pop($this->_elementos);
    }

    public function getElementos()
    {
        return $this->_elementos;
    }
}
