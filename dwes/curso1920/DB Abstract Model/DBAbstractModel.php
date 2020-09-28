<?php
abstract class DBAbstractModel {
    private static $db_host = DBHOST;
    private static $db_user = DBUSER;
    private static $db_pass = DBPASS;
    private static $db_name = DBNAME;
    private static $db_port = DBPORT;

    protected $conn; //manejador de la BD

    protected $consulta;
    protected $parametros = array();
    protected $rows = array();

    abstract protected function get($id); //recuperar id
    abstract protected function set($datos); //añadir
    abstract protected function edit($datos); //modificar
    abstract protected function delete($id); //borrar

    protected function open_connection() {
        $dsn = 'mysql:host'.self::$db_host .';'
                           .'dbname='.self::$db_name .';'
                           .'port='.self::$db_port;

        try {
            $this->conn = new PDO($dsn, self::$db_user, self::$db_pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"))
        }
    }

    public function lastInsert() {
        return $this->conn->lastInsertId();
    }

    // Desconectar la base de datos
    private function close_connection() {
        $this->conn=null;
    }

    protected function get_results_from_query() {
        $this->open_connection();
        $_result = false;
        if(($_stmt = $this->conn->prepare($this->query))) {
            if(preg_match_all('/(:w+)/',this->query, $_named, PREG_PATTERN_ORDER)) {
                $_named = array_pop($_named);
                foreach ($_named as $_param) {
                    $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
                }
            }
            try {
                if (!$_stmt->execute()) {
                    printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                }
                $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                $_stmt->closeCursor();
            } catch (PDOException $e) {
                printf("Error de consulta: %s\n", $e->getMessage());
            }
        }
    }
}