<?php

require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel
{
    private static $instancia;

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

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO usuarios (id, usuario, nombre, passwd, perfil, fecha_alta) VALUES (:id, :usuario, :nombre, :passwd, :perfil, :fecha_alta)";
        $this->parametros['id'] = $id;
        $this->parametros['usuario'] = $usuario;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['passwd'] = $passwd;
        $this->parametros['perfil'] = $perfil;
        $this->parametros['fecha_alta'] = $fecha_alta;
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Clave guardada';
    }

    public function get($usuario = '')
    {
        if ($usuario != '') {
            $this->query = "
                SELECT *
                FROM usuarios
                WHERE usuario = :usuario";
            $this->parametros['usuario'] = $usuario;
            $this->get_results_from_query();
            $this->close_connection();
        } else {
            $this->mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $campo = $valor;
        }
        $this->query = "
            UPDATE secre_usuario
            SET nombre=:nombre,
            usuario=:usuario
            WHERE perfil = :perfil
            ";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['usuario'] = $usuario;
        $this->parametros['perfil'] = $perfil;

        $this->get_results_from_query();
        $this->mensaje = 'Usuario modificado';
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Usuario eliminado de la base de datos.";
    }
}
