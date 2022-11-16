<?php

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $view, array $args = [], string $title = "Document")
    {
        $view = dirname(__DIR__, 2) . '/src/Views/' . $view;
        $base = dirname(__DIR__, 2) . '/src/Views/base.php';

        ob_start();
        foreach ($args as $key => $value) {
            $$key = $value;
        }

        require_once $view;
        $_pageContent = ob_get_clean();
        $_pageTitle = $title;
      


        require_once $base;
    }
}
