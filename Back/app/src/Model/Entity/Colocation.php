<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Colocation extends BaseEntity
{
    private int $id;
    private string $name;
    private ?string $description;
    private string $created_at;
    private string $updated_at;
    private ?string $deleted_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Colocation
     */
    public function setId(int $id): Colocation
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
     * @return Colocation
     */
    public function setName(string $name): Colocation
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Colocation
     */
    public function setDescription(?string $description): Colocation
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated_At(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Colocation
     */
    public function setCreated_At(string $created_at): Colocation
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdated_At(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Colocation
     */
    public function setUpdated_At(string $updated_at): Colocation
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeleted_At(): ?string
    {
        return $this->deleted_at;
    }

    /**
     * @param string|null $deleted_at
     * @return Colocation
     */
    public function setDeleted_At(?string $deleted_at): Colocation
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

}