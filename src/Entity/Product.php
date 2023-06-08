<?php

namespace App\Entity;

/**
 * Une entité (ou entity) est une classe dont l'objectif est de représentant sous forme d'objet
 * une table de notre base de données. On se servira de cette classe pour faire transiter les données entre
 * les différentes couches de l'application
 */
class Product
{
    private ?int $id;
    private string $label;
    private float $price;
    private string $description;
    /**
     * Ici le constructeur a un argument optionnel, l'id, car avant d'avoir persisté, l'instance n'a pas
     * encore d'id, il faut donc pouvoir créer une instance de produit sans id
     */
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
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(?int $id): self
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