<?php

//1. Déclaration du namespace
namespace App\Entity;




class Food
{
    private int $foodId;
    private string $title;
    private string $image;
    private string $description;
    private int $price;


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
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of foodId
     */
    public function getFoodId(): int
    {
        return $this->foodId;
    }

    /**
     * Set the value of foodId
     */
    public function setFoodId(int $foodId): self
    {
        $this->foodId = $foodId;

        return $this;
    }
}
