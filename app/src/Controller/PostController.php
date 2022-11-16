<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;

class PostController extends AbstractController
{


    public function home()
    {
        $postManager = new PostManager(new PDOFactory());
        $posts = $postManager->getAllPosts();

        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();

        

        $this->render("home.php", ["posts" => $posts, "users" => $users], "Tous les posts");
    }
}
