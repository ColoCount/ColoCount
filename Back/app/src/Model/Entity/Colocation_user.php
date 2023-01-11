<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Charge_user extends BaseEntity
{
    private int $colocation_id;
    private int $user_id;
    private float $account;
    private string $role;

    /**
     * @return int
     */
    public function getColocationId(): int
    {
        return $this->colocation_id;
    }

    /**
     * @param int $colocation_id
     * @return Charge_user
     */
    public function setColocationId(int $colocation_id): Charge_user
    {
        $this->colocation_id = $colocation_id;
        return $this;
    }

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
     * @return float
     */
    public function getAccount(): float
    {
        return $this->account;
    }

    /**
     * @param float $account
     * @return Charge_user
     */
    public function setAccount(float $account): Charge_user
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Charge_user
     */
    public function setRole(string $role): Charge_user
    {
        $this->role = $role;
        return $this;
    }

}

