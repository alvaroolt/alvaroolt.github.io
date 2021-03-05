<?php
require_once('DBAbstractModel.php');

class Tarifa extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $idObra;
    private $zonaA;
    private $zonaB;
    private $zonaC;

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
    public function edit($user_data = array())
    {
    }

    public function get($user_data = "")
    {
        $this->query = "SELECT * FROM tarifas";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    public function getTarifaById($user_data = "")
    {
        $this->query = "SELECT * FROM tarifas WHERE id=:id";
        $this->parametros['id'] = $user_data;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    public function getTarifaByIdObra($user_data = "")
    {
        $this->query = "SELECT * FROM tarifas WHERE idObra=:idObra";
        $this->parametros['idObra'] = $user_data;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO tarifas (zonaA, zonaB, zonaC) VALUES (:zonaA, :zonaB, :zonaC)";
        $this->parametros['zonaA'] = $user_data["zonaA"];
        $this->parametros['zonaB'] = $user_data["zonaB"];
        $this->parametros['zonaC'] = $user_data["zonaC"];
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Tarifa guardada';
    }
    public function delete($id = "")
    {
    }
    function __construct()
    {
        $this->db_name = 'book_example';
    }
    function __destruct()
    {
        $this->conn = null;
    }
}
