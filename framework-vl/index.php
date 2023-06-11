<?php
require_once 'vendor/autoload.php';
$db = require_once 'conn/db.php';

$models = glob(__DIR__ . '/app/models/*.php');
foreach ($models as $model) {
    require_once $model;
}

use App\Controllers\HomeController;
use App\Controllers\SobreNosController;
use App\Controllers\ContatoController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\LogoutController;
function includeView($name)
{
    $file = __DIR__ . '/app/includes/' . $name . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        echo 'Arquivo de inclusão não encontrado: ' . $name;
    }
}

session_start();

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$rotas = [
    'home' => HomeController::class,
    'sobrenos' => SobreNosController::class,
    'contato' => ContatoController::class,
    'login' => LoginController::class,
    'dashboard' => DashboardController::class,
    'logout' => LogoutController::class,
];

if (array_key_exists($url, $rotas)) {
    $controlador = $rotas[$url];
    if (is_callable($controlador)) {
        $controlador();
    } else {
        $objetoControlador = new $controlador($db);
        $objetoControlador->index();
    }
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Página não encontrada';
}
