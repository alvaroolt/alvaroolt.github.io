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
        $this->query = "INSERT INTO obras (id, titulo, descripcion, portada, fecha_inicio, fecha_final, numero_valoraciones, valoracion_media) VALUES (:id, :titulo, :descripcion, :portada, :fecha_inicio, :fecha_final, :numero_valoraciones, :valoracion_media)";
        $this->parametros['id'] = $id;
        $this->parametros['titulo'] = $titulo;
        $this->parametros['descripcion'] = $descripcion;
        $this->parametros['portada'] = $portada;
        $this->parametros['fecha_inicio'] = $fecha_inicio;
        $this->parametros['fecha_final'] = $fecha_final;
        $this->parametros['numero_valoraciones'] = $numero_valoraciones;
        $this->parametros['valoracion_media'] = $valoracion_media;
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Clave guardada';
    }
    public function delete($id = "")
    {
        $this->query = "DELETE FROM clavefirma WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Clave firma eliminada';
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
