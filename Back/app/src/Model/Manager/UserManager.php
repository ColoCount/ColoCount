<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\User;

class UserManager extends BaseManager
{

    public function login($username,$password):?User
    {
        
        $sql = "select `user_id`,`username`,`email`,`password` from `users` where `username` = :username";
        
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
        
        return new User($response);
    }


    public function register($username,$email,$password):User
    {

        $sql = "INSERT INTO `users` (`username`,`password`,`email`) VALUES (:username, :password, :email)";

        $query = $this->pdo->prepare($sql);

        $query->bindValue(':username', $username, \PDO::PARAM_STR);
        $query->bindValue(':password', $password, \PDO::PARAM_STR);
        $query->bindValue(':email', $email, \PDO::PARAM_STR);

        $query->execute();

        return $this->getUserById($this->pdo->lastInsertId());
    }

    public function getUserById($id):?User
    {
        $sql = "select `user_id`,`email`,`username` from `users` where `user_id` = :id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();

        $response = $query->fetch();

        if(!$response){
            return null;
        }

        return new User($response);
    }


    public function getAllColocUser($idColoc):?array
    {

        $sql = "select `idUser` from `ColocUser` where `idColoc` = :idColoc";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':idColoc', $idColoc,\PDO::PARAM_STR);
        $query->execute();
        $response = [];
        
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {

            $id = $data['idUser'];
            $sql = "select * from `users` where `id` = :id";

            $query = $this->pdo->prepare($sql);
            $query->bindValue(':id', $id,\PDO::PARAM_STR);
            $query->execute();

            $user = $query->fetch();
            $response[] = new User($user);

        }

        return  $response;
    }
}