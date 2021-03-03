<?php
    require_once('DBAbstractModel.php');
    
    class Serie extends DBAbstractModel {
        private static $instancia;

        private $id;
        private $titulo;
        private $caratula;
        private $id_plan;
        private $numero_reproducciones;
 
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
            $this->query = "SELECT * FROM series ORDER BY numero_reproducciones DESC";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getSerieById($user_data=""){
            $this->query = "SELECT titulo FROM series WHERE id=:id";
            $this->parametros['id']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getPlan($user_data=""){
            $this->query = "SELECT id_plan FROM series WHERE id=:id ";
            $this->parametros['id']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function getNumRepro($user_data=""){
            $this->query = "SELECT numero_reproducciones FROM series WHERE id=:id ";
            $this->parametros['id']= $user_data;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }
        public function aumentarReproducciones($user_data=array()){
            $this->query = "UPDATE series SET numero_reproducciones=:numero_reproducciones WHERE id=:id";
            $this->parametros['id']= $user_data["id"];
            $this->parametros['numero_reproducciones']= $user_data["numero_reproducciones"];
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