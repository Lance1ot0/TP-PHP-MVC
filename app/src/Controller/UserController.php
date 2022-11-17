<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

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
        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();

        $this->render("signUp.php", ["users" => $users], "Sign Up");
    }
}
