<?php

namespace App\models;

class Contract extends BaseEntity
{
    private string $name;

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