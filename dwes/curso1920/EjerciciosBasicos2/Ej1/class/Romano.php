<?php
class Romano{
    private $_cadena;
    private $_numero;

    public function __construct($cadena){
        $this->_cadena = $cadena;
        $this->_numero = $this->romanoADecimal($cadena);
    }

    private function romanoADecimal($cadena){
        $arrayNumeros = str_split($cadena);
        $arrayValores = array();
        foreach($arrayNumeros as $indice => $numero){
            switch($numero){
                case "I":
                    array_push($arrayValores, 1);
                break;
                case "V":
                    array_push($arrayValores, 5);
                break;
                case "X":
                    array_push($arrayValores, 10);
                break;
                case "L":
                    array_push($arrayValores, 50);
                break;
                case "C":
                    array_push($arrayValores,100);
                break;
                case "D":
                    array_push($arrayValores, 500);
                break;
                case "M":
                    array_push($arrayValores, 1000);
                break;
            }
        }
        return $arrayValores;
    }
    public function convertirADecimal(){
        $valorTotal = 0;
        $limite = count($this->_numero) - 1;
        foreach ($this->_numero as $indice => $valor) {
            if($limite == $indice){
                $valorTotal = $valorTotal + $valor;
            }else{
                if ($valor == 5) {
                    $valorTotal = $valorTotal + $valor;
                }else{
                    if ($this->_numero[($indice+1)] > $valor) {
                        $valorTotal = $valorTotal - $valor;
                    }else{
                        $valorTotal = $valorTotal + $valor;
                    }
                }
            }
        }
        return $valorTotal;
    }
}