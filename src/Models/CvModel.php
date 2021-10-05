<?php

namespace App\Models;

class CvModel
{
    private int $id;
    private string $about_me;
    private string $updated_at;
    private int $id_user;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of about_me
     *
     * @return string
     */
    public function getAboutMe(): string
    {
        return $this->about_me;
    }

    /**
     * Set the value of about_me
     *
     * @param string $about_me
     *
     * @return self
     */
    public function setAboutMe(string $about_me): self
    {
        $this->about_me = $about_me;

        return $this;
    }

    /**
     * Get the value of updated_at
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @param string $updated_at
     *
     * @return self
     */
    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of id_user
     *
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @param int $id_user
     *
     * @return self
     */
    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}