<?php
    require_once('DBAbstractModel.php');
    
    class Usuario extends DBAbstractModel {
        private static $instancia;

        private $id;
        private $usuario;
        private $nombre;
        private $passwd;
        private $perfil;
        private $fecha_alta;
 
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
        public function edit($user_data=array()) {
            
        }
        public function get($user_data=""){
            $this->query = "SELECT * FROM usuarios WHERE usuario=:usuario";
            $this->parametros['usuario']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getPlan($user_data=""){
            $this->query = "SELECT id FROM planes WHERE plan=:perfil";
            $this->parametros['perfil']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function hacersePremium($user_data=""){
            $this->query = "UPDATE usuarios SET perfil=:plan WHERE id=:id";
            $this->parametros['plan']= 'premium';
            $this->parametros['id']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
        }
        public function set($user_data = array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO series (id, titulo, caratula, valor) VALUES (:id, :titulo, :caratula, :id_plan)";
            $this->parametros['id']=$id;
            $this->parametros['titulo']=$titulo;
            $this->parametros['caratula']=$caratula;
            $this->parametros['id_plan']=$id_plan;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Clave guardada';
        }
        public function delete($id="") {
            $this->query = "DELETE FROM clavefirma WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Clave firma eliminada';
        }
        function __construct() {
            $this->db_name = 'book_example';
        }
        function __destruct() {
            $this->conn = null;
        }
    }
?>