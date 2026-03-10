<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */



class Post
{
    public function __construct(
        private ?int $id = null,
        private ?string $title = null,
        private ?string $excerpt = null,
        private ?string $content = null,
        private ?User $author = null,
        private ?DateTime $createdAt = null,
        private array $categories = []
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

    public function getExcerpt() : ?string
    {
        return $this->excerpt;
    }

    public function getContent() : ?string
    {
        return $this->content;
    }

    public function getAuthor() : ?User
    {
        return $this->author;
    }

    public function getCreatedAt() : ?DateTime
    {
        return $this->createdAt;
    }

    public function getCategories() : array
    {
        return $this->categories;
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

    public function setExcerpt(?string $excerpt) : void
    {
        $this->excerpt = $excerpt;
    }

    public function setContent(?string $content) : void
    {
        $this->content = $content;
    }

    public function setAuthor(?User $author) : void
    {
        $this->author = $author;
    }

    public function setCreatedAt(?DateTime $createdAt) : void
    {
        $this->createdAt = $createdAt;
    }

    public function setCategories(array $categories) : void
    {
        $this->categories = $categories;
    }
}