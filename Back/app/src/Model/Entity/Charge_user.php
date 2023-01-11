<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Charge_user extends BaseEntity
{
    private int $user_id;
    private int $charge_id;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Charge_user
     */
    public function setUserId(int $user_id): Charge_user
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getChargeId(): int
    {
        return $this->charge_id;
    }

    /**
     * @param int $charge_id
     * @return Charge_user
     */
    public function setChargeId(int $charge_id): Charge_user
    {
        $this->charge_id = $charge_id;
        return $this;
    }



}

