<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->sanitizeInput($_POST['email']);
            $senha = $this->sanitizeInput($_POST['password']);

            $this->handleLogin($email, $senha);
        } else {
            include 'app/views/login.php';
        }
    }

    public function handleLogin($email, $senha)
    {
        $login = new Login($email, $senha, $this->db);
        if ($login->isValid()) {
            session_start();
            $_SESSION['user'] = [
                'email' => $email,
            ];

            header("Location: dashboard");
        } else {
            header("Location: login");
            exit;
        }
    }

    private function sanitizeInput($input)
    {
        $sanitizedInput = trim($input);
        $sanitizedInput = stripslashes($sanitizedInput);
        $sanitizedInput = htmlspecialchars($sanitizedInput);

        return $sanitizedInput;
    }
}
