<?php

namespace App\Core;

class Application
{
    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $uri = explode('/', $uri);
        
        $controllerName = isset($uri[0]) && !empty($uri[0]) ? ucfirst($uri[0]) . 'Controller' : 'HomeController';
        $action = isset($uri[1]) && !empty($uri[1]) ? $uri[1] : 'index';

        $controllerClass = "App\\Controllers\\{$controllerName}";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                $this->render('404');
            }
        } else {
            $this->render('404');
        }
    }

    protected function render($view)
    {
        $viewPath = './views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo 'View not found: ' . $view;
        }
    }
}
