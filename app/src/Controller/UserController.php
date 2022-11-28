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

            $user = $userManager->getByUsername($_GET['username'], $_GET['password']);

            if (isset($user)){

                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['admin'] = $user->getIsAdmin();
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
        
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();

        $this->render("home.php", ["posts" => $posts], "Home");
    }

    #[Route('/signUp', 'signUp', ['GET', 'POST'])]
    public function signUp()
    {
        $userManager = new UserManager(new PDOFactory());
        if ($_POST) {
            
           
            $user = new User($_POST);
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['admin'] = $user->getIsAdmin();
            $userManager->insertUser($user);

            
            $postManager = new PostManager(new PDOFactory());
            $posts = $postManager->getAllPosts();

            $userManager = new UserManager(new PDOFactory());
            $users = $userManager->getAllUsers();

            $this->render("home.php", ["posts" => $posts, "users" => $users], "Tous les posts");
        } 
        elseif ($_GET) {
            
            echo 'GET';
        }

        $this->render("signUp.php", [], "Sign Up");
    }
}
