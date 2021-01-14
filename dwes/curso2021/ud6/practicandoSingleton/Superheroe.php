<?php
require_once('DBAbstractModel.php');
class Superheroe extends DBAbstractModel
{
    private static $instancia;
    /*CONSTRUCCIÓN DEL MODEL SINGLETON*/
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error("La clonación no es permitida!", E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
        }
    }
}
