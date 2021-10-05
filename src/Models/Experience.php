<?php

namespace App\Models;

class Experience extends BaseEntity
{
    // private int $id;
    private string $name;
    private string $startDate; 
    private ?string $endDate; 
    private ?string $description;
    private string $location;
    private int $contractType;
    private int $cvId;

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

    public function getStartDate(): string
    {
        return $this->startDate;
    }
    
    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }
    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
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
        $this->location = $location;
        return $this;
    }

    public function getContractType(): int
    {
        return $this->contractType;
    }

    public function setContractType(int $contractType): self
    {
        $this->contractType = $contractType;
        return $this;
    }

    public function getCvId(): int
    {
        return $this-> cvId;
    }

    public function setCvId(int $cvId): self
    {
        $this->cvId = $cvId;
        return $this;
    }

}