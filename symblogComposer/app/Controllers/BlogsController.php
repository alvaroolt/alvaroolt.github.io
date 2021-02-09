<?php

namespace App\Controllers;

use App\Models\Blog;

class BlogsController extends BaseController
{
    public function getAddBlogAction($request)
    {
        if ($request->getMethod() == "POST") {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->title = $postData["title"];
            $blog->blog = $postData["description"];
            $blog->tags = $postData["tags"];
            $blog->author = $postData["author"];
            $blog->save();
        }
        echo $this->renderHTML("addBlog.twig");
    }
}
