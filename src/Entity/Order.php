<?php

namespace App\Entity;

use DateTimeImmutable;

class Order{

    private int $orderId;
    private DateTimeImmutable $date;
    private string $statut;
    private int $idUser;
    private int $idFood;

    public function __construct(array $data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }



    /**
     * Get the value of orderId
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(string|DateTimeImmutable $date): self
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of idFood
     */
    public function getIdFood(): int
    {
        return $this->idFood;
    }

    /**
     * Set the value of idFood
     */
    public function setIdFood(int $idFood): self
    {
        $this->idFood = $idFood;

        return $this;
    }
}