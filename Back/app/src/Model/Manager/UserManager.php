<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\User;

class UserManager extends BaseManager
{

    public function login($username,$password):?User
    {
        $sql = "select `id`,`password`,`email` from `Users` where `username` = :username";
        
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':username', $username,\PDO::PARAM_STR);

        $query->execute();

        $response = $query->fetch();

        if(!$response){
            return null;
        }

        if(!password_verify($password,$response["password"])){
            return null;
        }

        return  new User($response);
    }
}