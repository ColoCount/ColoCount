<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Colocation;
use App\Model\Entity\User;

class ColocationManager extends BaseManager
{

    public function getAllMyColocs():?array
    {
        $sql = "SELECT c.* FROM colocation c INNER JOIN colocation_user cu ON cu.colocation_id = c.colocation_id INNER JOIN users u ON cu.user_id = u.user_id WHERE u.user_id = :id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', 2,\PDO::PARAM_STR);

        $query->execute();

        $colocs = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $colocs[] = new Colocation($data);
        };

        return $colocs;
        
    }


    public function addColoc($name,$description,$created_at,$updated_at,$user_id):void
    {
        $sql = "INSERT INTO `colocation` (`name`,`description`,`created_at`,`updated_at`) VALUES (:name, :description,:created_at,:updated_at)";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':name', $name, \PDO::PARAM_STR);
        $query->bindValue(':description', $description, \PDO::PARAM_STR);
        $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
        $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);

        $query->execute();

        $id = $this->pdo->lastInsertId();

        $sql = "INSERT INTO `colocation_user`(`colocation_id`,`user_id`,`amount`,`role`) VALUES (:colocation_id, :user_id,:amount,:role)";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':colocation_id', $id, \PDO::PARAM_STR);
        $query->bindValue(':user_id', $user_id, \PDO::PARAM_STR);
        $query->bindValue(':amount', 0, \PDO::PARAM_STR);
        $query->bindValue(':role', 'admin', \PDO::PARAM_STR);

        $query->execute();

    }

    public function getOneColocs($id):?Array
    {

        $sql = "SELECT c.colocation_id,c.colocation_name,u.username,u.user_id,u.username,ch.charge_id,ch.name,ch.charge_amount,ch.type,ch.category,chu.role_charge,cu.amount,cu.role FROM colocation AS c LEFT JOIN colocation_user AS cu ON c.colocation_id = cu.colocation_id LEFT JOIN users AS u ON cu.user_id = u.user_id LEFT JOIN charge_user AS chu ON u.user_id = chu.user_id LEFT JOIN charge AS ch ON ch.charge_id = chu.charge_id where c.colocation_id=:id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id,\PDO::PARAM_STR);

        $query->execute();
        
        $infoColoc = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $infoColoc[] = new Colocation($data);
        };
        
        return $infoColoc;
        
    }

    

}