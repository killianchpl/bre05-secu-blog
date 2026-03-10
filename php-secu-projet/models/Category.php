<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Category
{
    public function __construct(
        private ?int $id = null,
        private ?string $title = null,
        private ?string $description = null
    )
    {
    }

    // ==================== GETTERS ====================

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    // ==================== SETTERS ====================

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function setTitle(?string $title) : void
    {
        $this->title = $title;
    }

    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
}