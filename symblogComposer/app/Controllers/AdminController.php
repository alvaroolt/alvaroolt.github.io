<?php

namespace App\Controllers;

use App\Models\Admin;

class AdminController extends BaseController
{
    public function getIndex()
    {
        echo $this->renderHTML("admin.twig");
    }
}
