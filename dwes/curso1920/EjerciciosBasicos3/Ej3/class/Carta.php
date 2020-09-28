<?php
class Carta
{
    private $_datos = array();

    public function __construct()
    {
        $origen = fopen("./cartas/datos.txt", "r");
        do {
            $fila = fgets($origen);
            $datos = explode(",", $fila);
            if ($datos[0] != "" && $datos[1] != "") {
                array_push($this->_datos, array(trim($datos[0]), trim($datos[1])));
            }
        } while (!feof($origen));
        fclose($origen);
    }

    public function escribeCartas()
    {
        foreach ($this->_datos as $clave => $datos) {
            $entrada = fopen("./cartas/carta.txt", "r");
            $salida = fopen("./cartas/carta" . $datos[0] . ".txt", "w");
            do {
                $filaEntrada = fgets($entrada);

                $filaIntermedia = str_replace("{nombre}", $datos[0], $filaEntrada);
                $filaSalida = str_replace("{direccion}", $datos[1], $filaIntermedia);

                fwrite($salida, $filaSalida);
            } while (!feof($entrada));
            fclose($entrada);
            fclose($salida);
        }
    }

    public function getCartas()
    {
        return $this->_datos;
    }
}
