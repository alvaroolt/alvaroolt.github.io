<?php

namespace App\Controllers;

use App\Models\Admin;

class AdminController extends BaseController
{
    public function getIndex()
    {
        return $this->renderHTML("admin.twig");
    }
}
