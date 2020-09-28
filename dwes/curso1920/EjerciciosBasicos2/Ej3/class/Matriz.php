<?php
class Matriz
{
    private $_matriz = array();

    public function __construct($matriz)
    {
        $this->_matriz = $matriz;
    }

    public function matrizSimetrica()
    {
        $longitud = count($this->_matriz);
        $simetrica = true;
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud; $j++) {
                if ($this->_matriz[$i][$j] != $this->_matriz[$j][$i]) {
                    $simetrica = false;
                }
            }
        }
        return $simetrica;
    }
}
