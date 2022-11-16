<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;

class PostController extends AbstractController
{


    public function home()
    {
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();
        

        $this->render("home.php", ["posts" => $posts], "Tous les posts");
    }
}
