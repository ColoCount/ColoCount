<?php

namespace App\Controller;

use App\Model\Route\Route;
use App\Model\Manager\UserManager;
use App\Service\JWTHelper;


class UserController
{
    #[Route('/login', name:"login", methods:["Post"])]
    public function login(){
        var_dump($_POST);die;
    }
}