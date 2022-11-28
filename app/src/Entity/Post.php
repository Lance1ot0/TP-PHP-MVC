<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private ?int $id;
    private ?string $content;
    private ?string $author;
    private ?int $userId;
    private string $createdAt;
    private ?string $image = null; 

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */
    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Post
     */
    public function setAuthor(string $author): Post
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }


     /**
     * @param string $createdAt
     * @return Post
     */
    public function setCreatedAt(?string $createdAt): Post
    {
        $this->createdAt = $createdAt;
        return $this;
    }

        /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Post
     */
    public function setImage(?string $image): Post
    {
        $this->image = $image;
        return $this;
    }
}
