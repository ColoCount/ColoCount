<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Colocation extends BaseEntity
{
    private int $id;
    private string $nom;
    private string $totalSomme;
    private string $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getTotalSomme(): string
    {
        return $this->totalSomme;
    }

    /**
     * @param string $totalSomme
     */
    public function setTotalSomme(string $totalSomme): void
    {
        $this->totalSomme = $totalSomme;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

}

