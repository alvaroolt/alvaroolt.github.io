<?php
require_once('DBAbstractModel.php');
class Libro extends DBAbstractModel {

    private static $instancia;
    public static function getInstancia() {
        if(!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone() {
        trigger_error('La clonación no es permitida!.',E_USER_ERROR);
    }

    private $id;
    private $titulo;
    private $autor;
    // private $editorial;
    private $mensaje;

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function persist() {
        $this->query = "INSERT INTO libros(titulo, autor) VALUES (:titulo, :autor)";
                // $this->parametros['id'] = $id;
                $this->parametros['titulo'] = $titulo;
                $this->parametros['autor'] = $autor;
                $this->get_results_from_query();
                $this->mensaje = 'Usuario agregado con éxito';
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getLibros($filtro) {
        $this->query = "SELECT id, titulo, autor
                        FROM libros
                        WHERE titulo like :filtro OR ...";
    }

    public function get($id=""){
        if($id!=""){
            $this->query = "SELECT id, titulo, autor FROM libro WHERE id=:id";
            $this->parametros["id"] = $id;
            $this->get_results_from_query();
        }
        if(count($this->rows) == 1){
            foreach($this->rows[0] as $propiedad=>$valor){
                $this->propiedad = $valor;
            }$this->mensaje="Usuario encontrado";
        }else{
            $this->mensaje="Usuario no encontrado";
        }
        return $this->rows;
    }

    // Crear un nuevo usuario
    public function set($user_data=array()) {
        // Capa de control
        if(array_key_exists('id',$user_data)) {
            $this->get($user_data)['id'];
            if($user_data['id'] != $this->id) {
                foreach ($user_data as $campo=>$valor) {
                    $campo = $valor;
                }
                $this->query = "INSERT INTO libros(titulo, autor) VALUES (:titulo, :autor)";
                // $this->parametros['id'] = $id;
                $this->parametros['titulo'] = $titulo;
                $this->parametros['autor'] = $autor;
                $this->get_results_from_query();
                $this->mensaje = 'Usuario agregado con éxito';
            }
        }
    }

    // Eliminar usuario
    public function delete($id='') {
        $this->query ="DELETE FROM libros
                       WHERE id = :id";
        $this->parametros['id']=$id;
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'Libro eliminado';
    }


?>