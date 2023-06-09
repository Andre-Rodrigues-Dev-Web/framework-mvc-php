<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        // Aqui você pode adicionar a lógica para exibir a página inicial
        $this->render('home');
    }

    protected function render($view)
    {
        $viewPath = '../views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo 'View not found: ' . $view;
        }
    }
}
