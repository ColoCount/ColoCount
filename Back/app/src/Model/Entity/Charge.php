<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Charge extends BaseEntity
{
    private int $id;
    private string $name;
    private float $amount;
    private string $type;
    private ?string $category;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Charge
     */
    public function setId(int $id): Charge
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Charge
     */
    public function setName(string $name): Charge
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Charge
     */
    public function setAmount(float $amount): Charge
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Charge
     */
    public function setType(string $type): Charge
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     * @return Charge
     */
    public function setCategory(?string $category): Charge
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Charge
     */
    public function setCreatedAt(string $created_at): Charge
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Charge
     */
    public function setUpdatedAt(string $updated_at): Charge
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeletedAt(): string
    {
        return $this->deleted_at;
    }

    /**
     * @param string $deleted_at
     * @return Charge
     */
    public function setDeletedAt(string $deleted_at): Charge
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }
}

