<?php
namespace App\Manager;

class UserManager
{
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from user");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }
}