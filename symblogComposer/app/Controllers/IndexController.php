<?php

namespace App\Controllers;

use App\Models\Blog;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $blogs = Blog::all();
        return $this->renderHTML("index.twig", ["blogs" => $blogs]);
    }
    public function contactAction()
    {
        return $this->renderHTML("contact.twig");
    }
    public function aboutAction()
    {
        return $this->renderHTML("about.twig");
    }
    public function addBlogAction()
    {
        return $this->renderHTML("addBlog.twig");
    }
}
