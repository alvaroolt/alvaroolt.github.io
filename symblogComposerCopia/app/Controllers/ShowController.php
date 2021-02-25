<?php

// use App\Controllers\BaseController;
// use App\Models\Blog;

// class ShowController extends BaseController
// {
//     private function getBlog()
//     {
//         foreach (Blog::all() as $blog) {
//             if ($blog->id == $_GET['id']) {
//                 $blogFinal = $blog;
//             }
//         }
//         return $blogFinal;
//     }

//     public function showAction()
//     {
//         $blog = $this->getBlog();
//         $comments = $blog->comments()->get();
//         return $this->renderHTML('show.twig', array('blog' => $blog, 'comments' => $comments));
//     }
// }