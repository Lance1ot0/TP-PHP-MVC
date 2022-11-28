<?php
namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
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

    public function getByUsername(string $username, string $password): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->bindValue("password", $password, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO user (username, password, email, firstName, lastName, isAdmin) VALUES (:username, :password, :email, :firstName, :lastName, :isAdmin)");
        $query->bindValue("username", $user->getUsername());
        $query->bindValue("password", $user->getPassword());
        $query->bindValue("email", $user->getEmail());
        $query->bindValue("firstName", $user->getFirstName());
        $query->bindValue("lastName", $user->getLastName());
        $query->bindValue("isAdmin", $user->getIsAdmin());
        $query->execute();
    }
}