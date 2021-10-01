<?php

namespace App\models;


class Experience extends BaseEntity
{
    private int $id;
    private string $name;
    private ?string $startDate; // DATETIME
    private ?string $endDate; // DATETIME
    private string $description;
    private string $location;
    private string $contractType;
    private ?int $cvId;

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

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }
    
    public function setStartDate(?string $startDate): self
    {
        return $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }
    public function setEndDate(?string $endDate): self
    {
        return $this->endDate = $endDate;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
    public function setLocation(string $location): self
    {
        return $this->location = $location;
        return $this;
    }

    public function getContractType(): string
    {
        return $this->contractType;
    }
    public function setContractType(string $contractType): self
    {
        return $this->contractType;
        return $this;
    }

    public function getCvId(): ?int
    {
        return $this-> cvId;
    }
    public function setCvId(int $cvId): self
    {
        return $this-> cvId;
        return $this;
    }

}
