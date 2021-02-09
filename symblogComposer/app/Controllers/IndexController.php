<?php

namespace App\Controllers;

use App\Models\Blog;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $blogs = Blog::all();
        echo $this->renderHTML("index.twig", ["blogs" => $blogs]);
    }
    public function contactAction()
    {
        echo $this->renderHTML("contact.twig");
    }
    public function aboutAction()
    {
        echo $this->renderHTML("about.twig");
    }
    public function addBlogAction()
    {
        echo $this->renderHTML("addBlog.twig");
    }
}
