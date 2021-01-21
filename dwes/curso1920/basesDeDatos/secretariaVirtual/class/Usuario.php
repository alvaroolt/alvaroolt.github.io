
<?php

require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel{
    
    private $_id;
    private $_nombre;
    private $_usuario;
    private $_password;
    private $_email;
    private $_estado;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function existeUsuario($usuario=""){
        if($usuario!=""){
            $this->query = "SELECT nombre,email, usuario, password, estado from usuario where usuario=:usuario";
        }

        $this->parametros["usuario"] = $usuario;

        $this->get_results_from_query();

        return $this->rows;

    }

    public function obtenerUsuarios(){

        $this->query = "SELECT nombre,email, usuario, password, estado FROM usuario";

        $this->get_results_from_query();

        return $this->rows;
    }

    public function obtenerUsuariosCompletos(){
        $this->query = "SELECT id, nombre, email, usuario, password, estado FROM usuario";

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

            $this->query = "INSERT INTO usuario(nombre,email, usuario, password, estado) VALUES (:nombre,:email, :usuario, :password, 'bloqueado')";

            // $this->parametros['id']=$user_data["id"];
            $this->parametros['nombre']=$this->nombre;
            $this->parametros['email']=$this->email;
            $this->parametros['usuario']=$this->usuario;
            $this->parametros['password']=$this->password;
            
            // $this->parametros['validacion']=$this->validacion;
                
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
            $this->query = "SELECT id,nombre,email, usuario, password, estado from usuario where id=:id";
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
        $this->query = "SELECT id,nombre, email, usuario, password, estado FROM usuario WHERE
        id like '%$filtro%' OR
        usuario like '%$filtro%' OR
        password like '%$filtro%' OR
        nombre like '%$filtro%' OR
        email like '%$filtro%' OR
        estado like '%$filtro%'";

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

    public function esValido($id=""){

        $this->query = "Select estado FROM usuario where id = :id";

        $this->get_results_from_query();

        return $this->rows;

    }

    public function bloquear($id = ""){

        $this->query = "Update usuario set estado='bloqueado' where id = :id";
        
        $this->parametros["id"]= $id;
        $this->get_results_from_query();

        // return $this->rows;
    }

    public function activar($id = ""){

        $this->query = "Update usuario set estado='activo' where id = :id";
        
        $this->parametros["id"]= $id;
        $this->get_results_from_query();

        // return $this->rows;
    }

    public function delete ($id =""){
        $this->query= "DELETE from usuario where id = :id";

        $this->parametros["id"]= $id;
        $this->get_results_from_query();
        $this->mensaje = "Usuario borrado";

    }
}


?>