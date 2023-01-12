<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Colocation;
use App\Model\Entity\User;

class ColocationManager extends BaseManager
{

    public function getMyColoc():?array
    {
        $sql = "SELECT c.* FROM colocation c INNER JOIN colocation_user cu ON cu.colocation_id = c.id INNER JOIN users u ON cu.user_id = u.id WHERE u.id = :id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', 2,\PDO::PARAM_STR);

        $query->execute();

        $colocs = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $colocs[] = new Colocation($data);
        };

        return $colocs;
        
    }

    public function addColoc($name,$description,$created_at,$updated_at):void
    {
        $sql = "INSERT INTO `colocation` (`name`,`description`,`created_at`,`updated_at`) VALUES (:name, :description,:created_at,:updated_at)";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':name', $name, \PDO::PARAM_STR);
        $query->bindValue(':description', $description, \PDO::PARAM_STR);
        $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
        $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);

        $query->execute();

    }

}