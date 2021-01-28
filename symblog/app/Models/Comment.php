<?php

/**
 * Clase Comment
 * @user Álvaro Leiva Toledano
 */

class Comment extends DBAbstractModel
{
    public $id;
    public $blog_id;
    public $user;
    public $comment;
    public $approved;
    public $created;
    public $updated;

    public function getBlog()
    {
        return $this->blog_id;
    }

    public function setBlog($blog_id)
    {
        $this->blog_id = $blog_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
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
}