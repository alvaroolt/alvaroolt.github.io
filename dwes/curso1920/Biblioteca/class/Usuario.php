<?php
require_once('DBAbstractModel.php');
class Usuario extends DBAbstractModel
{

    private static $instancia;
    public static function singleton()
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

    private $_id;
    private $_nombre;
    private $_apellidos;
    private $_dni;
    private $_usuario;
    private $_contraseña;
    private $_perfil = "lector";
    private $_estado = "pendiente";
    private $_mensaje;

    public function __construct()
    {
    }

    public function set($user_data = array())
    {
        if (array_key_exists('dni', $user_data)) {
            $this->get($user_data['dni']);
            if ($user_data['dni'] != $this->_dni) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }

                $this->query = "INSERT INTO bib_usuarios
                                (nombre, apellidos, dni, usuario, contrasena, perfil, estado)
                                VALUES
                                (:nombre, :apellidos, :dni, :usuario, :contrasena, :perfil, :estado)";
                $this->parametros['nombre'] =  $nombre;
                $this->parametros['apellidos'] =  $apellidos;
                $this->parametros['dni'] =  $dni;
                $this->parametros['usuario'] =  $usuario;
                $this->parametros['contrasena'] = $contraseña;
                $this->parametros['perfil'] = $perfil;
                $this->parametros['estado'] = $estado;
                $this->get_results_from_query();
                $this->_mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->_mensaje = 'El usuario ya existe';
            }
        } else {
            $this->_mensaje = 'No se ha agregado al usuario';
        }
    }

    public function setDirecto()
    {
        $this->query = "INSERT INTO bib_usuarios
                                (nombre, apellidos, dni, usuario, contrasena, perfil, estado)
                                VALUES
                                (:nombre, :apellidos, :dni, :usuario, :contrasena, :perfil, :estado)";
        $this->parametros['nombre'] =  $this->_nombre;
        $this->parametros['apellidos'] =  $this->_apellidos;
        $this->parametros['dni'] =  $this->_dni;
        $this->parametros['usuario'] =  $this->_usuario;
        $this->parametros['contrasena'] = $this->_contraseña;
        $this->parametros['perfil'] = $this->_perfil;
        $this->parametros['estado'] = $this->_estado;
        $this->get_results_from_query();
        $this->_mensaje = 'Usuario agregado exitosamente';
    }

    public function get($id)
    {
        if ($id != "") {
            $this->query = "SELECT id, usuario, contrasena FROM bib_usuarios WHERE id=:id";
            $this->parametros["id"] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->propiedad = $valor;
            }
            $this->_mensaje = "Usuario encontrado";
        } else {
            $this->_mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }

    public function getUsuarioFiltrado($filtro)
    {
        if ($filtro != "") {
            $this->query = "SELECT * FROM bib_usuarios WHERE nombre like :filtro OR usuario like :filtro";
            $this->parametros["filtro"] = "%" . $filtro . "%";
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->propiedad = $valor;
            }
            $this->_mensaje = "Usuario encontrado";
        } else {
            $this->_mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }



    public function getUsuarioLector()
    {
        $this->query = "SELECT * FROM bib_usuarios WHERE perfil = :perfil";
        $this->parametros["perfil"] = "lector";
        $this->get_results_from_query();

        return $this->rows;
    }



    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE bib_usuarios SET contrasena=:contrasena WHERE id=:id";
        $this->parametros['id'] = $user_data["id"];
        $this->parametros['contrasena'] = $user_data["contrasena"];
        $this->get_results_from_query();
        $this->_mensaje = 'Contraseña modificada';
    }

    public function cambiaEstado($id)
    {
        $this->query = "UPDATE bib_usuarios SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['estado'] = "acceso";
        $this->get_results_from_query();
        $this->_mensaje = 'Permiso concedido';
    }

    public function pideLibro($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE bib_usuarios SET libroActual=:libro WHERE id=:id";
        $this->parametros['id'] = $usuario;
        $this->parametros['libro'] = $libro;
        $this->get_results_from_query();
        $this->_mensaje = 'Permiso concedido';
    }

    public function bloquear($id)
    {
        $this->query = "UPDATE bib_usuarios SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['estado'] = "bloqueado";
        $this->get_results_from_query();
        $this->_mensaje = 'Usuario bloqueado';
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM bib_usuarios WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->_mensaje = 'Usuario eliminado';
    }


    public function loggin($usuario, $password)
    {
        $this->query = "SELECT * FROM bib_usuarios WHERE usuario =:user and contrasena = :contrasena";
        $this->parametros['user'] = $usuario;
        $this->parametros['contrasena'] = $password;
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->propiedad = $valor;
            }
            $this->_mensaje = "Usuario encontrado";
        } else {
            $this->_mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }

    public function getMensaje()
    {
        return $this->_mensaje;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }
    public function setNombre($nombre)
    {
        $this->_nombre = ($nombre);
    }

    public function getApellidos()
    {
        return $this->_apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->_apellidos = ($apellidos);
    }

    public function getDni()
    {
        return $this->_dni;
    }
    public function setDni($dni)
    {
        $this->_dni = ($dni);
    }

    public function getUsuario()
    {
        return $this->_usuario;
    }
    public function setUsuario($usuario)
    {
        $this->_usuario = ($usuario);
    }

    public function getContraseña()
    {
        return $this->_contraseña;
    }
    public function setContraseña($contraseña)
    {
        $this->_contraseña = ($contraseña);
    }

    public function getPerfil()
    {
        return $this->_perfil;
    }
    public function setPerfil($perfil)
    {
        $this->_perfil = ($perfil);
    }

    public function getEstado()
    {
        return $this->_estado;
    }
    public function setEstado($estado)
    {
        $this->_estado = ($estado);
    }
}