<?php

namespace App\models;

abstract class BaseEntity {
    private int $id;

    public function getId() 
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}