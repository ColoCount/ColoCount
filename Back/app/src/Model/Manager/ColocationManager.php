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

}