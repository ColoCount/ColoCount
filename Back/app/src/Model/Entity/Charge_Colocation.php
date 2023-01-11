<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Charge_colocation extends BaseEntity
{
    private int $charge_id;
    private int $colocation_id;

    /**
     * @return int
     */
    public function getChargeId(): int
    {
        return $this->charge_id;
    }

    /**
     * @param int $charge_id
     * @return Charge_colocation
     */
    public function setChargeId(int $charge_id): Charge_colocation
    {
        $this->charge_id = $charge_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getColocationId(): int
    {
        return $this->colocation_id;
    }

    /**
     * @param int $colocation_id
     * @return Charge_colocation
     */
    public function setColocationId(int $colocation_id): Charge_colocation
    {
        $this->colocation_id = $colocation_id;
        return $this;
    }

}

