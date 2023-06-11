<?php
namespace App\Controllers;
use App\Models\HomeModel;
class HomeController{
    private $model;

    public function __construct($db){
        $this->model = new HomeModel($db);
    }

    public function index(){
        $noticias = $this->model->getNoticias();
        include 'app/views/home.php';
    }
}
