<?php
require_once('DBAbstractModel.php');

class Pago extends DBAbstractModel
{
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    public function set($user_data = array())
    {
        $this->query = "INSERT INTO pagos_user (idUser, mes, anyo, importe, pagado) VALUES (:idUser, :mes, :anyo, :importe, :pagado)";
        $this->parametros['idUser'] = $user_data["idUser"];
        $this->parametros['mes'] = $user_data["mes"];
        $this->parametros['anyo'] = $user_data["anyo"];
        $this->parametros['importe'] = $user_data["importe"];
        $this->parametros['pagado'] = $user_data["pagado"];
        $this->get_results_from_query();
        $this->mensaje = "<span style=\"color:green\">Pago realizado con éxito</span>";
    }
    public function get($user_data = "")
    {
        $this->query = "SELECT * FROM pagos_user WHERE idUser=:id";
        $this->parametros["id"] = $user_data;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getPagos($user_data = "")
    {
        $this->query = "SELECT * FROM pagos_user WHERE idUser=:id";
        $this->parametros["id"] = $user_data;
        // $mes = date("n");
        // $anyo = date("Y");
        // $this->parametros["mes"] = $mes;
        // $this->parametros["anyo"] = $anyo;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getId($user_data = "")
    {
        if ($user_data != "") {
            $this->query = "SELECT id FROM usuarios WHERE usuario=:usuario";
            $this->parametros["usuario"] = $user_data;
            $this->get_results_from_query();
        }
        return $this->rows[0]['id'];
    }

    public function edit($user_data = "")
    {
        $this->query = "UPDATE usuarios SET perfil=\"premium\" WHERE id = :id";
        $this->parametros['id'] = $user_data;

        $this->get_results_from_query();
        $this->mensaje = "<span style=\"color:green\">Plan mejorado con éxito</span>";
    }

    public function delete($user_data = "")
    {
        $this->query = "DELETE FROM usuario WHERE usuario = :usuario";
        $this->parametros['usuario'] = $user_data;
        $this->get_results_from_query();
        $this->mensaje = "<span style=\"color:green\">Usuario eliminado con éxito</span>";
    }

    public function persist()
    {
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
}
