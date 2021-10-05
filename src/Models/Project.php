<?php
namespace App\models;
class Project
{
    protected ?int $id;
    protected string $title;
    protected string $description;
    protected string $beginningDate;
    protected ?string $endingDate;
    protected ?string $picture;
    protected int $idCv;

    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of beginningDate
     *
     * @return string
     */
    public function getBeginningDate(): string
    {
        return $this->beginningDate;
    }

    /**
     * Set the value of beginningDate
     *
     * @param string $beginningDate
     *
     * @return self
     */
    public function setBeginningDate(string $beginningDate): self
    {
        $this->beginningDate = $beginningDate;

        return $this;
    }

    /**
     * Get the value of endingDate
     *
     * @return ?string
     */
    public function getEndingDate(): ?string
    {
        return $this->endingDate;
    }

    /**
     * Set the value of endingDate
     *
     * @param ?string $endingDate
     *
     * @return self
     */
    public function setEndingDate(?string $endingDate): self
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    /**
     * Get the value of picture
     *
     * @return ?string
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param ?string $picture
     *
     * @return self
     */
    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
    
    /**
     * Get the value of idCv
     *
     * @return ?int
     */
    public function getIdCv(): int
    {
        return $this->idCv;
    }

    /**
     * Set the value of idCv
     *
     * @param ?int $idCv
     *
     * @return self
     */
    public function setIdCv(int $idCv): self
    {
        $this->idCv = $idCv;

        return $this;
    }
}
