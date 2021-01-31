<?php

namespace App\Models;
// require_once('class/DBAbstractModel.php');

// class Comment extends DBAbstractModel{
class Comment
{
    private static $instancia;

    private $id;
    private $blog;
    private $user;
    private $comment;
    private $approved;
    private $created;
    private $updated;

    public static function getInstancia()
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
    public function guardarBD()
    {    //HACERLO ASI
        $this->query = "INSERT INTO comment (blog, user, comment) VALUES 
            ( :blog, :user, :comment)";
        $this->parametros["blog"] = $this->blog;
        $this->parametros["user"] = $this->user;
        $this->parametros["comment"] = $this->comment;
        // $this->parametros["created"] = $this->created;
        // $this->parametros["updated"] = $this->updated;
        // $this->get_results_from_query();
        $this->mensaje = 'comment agregado exitosamente';
    }
    public function set()
    {
    }
    public function get()
    {
    }
    public function edit()
    {
    }
    public function delete()
    {
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function setBlog($blog)
    {
        $this->blog = $blog;
    }
    public function getBlog()
    {
        return $this->blog;
    }
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }
    public function setCreated($created)
    {
        $this->created = $created;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function setUpdated($uptaded)
    {
        $this->uptaded = $uptaded;
    }
}
