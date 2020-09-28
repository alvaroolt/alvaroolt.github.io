<?php
require_once('DBAbstractModel.php');
class Prestamo extends DBAbstractModel
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
    private $_usuario;
    private $_libro;
    private $_recogida;
    private $_devolucion;

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }

        $this->query = "INSERT INTO bib_prestamos
                                (usuario, libro, recogida, devolucion)
                                VALUES
                                (:usuario, :libro, :recogida, :devolucion)";
        $this->parametros['usuario'] =  $usuario;
        $this->parametros['libro'] = $libro;
        $this->parametros['recogida'] = date("Y/m/d");
        $this->parametros['devolucion'] = "No";
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Prestamo realizado exitosamente';
    }


    public function get($id)
    {
        if ($id != "") {
            $this->query = "SELECT * FROM bib_prestamos WHERE id=:id";
            $this->parametros["id"] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->propiedad = $valor;
            }
            $this->_mensaje = "Prestamo encontrado";
        } else {
            $this->_mensaje = "Prestamo no encontrado";
        }
        return $this->rows;
    }

    public function getPrestamos()
    {
        $this->query = "SELECT * FROM bib_prestamos";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getPrestamoActual($id)
    {
        $this->query = "SELECT * FROM bib_prestamos WHERE usuario=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getPrestamoById($id)
    {
        $this->query = "SELECT * FROM bib_prestamos WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM bib_prestamos WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->_mensaje = 'Prestamo eliminado';
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE bib_prestamos SET devolucion=:devolucion WHERE usuario=:usuario and libro = :libro";
        $this->parametros['usuario'] = $user_data["usuario"];
        $this->parametros['libro'] = $user_data["libro"];
        $this->get_results_from_query();
        $this->_mensaje = 'Devolucion realizada';
    }
    public function devuelveLibro($id)
    {
        $this->query = "UPDATE bib_prestamos SET devolucion=:devolucion WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['devolucion'] = "SI";
        $this->get_results_from_query();
        $this->_mensaje = 'Devolucion realizada';
    }

    public function __construct()
    {
    }

    public function getUsuario()
    {
        return $this->_usuario;
    }

    public function getLibro()
    {
        return $this->_libro;
    }

    public function getRecogida()
    {
        return $this->_recogida;
    }
    public function getDevolucion()
    {
        return $this->_devolucion;
    }
}
