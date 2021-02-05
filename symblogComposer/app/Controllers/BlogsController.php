<?php

namespace App\Controllers;

use App\Models\Blog;

class BlogsController
{
    public function getAddBlogAction()
    {
        if (!empty($_POST)) {
            $blog = new Blog();
            $blog->title = $_POST["title"];
            $blog->blog = $_POST["description"];
            $blog->tags = $_POST["tag"];
            $blog->author = $_POST["author"];
            $blog->save();
        }
        include "../views/addBlog.php";
    }
}
