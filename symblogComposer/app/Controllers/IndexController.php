<?php

namespace App\Controllers;

use App\Models\Blog;

class IndexController
{
    public function indexAction()
    {
        $blogs = Blog::all();
        include "../views/index.php";
        // echo "indexAction";
    }
}
