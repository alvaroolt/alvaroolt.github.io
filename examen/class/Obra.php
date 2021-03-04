<?php
require_once('DBAbstractModel.php');

class Obra extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_final;
    private $numero_valoraciones;
    private $valoracion_media;

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
        $this->query = "SELECT * FROM obras";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    public function getObraById($user_data = "")
    {
        $this->query = "SELECT titulo FROM obras WHERE id=:id";
        $this->parametros['id'] = $user_data;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    // public function getObras()
    // {
    //     $this->query = "SELECT * FROM obras WHERE perfil=:perfil";
    //     $this->parametros['perfil'] = "usuario";
    //     $this->get_results_from_query();
    //     $this->close_connection();
    //     return $this->rows;
    // }

    // public function getPlan($user_data=""){
    //     $this->query = "SELECT id_plan FROM series WHERE id=:id ";
    //     $this->parametros['id']= $user_data;
    //     $this->get_results_from_query();
    //     $this->close_connection();
    //     return $this->rows;
    // }

    // public function getNumRepro($user_data=""){
    //     $this->query = "SELECT numero_reproducciones FROM series WHERE id=:id ";
    //     $this->parametros['id']= $user_data;
    //     $this->get_results_from_query();
    //     $this->close_connection();
    //     return $this->rows;
    // }

    // public function aumentarReproducciones($user_data=array()){
    //     $this->query = "UPDATE series SET numero_reproducciones=:numero_reproducciones WHERE id=:id";
    //     $this->parametros['id']= $user_data["id"];
    //     $this->parametros['numero_reproducciones']= $user_data["numero_reproducciones"];
    //     $this->get_results_from_query();
    //     $this->close_connection();
    // }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO obras (titulo, descripcion, portada, fecha_inicio, fecha_final) VALUES (:titulo, :descripcion, :portada, :fecha_inicio, :fecha_final)";
        $this->parametros['titulo'] = $user_data["titulo"];
        $this->parametros['descripcion'] = $user_data["descripcion"];
        $this->parametros['portada'] = $user_data["portada"];
        $this->parametros['fecha_inicio'] = $user_data["fecha_inicio"];
        $this->parametros['fecha_final'] = $user_data["fecha_final"];
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Obra guardada';
    }
    public function delete($id = "")
    {
        $this->query = "DELETE FROM clavefirma WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Obra eliminada';
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
