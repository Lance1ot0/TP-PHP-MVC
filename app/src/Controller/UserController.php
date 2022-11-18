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
        
        if ($_GET) {

            $user = $userManager->getByUsername($_GET['username']);
            if (isset($user)){

                $_SESSION['user'] = $user;
                $this->render("home.php", [], "Tous les posts");
            }
         
        }


        $this->render("login.php", ["users" => $users], "Tous les users");
    
    }

    #[Route('/signUp', 'signUp', ['GET', 'POST'])]
    public function signUp()
    {
        $userManager = new UserManager(new PDOFactory());
        if ($_POST) {
            
            $user = new User($_POST);
            $userManager->insertUser($user);
        } 
        elseif ($_GET) {
            
            echo 'GET';
        }

        $this->render("signUp.php", [], "Sign Up");
    }
}
