<?php

namespace App\Models;

abstract class BaseEntity {
    protected int $id;

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