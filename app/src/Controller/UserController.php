<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Manager\PostManager;
use App\Controller\PostController;
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
                $postManager = new PostManager(new PDOFactory());
                $posts = $postManager->getAllPosts();

                $userManager = new UserManager(new PDOFactory());
                $users = $userManager->getAllUsers();
                $this->render("home.php", ["posts" => $posts, "users" => $users], "Tous les posts");
            }
         
        }

        $this->render("login.php", ["users" => $users], "Tous les users");
    
    }

    #[Route('/logout', 'logout', [])]
    public function logout()
    {
        session_destroy();
        return RedirectToAction("index", "main");
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
