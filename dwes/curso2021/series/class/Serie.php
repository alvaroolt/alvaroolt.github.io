<?php
require_once('DBAbstractModel.php');

class Serie extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $titulo;
    private $caratula;
    private $id_plan;
    private $numero_reproducciones;

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setCaratula($caratula)
    {
        $this->caratula = $caratula;
    }

    public function getSeries()
    {
        $this->query = "SELECT * FROM series";
    }

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

    public function buscarPorTitulo($buscar = "")
    {
        if ($buscar != '') {
            $this->query = "SELECT * FROM series WHERE titulo LIKE :filtro";
            $this->parametros["filtro"] = "%" . $buscar . "%";
            $this->get_results_from_query();
        }
        return $this->rows;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM series";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO series (titulo, caratula, numero_reproducciones) VALUES 
        (:titulo, :caratula, :numero_reproducciones)";
        $this->parametros['titulo'] = $user_data["titulo"];
        $this->parametros['caratula'] = $user_data["caratula"];
        $this->parametros['numero_reproducciones'] = $user_data["numero_reproducciones"];
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Serie agregada exitosamente';
    }

    public function get($id = "")
    {
        if ($id != "") {
            $this->query = "SELECT * FROM series WHERE id =:id";
        }
        $this->parametros["id"] = $id; // carga de parámetros
        $this->get_results_from_query(); // ejecución de la consulta que devuelve registros

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Serie encontrada';
        } else {
            $this->mensaje = 'Serie no encontrada';
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE series SET titulo=:titulo, caratula=:caratula WHERE id=:id";

        $this->parametros["id"] = $id;
        $this->parametros["titulo"] = $titulo;
        $this->parametros["caratula"] = $caratula;

        $this->get_results_from_query();
        $this->mensaje = "Serie encontrada";
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM series WHERE id=:id";
        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Serie eliminada de la base de datos.";
    }
}
