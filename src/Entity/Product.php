<?php

namespace App\Entity;


class Product
{
    private ?int $id;
    private string $label;
    private float $price;
    private string $description;

    public function __construct(string $label, float $price, string $description, ?int $id = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->description = $description;
        $this->price = $price;
    }


    /**
     * @return 
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return 
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param  $label 
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return 
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param  $price 
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return 
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param  $description 
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}