<?php

namespace App\Models;

class UserModel
{
    private int $id;
    private string $username;
    private string $email_adress;
    private string $password;
    private string $firstname;
    private string $lastname;
    private string $home_adress;
    private string $role;
    private string $createdAt;
    private ?string $last_connected;

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
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email_adress
     *
     * @return string
     */
    public function getEmailAdress(): string
    {
        return $this->email_adress;
    }

    /**
     * Set the value of email_adress
     *
     * @param string $email_adress
     *
     * @return self
     */
    public function setEmailAdress(string $email_adress): self
    {
        $this->email_adress = $email_adress;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param string $lastname
     *
     * @return self
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of home_adress
     *
     * @return string
     */
    public function getHomeAdress(): string
    {
        return $this->home_adress;
    }

    /**
     * Set the value of home_adress
     *
     * @param string $home_adress
     *
     * @return self
     */
    public function setHomeAdress(string $home_adress): self
    {
        $this->home_adress = $home_adress;

        return $this;
    }

    /**
     * Get the value of role
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param string $role
     *
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of last_connected
     *
     * @return ?string
     */
    public function getLastConnected(): ?string
    {
        return $this->last_connected;
    }

    /**
     * Set the value of last_connected
     *
     * @param ?string $last_connected
     *
     * @return self
     */
    public function setLastConnected(?string $last_connected): self
    {
        $this->last_connected = $last_connected;

        return $this;
    }
}