<?php

namespace App\models;

class TypeOfContract extends BaseEntity
{
    private int $id;
    private string $name;

    // public function getId() 
    // {
    //     return $this->id;
    // }

    // public function setId(int $id): self
    // {
    //     return $this->id = $id;
    //     return $this;
    // }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}