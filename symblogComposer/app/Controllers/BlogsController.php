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

            // Carga de archivos
            $files = $request->getUploadedFiles();
            $imagen = $files['imagen'];
            if ($imagen->getError() == UPLOAD_ERR_OK) {
                $fileName = $imagen->getClientFilename();
                $fileName = uniqid() . $fileName;
                $imagen->moveTO("../public/img/$fileName");
                $blog->imagen = $fileName;
            }
            $blog->save();
        }
        return $this->renderHTML("addBlog.twig");
    }
}
