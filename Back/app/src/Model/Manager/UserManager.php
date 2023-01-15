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

    public function removeUser($id,$user_id,$user_remove_id){

        $sql = "SELECT DISTINCT u.*,cu.role,cu.amount FROM users as u INNER JOIN colocation_user as cu ON u.user_id = cu.user_id where (cu.colocation_id = :id AND u.user_id = :user_id) OR (cu.colocation_id =:id AND u.user_id =:user_remove_id) ORDER BY `cu`.`role` ASC";
        
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id,\PDO::PARAM_STR);
        $query->bindValue(':user_id', $user_id,\PDO::PARAM_STR);
        $query->bindValue(':user_remove_id', $user_remove_id,\PDO::PARAM_STR);
        
        
        $query->execute();
        $admin = null;
        $user_remove = null;

        
        
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            if($data['role']=="admin"){
                $admin = $data;
            }else{
                $user_remove = $data;
            }
        }

        $user_remove_id = $user_remove['user_id'];
        if($admin && $user_remove){
            if($admin["user_id"]==$user_id){
                if($user_remove["amount"] == 0){
                    $sql = "DELETE FROM `colocation_user` as cu WHERE cu.user_id $user_remove_id and cu.colocation_id =$id";

                    $query->execute();
                    $response = 0;
                    return $response;
                }
                $response = 1;
                return $response;
            }
            $response = 2;
            return $response;
        }

        $response = null;
        return $response;
        
    }
}