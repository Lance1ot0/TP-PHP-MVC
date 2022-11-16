<?php

namespace App\Entity;

class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private int $author;
    private int $userId;
    private Date $date;
    private int $postId;
    private int $supportId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
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
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     * @return Comment
     */
    public function setAuthor(int $author): Comment
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return int
     */
    public function setPostId(int $postId): int
    {
        $this->postId = $postId;
        return $this;
    }
    /**
     * @return int
     */
    public function getSupportId(): int
    {
        return $this->supportId;
    }

    /**
     * @param int $supportId
     * @return int
     */
    public function setSupportId(int $supportId): int
    {
        $this->supportId = $supportId;
        return $this;
    }
}
