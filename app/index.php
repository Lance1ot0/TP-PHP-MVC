<?php

// use App\Factory\PDOFactory;
// use App\Manager\UserManager;
use App\Controller\PostController;

require_once 'vendor/autoload.php';

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

switch ($url) {
    case "/":
        $controller = new PostController();
        $controller->home();
        break;



    default:
        throw new Exception("RIEN TROUVE !");
}
