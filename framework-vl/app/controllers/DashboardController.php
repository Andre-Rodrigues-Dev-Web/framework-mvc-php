<?php
namespace App\Controllers;
use App\Models\HomeModel;
class DashboardController{
    public function index(){
        if (isset($_SESSION['user'])) {
            include 'app/views/dashboard.php';
        } else {
            // Redirecionar para a página de login
            header("Location: login");
            exit;
        }
    }
}
