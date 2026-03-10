<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */




class User
{
    public function __construct(
        private ?int $id = null,
        private ?string $username = null,
        private ?string $email = null,
        private ?string $password = null,
        private ?string $role = null,
        private ?DateTime $createdAt = null
    )
    {
    }

    // ==================== GETTERS ====================

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getUsername() : ?string
    {
        return $this->username;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function getPassword() : ?string
    {
        return $this->password;
    }

    public function getRole() : ?string
    {
        return $this->role;
    }

    public function getCreatedAt() : ?DateTime
    {
        return $this->createdAt;
    }

    // ==================== SETTERS ====================

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function setUsername(?string $username) : void
    {
        $this->username = $username;
    }

    public function setEmail(?string $email) : void
    {
        $this->email = $email;
    }

    public function setPassword(?string $password) : void
    {
        $this->password = $password;
    }

    public function setRole(?string $role) : void
    {
        $this->role = $role;
    }

    public function setCreatedAt(?DateTime $createdAt) : void
    {
        $this->createdAt = $createdAt;
    }
}