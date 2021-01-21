
<?php

require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel{
    
    private $_id;
    private $_usuario;
    private $_contrasenna;
    // private $_email;

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setContrasenna($contrasenna){
        $this->contrasenna = $contrasenna;
    }

    public function existeUsuario($usuario=""){
        if($usuario!=""){
            $this->query = "SELECT usuario,contrasenna from usuarios where usuario=:usuario";
        }

        $this->parametros["usuario"] = $usuario;

        $this->get_results_from_query();

        return $this->rows;

    }

    public function obtenerUsuarios(){

        $this->query = "SELECT usuario, contrasenna FROM usuarios";

        $this->get_results_from_query();

        return $this->rows;
    }

    public function obtenerUsuariosCompletos(){
        $this->query = "SELECT id, usuario, contrasenna FROM usuarios";

        $this->get_results_from_query();

        return $this->rows;
    }

    // Otra forma de meter datos en la BD

    public function persist (){

        // if(array_key_exists('usuario',$user_data)){
        //     $this->get($user_data['id']);

        //     if($user_data['id'] != $this->id){
        //         foreach ($user_data as $campo => $valor) {
        //             $$campo = $valor;
        //         }
        //     }
        // }

        if(count($this->existeUsuario($this->usuario)) == 0){

            $this->query = "INSERT INTO usuarios(usuario,contrasenna) VALUES (:usuario, :contrasenna)";

            // $this->parametros['id']=$user_data["id"];
            $this->parametros['usuario']=$this->usuario;
            $this->parametros['contrasenna']=$this->contrasenna;
                
            $this->get_results_from_query();


            $this->mensaje = "Usuario agregado exitosamente";
        }
        else{
            $this->mensaje = "El usuario ya existe";
        }
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
            $this->query = "SELECT id,usuario,contrasenna from usuarios where id=:id";
        }

        //Cargamos los parametros

        $this->parametros["id"] = $id;

        // Ejecutamos la consulta que devuelve registros
        $this->get_results_from_query();

        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Usuario encontrado";
            
        }else{
            $this->mensaje = "Usuario no encontrado";    
        }


        return $this->rows;
    }

    public function buscar($filtro){
        $this->query = "SELECT id, usuario, contrasenna FROM usuarios WHERE
        id like '%$filtro%' OR
        usuario like '%$filtro%' OR
        contrasenna like '%$filtro%'";

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
        $this->query= "DELETE from usuarios where id = :id";

        $this->parametros["id"]= $id;
        $this->get_results_from_query();
        $this->mensaje = "Usuario borrado";

    }
}


?>