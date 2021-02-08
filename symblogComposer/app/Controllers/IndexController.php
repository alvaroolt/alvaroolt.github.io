<?php

namespace App\Controllers;

use App\Models\Blog;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $blogs = Blog::all();
        echo $this->renderHTML("index.twig", ["blogs" => $blogs]);
    }
}
