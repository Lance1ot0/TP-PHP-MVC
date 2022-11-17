<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    #[Route('/login', 'login', ['GET', 'POST'])]
    public function login()
    {
        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();

        $this->render("login.php", ["users" => $users], "Tous les users");
    }

    #[Route('/signUp', 'signUp', ['GET', 'POST'])]
    public function signUp()
    {
        if ($_POST) {

            $userManager = new UserManager(new PDOFactory());
            $user = new User($_POST);
            $userManager->insertUser($user);
        } 

        $this->render("signUp.php", [], "Sign Up");
    }
}
