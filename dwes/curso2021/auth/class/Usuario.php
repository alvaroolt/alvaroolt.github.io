<?php
require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel
{
    private static $instancia;

    private $id;
    private $usuario;
    private $nombre;
    private $passwd;
    private $perfil;
    private $fecha_alta;

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
        $this->query = "SELECT * FROM usuarios WHERE usuario=:usuario";
        $this->parametros['usuario'] = $user_data;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    public function getUsuarios()
    {
        $this->query = "SELECT * FROM usuarios WHERE perfil=:perfil";
        $this->parametros['perfil'] = "usuario";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios (usuario, perfil, passwd, estado) VALUES (:usuario, :perfil, :passwd, :estado)";
        $this->parametros['usuario'] = $usuario;
        $this->parametros['perfil'] = "usuario";
        $this->parametros['passwd'] = $passwd;
        $this->parametros['estado'] = 0;
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
    public function activarUser($user_data)
    {
        $this->query = "UPDATE usuarios SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $user_data;
        $this->parametros['estado'] = 1;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    public function desactivarUser($user_data)
    {
        $this->query = "UPDATE usuarios SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $user_data;
        $this->parametros['estado'] = 0;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
}
