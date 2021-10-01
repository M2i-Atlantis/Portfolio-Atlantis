<?php

namespace App\models;

// Défini ce qu'est une entité
// Une entité possède un id.
// Toutes les entités doivent hérités de cette classe.
// TODO: Est ce qu'on ajoute la date de modification / création ?

abstract class BaseEntity {
    private int $id;

    public function getId() 
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        return $this->id = $id;
        return $this;
    }
}