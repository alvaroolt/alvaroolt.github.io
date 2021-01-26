<?php
require_once('DBAbstractModel.php');

class Blog extends DBAbstractModel
{
    private static $instancia;

    public $id;
    public $title;
    public $author;
    public $blog;
    public $image;
    public $tags;
    public $created;
    public $updated;
    public $comments = array();

    // public function __construct($arrayDatos)
    // {
    //     $this->id = $arrayDatos['id'];
    //     $this->title = $arrayDatos['title'];
    //     $this->author = $arrayDatos['author'];
    //     $this->blog = $arrayDatos['blog'];
    //     $this->image = $arrayDatos['image'];
    //     $this->tags = $arrayDatos['tags'];
    //     $this->created = $arrayDatos['created'];
    //     $this->updated = $arrayDatos['updated'];
    // }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getBlog()
    {
        return $this->blog;
    }

    public function setBlog($blog)
    {
        $this->blog = $blog;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function addComment($comment)
    {
        array_push($this->comments, $comment);
    }

    public function getNumComments()
    {
        return sizeof($this->comments);
    }

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

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set($user_data = array())
    {
        // foreach ($user_data as $campo => $valor) {
        //     $$campo = $valor;
        // }
        // $this->query = "INSERT INTO blogs (title, author, blog, image, tags, created, updated, comments) VALUES 
        // (:title, :author, :blog, :image, :tags, :created, :updated, :comments)";
        // $this->parametros['title'] = $user_data["title"];
        // $this->parametros['author'] = $user_data["author"];
        // $this->parametros['blog'] = $user_data["blog"];
        // $this->parametros['image'] = $user_data["image"];
        // $this->parametros['tags'] = $user_data["tags"];
        // $this->parametros['created'] = $user_data["created"];
        // $this->parametros['updated'] = $user_data["updated"];
        // $this->parametros['comments'] = $user_data["comments"];
        // $this->get_results_from_query();
        // $this->execute_single_query();
        // $this->mensaje = 'Superheroe agregado exitosamente';
    }

    public function get($id = "")
    {
    }

    public function edit($user_data = array())
    {
    }

    public function delete($id = "")
    {
    }

    public function guardaBD()
    {
        $this->query = "INSERT INTO blogs (title, author, blog, image, tags) VALUES (:title, :author, :blog, :image, :tags)";
        $this->parametros['title'] = $this->title;
        $this->parametros['author'] = $this->author;
        $this->parametros['blog'] = $this->blog;
        $this->parametros['image'] = $this->image;
        $this->parametros['tags'] = $this->tags;
        // $this->parametros['comments'] = $this->comments;
        $this->get_results_from_query();
        $this->mensaje = 'Superheroe agregado exitosamente';
    }
}
