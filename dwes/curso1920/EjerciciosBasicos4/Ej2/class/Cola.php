<?php
class Cola
{
    private $_elementos = array();

    public function __construct($elementos)
    {
        $this->_elementos = $elementos;
    }

    public function devuelvePrimero()
    {
        for ($i = 0; $i < count($this->_elementos); $i++) {
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
