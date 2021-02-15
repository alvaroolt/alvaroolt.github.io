<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    public function formLogin()
    {
        echo $this->renderHTML("login.twig");
    }

    public function postLogin($request)
    {
        $postData = $request->getParsedBody();
        $responseMessage = null;

        $user = User::where("mail", $postData["mail"])->first();
        if ($user) {
            if (password_verify($postData["pass"], $user->pass)) {
                $responseMessage = "Ok Credentials";
            } else {
                $responseMessage = "Bad Credentials";
            }
        } else {
            $responseMessage = "Bad Credentials";
        }
        echo $this->renderHTML("login.twig", ["responseMessage" => $responseMessage]);
    }
}
