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

    public function getByUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        var_dump($user);
        die;
        $query = $this->pdo->prepare("INSERT INTO user (username, password, email, firstName, lastName, isAdmin), VALUES (:username, :password, :email, :firstName, :lastName, 0)");
        // $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        // $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        // $query->bindValue("lastName", $user->getLastName(), \PDO::PARAM_STR);
        // $query->bindValue("firstName", $user->getFirstName(), \PDO::PARAM_STR);
        // $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->execute();
    }
}