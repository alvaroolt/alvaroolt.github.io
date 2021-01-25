<?php

/**
 * Clase Blog
 * @author Álvaro Leiva Toledano
 */

class Blog
{
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

    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function setId($id)
    // {
    //     $this->id = $id;
    // }

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

    public function getNumComments(){
        return sizeof($this->comments);
    }
}