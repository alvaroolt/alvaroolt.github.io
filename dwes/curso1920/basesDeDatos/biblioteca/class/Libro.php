
<?php

require_once('DBAbstractModel.php');

class Libro extends DBAbstractModel{
    
    private $_id;
    private $_titulo;
    private $_autor;
    private $_editorial;

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }

    public function obtenerLibros(){

        $this->query = "SELECT titulo, autor, editorial FROM libros";

        $this->get_results_from_query();

        return $this->rows;
    }

    public function obtenerLibrosCompletos(){
        $this->query = "SELECT id, titulo, autor, editorial FROM libros";

        $this->get_results_from_query();

        return $this->rows;
    }

    // Otra forma de meter datos en la BD

    public function persist (){
    
        $this->query = "INSERT INTO libros(titulo,autor,editorial) VALUES (:titulo, :autor, :editorial)";

        // $this->parametros['id']=$user_data["id"];
        $this->parametros['titulo']=$this->titulo;
        $this->parametros['autor']=$this->autor;
        $this->parametros['editorial']=$this->editorial;
            
        $this->get_results_from_query();


        $this->mensaje = "Libro agregado exitosamente";
    
    }


    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    public function getId($objeto){
        return $this->_id;
    }

    public function get($id=""){
        if($id!=""){
            $this->query = "SELECT id,titulo,autor,editorial from libros where id=:id";
        }

        //Cargamos los parametros

        $this->parametros["id"] = $id;

        // Ejecutamos la consulta que devuelve registros
        $this->get_results_from_query();

        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Libro encontrado";
            
        }else{
            $this->mensaje = "Libro no encontrado";    
        }


        return $this->rows;
    }

    public function buscar($filtro){
        $this->query = "SELECT id, titulo, autor, editorial FROM libros WHERE
        id like '%$filtro%' OR
        titulo like '%$filtro%' OR
        autor like '%$filtro%' OR
        editorial like '%$filtro%'";

        $this->parametros["filtro"] = $filtro;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($user_data=array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "Update libros SET titulo=:titulo, autor=:autor, editorial=:editorial where id = :id";

        // $this->parametros["id"]= $id;
        $this->parametros["titulo"]= $titulo;
        $this->parametros["autor"]= $autor;
        $this->parametros["editorial"]= $editorial;

        $this->get_results_from_query();
        $this->mensaje = "Libro encontrado";

    }

    public function delete ($id =""){
        $this->query= "DELETE from libros where id = :id";

        $this->parametros["id"]= $id;
        $this->get_results_from_query();
        $this->mensaje = "Libro borrado";

    }
}


?>