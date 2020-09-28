<?php
require_once('DBAbstractModel.php');
class Libro extends DBAbstractModel
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
    private $_isbn;
    private $_titulo;
    private $_autor;
    private $_editorial;
    private $_estado = "libre";
    private $_mensaje;

    public function set($user_data = array())
    {

        if (array_key_exists('isbn', $user_data)) {
            $this->get($user_data['isbn']);
            if ($user_data['isbn'] != $this->_isbn) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }

                $this->query = "INSERT INTO bib_libros
                                (isbn, titulo, autor, editorial, estado)
                                VALUES
                                (:isbn, :titulo, :autor, :editorial, :estado)";
                $this->parametros['isbn'] = $user_data["isbn"];
                $this->parametros['titulo'] = $user_data["titulo"];
                $this->parametros['autor'] = $user_data["autor"];
                $this->parametros['editorial'] = $user_data["editorial"];
                $this->parametros['estado'] = $this->_estado;
                $this->get_results_from_query();
                //$this->execute_single_query();
                $this->_mensaje = 'Libro agregado exitosamente';
            } else {
                $this->_mensaje = 'El libro ya existe';
            }
        } else {
            $this->_mensaje = 'No se ha agregado el libro';
        }
    }

    public function setDirecto()
    {
        if (empty($this->getLibroByIsbn($this->_isbn))) {
            $this->query = "INSERT INTO bib_libros
                                 (isbn, titulo, autor, editorial, estado)
                                VALUES
                                (:isbn, :titulo, :autor, :editorial, :estado)";
            $this->parametros['isbn'] =  $this->_isbn;
            $this->parametros['titulo'] =  $this->_titulo;
            $this->parametros['autor'] = $this->_autor;
            $this->parametros['editorial'] = $this->_editorial;
            $this->parametros['estado'] =  $this->_estado;
            $this->get_results_from_query();
            $this->_mensaje = 'Libro agregado exitosamente';
        } else {
            $this->_mensaje = 'Introducción fallida, campos repetidos';
        }
    }

    public function edit($id)
    {
        $this->query = "UPDATE bib_libros SET isbn=:isbn, titulo=:titulo, autor=:autor, editorial=:editorial WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['isbn'] =  $this->_isbn;
        $this->parametros['titulo'] =  $this->_titulo;
        $this->parametros['autor'] = $this->_autor;
        $this->parametros['editorial'] = $this->_editorial;
        $this->get_results_from_query();
        $this->_mensaje = 'Libro modificado';
    }


    public function __construct()
    {
    }

    public function get($filtro)
    {
        $this->query = "SELECT * FROM bib_libros WHERE 
            titulo like :filtro OR 
            autor like :filtro OR 
            editorial like :filtro";
        $this->parametros["filtro"] = "%" . $filtro . "%";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLibroByIsbn($isbn)
    {
        $this->query = "SELECT * FROM bib_libros WHERE isbn=:isbn";
        $this->parametros["isbn"] = $isbn;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLibroByNotThisIsbn($isbn)
    {
        $this->query = "SELECT * FROM bib_libros WHERE isbn!=:isbn";
        $this->parametros["isbn"] = $isbn;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLibroById($id)
    {
        $this->query = "SELECT * FROM bib_libros WHERE id=:id";
        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function getLibros()
    {
        $this->query = "SELECT *FROM bib_libros LIMIT 10";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getLibres()
    {
        $this->query = "SELECT *FROM bib_libros WHERE estado like :filtro";
        $this->parametros["filtro"] = "libre";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function liberaLibro($id)
    {
        $this->query = "UPDATE bib_libros SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['estado'] = "libre";
        $this->get_results_from_query();
        $this->_mensaje = 'Permiso concedido';
    }

    public function ocupaLibro($id)
    {
        $this->query = "UPDATE bib_libros SET estado=:estado WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['estado'] = "prestado";
        $this->get_results_from_query();
        $this->_mensaje = 'Permiso concedido';
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM bib_libros WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->_mensaje = 'Libro borrado';
    }

    public function getMensaje()
    {
        return $this->_mensaje;
    }

    public function getIsbn()
    {
        return $this->_isbn;
    }
    public function setIsbn($isbn)
    {
        $this->_isbn = $isbn;
    }

    public function getTitulo()
    {
        return $this->_titulo;
    }
    public function setTitulo($titulo)
    {
        $this->_titulo = $titulo;
    }

    public function getAutor()
    {
        return $this->_autor;
    }

    public function setAutor($autor)
    {
        $this->_autor = $autor;
    }

    public function getEditorial()
    {
        return $this->_editorial;
    }

    public function setEditorial($editorial)
    {
        $this->_editorial = $editorial;
    }

    public function getEstado()
    {
        return $this->_estado;
    }
}
