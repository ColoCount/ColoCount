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

                    if($user){
                        $jwt = JWTHelper::buildJWT($user);
                        
                        CookieHelper::setCookie($jwt);
                        
                        echo json_encode([
                            'status' => 'success',
                            "id" => $user->getId(),
                            'username' => $user->getUsername(),
                            'token' => $jwt
                        ]);
                        exit;
                    }
                }
            }
        }

        echo json_encode([
            'status' => 'error',
            'message' => 'Pas de connexion'
        ]);

        exit;
    }

    #[Route('/register',name:'register', methods: ["POST"])]
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if (!empty($_POST)) {

                if (isset($_POST["username"], $_POST["email"], $_POST['password'],$_POST['confirm_password']) && !empty($_POST['confirm_password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    
                    // Hash password
                    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    $confirm_password = $_POST['confirm_password'];
                    
                    //Comparaison password and confirm password
                    if(!password_verify($confirm_password,$password)){
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Pas de d\'inscription'
                        ]);
                        exit;
                    }

                    $username = htmlspecialchars(strip_tags($_POST['username']));
                    $email = htmlspecialchars(strip_tags($_POST['email']));

                    $connectionPdo = new UserManager(new PDO());

                    $user = $connectionPdo->register($username, $email, $password);

                    if($user){
                        $jwt = JWTHelper::buildJWT($user);

                        CookieHelper::setCookie($jwt);

                        echo json_encode([
                            'status' => 'success',
                            "id" => $user->getId(),
                            'username' => $user->getUsername(),
                            'token' => $jwt
                        ]);
                        exit;
                    }

                }
            }

        }

        echo json_encode([
            'status' => 'error',
            'message' => 'Pas de d\'inscription'
        ]);
        exit;
    }


    #[Route('/usersColoc', name:"user", methods:["GET"])]
    public function usersColoc()
    {
        $PDO = new UserManager(new PDO());

        $users = $PDO->getAllColocUser(1);


        if($users){
            foreach ($users as $user) {
                $userInfo = [
                    "id" => $user->getId(),
                    "username" => $user->getUserName(),
                    "email" => $user->getEmail(),
                ];
    
                $userArray[] = $userInfo;
            }
            echo json_encode($userArray);
        }
    }
}