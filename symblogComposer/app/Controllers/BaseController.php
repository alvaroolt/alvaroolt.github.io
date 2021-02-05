<?php

namespace App\Controllers;

class BaseController
{
    protected $templateEngine;
    public function __construct()
    {
        $Loader = new \Twig\Loader\FilesystemLoader("../views");
        $this->templateEngine = new \Twig\Environment($Loader, array(
            "debug" => true,
            "cache" => false,
        ));
    }

    public function renderHTML($fileName, $data=[]) {
        return $this->templateEngine->render($fileName, $data);
    }
}
