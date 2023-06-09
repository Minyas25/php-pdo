<?php

namespace App\Entity;

class Book
{

    public function __construct(
        private string $title,
        private int $year,
        private string $author,
        private ?int $id = null
    ) {}
    
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  $title 
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return 
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param  $year 
     * @return self
     */
    public function setYear(int $year): self
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return 
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param  $author 
     * @return self
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }
}