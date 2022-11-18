<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;


class PostController extends AbstractController
{
    
    #[Route('/', 'home', ['GET'])]
    public function home()
    {
        
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();

        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();

        $this->render("home.php", ["posts" => $posts, "users" => $users], "Tous les posts");
    }
}
