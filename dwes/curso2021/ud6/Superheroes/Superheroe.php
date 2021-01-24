<?php
require_once('DBAbstractModel.php');

class Superheroe extends DBAbstractModel
{
    private static $instancia;

    private $_id;
    private $_nombre;
    private $_velocidad;
    private $_created_at;
    private $_updated_at;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function getSuperheroes()
    {
        $this->query = "SELECT * FROM superheroes";
    }

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = _CLASS_;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
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

    public function get($id = "")
    {
        if ($id != "") {
            $this->query = "SELECT * FROM superheroes WHERE id =:id";
        }
        $this->parametros["id"] = $id; // carga de parámetros
        $this->get_results_from_query(); // ejecución de la consulta que devuelve registros

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Superhéroe encontrado';
        } else {
            $this->mensaje = 'Superhéroe no encontrado';
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad";

        // this->parametros["id"] = $id;
        $this->parametros["nombre"] = $nombre;
        $this->parametros["velocidad"] = $velocidad;

        $this->get_results_from_query();
        $this->mensaje = "Superhéroe encontrado";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM superheroes WHERE id=:id";
        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Superhéroe eliminado de la base de datos.";
    }
}