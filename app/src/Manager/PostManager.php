<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from post");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Post($data);
        }

        return $users;
    }

    public function createPost(Post $post, $userId, $author)
    {
        $date1 = date('Y-m-d'); // Date du jour
    
        $query = $this->pdo->prepare("INSERT INTO post (userId, content, author, createdAt) VALUES (:userId, :content, :author, :createdAt)");

        $query->bindValue("userId", $userId);
        $query->bindValue("content", $post->getContent());
        $query->bindValue("author", $author);
        $query->bindValue("createdAt", $date1);
        $query->execute();
    }

    public function deletePost($id)
    {    
        $query = $this->pdo->prepare("DELETE from post WHERE id = :id");

        $query->bindValue("id", $id);
   
        $query->execute();
    }
}
