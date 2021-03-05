<?php
require_once('DBAbstractModel.php');

class Entrada extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $idObra;
    private $fila;
    private $columna;
    private $precio;
    private $email;

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
        $this->query = "SELECT * FROM entradas";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    public function getEntradaById($user_data = "")
    {
        $this->query = "SELECT * FROM entradas WHERE id=:id";
        $this->parametros['id'] = $user_data;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    public function getEntradaByIdObra($user_data = "")
    {
        $this->query = "SELECT * FROM entradas WHERE idObra=:idObra";
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
        $this->query = "INSERT INTO entradas (fila, columna, precio, email) VALUES (:fila, :columna, :precio, :email)";
        $this->parametros['fila'] = $user_data["fila"];
        $this->parametros['columna'] = $user_data["columna"];
        $this->parametros['precio'] = $user_data["precio"];
        $this->parametros['email'] = $user_data["email"];
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Entrada guardada';
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
