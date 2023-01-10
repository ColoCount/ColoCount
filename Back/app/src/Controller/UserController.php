<?php

namespace App\Controller;

use App\Model\Factory\PDO;
use App\Model\Route\Route;
use App\Model\Manager\UserManager;
use App\Service\JWTHelper;
use App\Base\CookieHelper;


class UserController
{
    #[Route('/login', name:"login", methods:["POST"])]
    public function login(){
        if($_SERVER['REQUES_METHOD'] == 'POST'){
            if(!empty($_POST)){
                if(isset($_POST['login'],$_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
                    $login = htmlspecialchars(strip_tags($_POST['login']));
                    $password = htmlspecialchars(strip_tags($_POST['password']));

                    $connectioPDO = new UserManager(new PDO());
                    $user = $connectioPDO->login($login,$password);

                    if($user)
                    $jwt = JWTHelper::buildJWT($user);
                    
                    CookieHelper::setCookie($jwt);
                    
                    echo json_encode([
                        'status' => 'success',
                        "id" => $user->getId(),
                        'username' => $user->getUserName(),
                        'token' => $jwt
                    ]);
                    exit;
                }
            }
        }
        echo json_encode([
            'status' => 'error',
            'message' => 'Pas de connexion'
        ]);
        exit;
    }

    #[Route('/usersColoc', name:"user", methods:["GET"])]
    public function usersColoc()
    {
        $PDO = new UserManager(new PDO());

        $users = $PDO->getAllColocUser(1);

        $tableauUser = [];

        foreach ($users as $user) {
            $userArray = [
                "id" => $user->getId(),
                "userName" => $user->getUserName(),
                "email" => $user->getEmail(),
                "password" => $user->getPassword()
            ];

            $tableauUser[] = $userArray;
        }


        if ($users) {
            echo json_encode(
                $tableauUser);
        }
    }
}