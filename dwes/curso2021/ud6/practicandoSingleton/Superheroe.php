<?php
require_once('DBAbstractModel.php');

class Superheroe extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

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
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO superheroes (nombre, velocidad) VALUES 
        (:nombre, :velocidad)";
        $this->parametros['nombre'] = $user_data["nombre"];
        $this->parametros['velocidad'] = $user_data["velocidad"];
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Superheroe agregado exitosamente';
    }

    // public function get($user_data = array())
    // {
    // }
    public function get($id = '')
    {
        if ($id != '') {
            $this->query = "SELECT * FROM superheroes WHERE id = :i";

            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        }

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        } else {
            $this->mensaje = 'sh no encontrado';
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
    }

    public function delete($user_data = array())
    {
    }
}
