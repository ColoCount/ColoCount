<?php

namespace App\Controller;

use App\Base\CookieHelper;
use App\Model\Factory\PDO;
use App\Model\Route\Route;
use App\Model\Manager\UserManager;
use App\Service\JWTHelper;

class UserController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST)){
                if(isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"] && !empty($_POST["password"]))) {
                    $username = htmlspecialchars(strip_tags($_POST['username']));
                    $password = htmlspecialchars(strip_tags($_POST['password']));
                    
                    $connectioPDO = new UserManager(new PDO());
                    $user = $connectioPDO->login($username,$password);
                    
                    if($user){
                        $jwt = JWTHelper::buildJWT($user);

                        CookieHelper::setCookie($jwt);
                        
                        echo json_encode([
                            'status' => 'success',
                            "id" => $user->getUser_Id(),
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

    #[Route('/register',name:'register.register', methods: ["POST"])]
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
                            "id" => $user->getUser_Id(),
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

    #[ROUTE('/mes_colocs/{id}/remove_user/{user_id_remove}',name:'remove_user.remove',methods:["GET"])]
    public function remove($id,$user_id_remove){
        $cred = str_replace("Bearer ", "", getallheaders()['Authorization'] ?? getallheaders()['authorization'] ?? "");
        $token = JWTHelper::decodeJWT($cred);
        
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if($token){
                    $user_id = $token->id;
                    $connectioPDO = new UserManager(new PDO());
                    $response = $connectioPDO->removeUser($id,$user_id,$user_id_remove);
                    
                    if($response == 0){
                        echo json_encode([
                            'status' => 'sucess',
                            'message' => 'L\'utilisateur expulsé',
                        ]);
                
                        exit;
                    }elseif($response == 1){
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Vous ne pouvez pas expulsé un utilisateur qui n\'à pas tout remboursé',
                        ]);
                
                        exit;
                    }elseif($response == 2){
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Vous n\'êtes pas admin dans cette colocation',
                        ]);
                
                        exit;
                    }else{
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Une erreur est survenue',
                        ]);
                
                        exit;
                    }

            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Vous êtes pas connecté',
                ]);
                exit;
            }
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Une erreur est survenue',
            ]);
            exit;
        }
    }
        
    // #[Route('/usersColoc', name:"user", methods:["GET"])]
    // public function usersColoc()
    // {
    //     $PDO = new UserManager(new PDO());

    //     $users = $PDO->getAllColocUser(1);


    //     if($users){
    //         foreach ($users as $user) {
    //             $userInfo = [
    //                 "id" => $user->getUser_Id(),
    //                 "username" => $user->getUsername(),
    //                 "email" => $user->getEmail(),
    //             ];
    
    //             $userArray[] = $userInfo;
    //         }
    //         echo json_encode($userArray);
    //     }
    // }
}