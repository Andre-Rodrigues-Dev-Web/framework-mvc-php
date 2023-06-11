<?php

namespace App\Models;

class Login
{
    private $db;
    private $email;
    private $senha;

    public function __construct($email, $senha, $db)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->db = $db;
    }

    public function isValid(){
        $query = "SELECT * FROM login WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row && password_verify($this->senha, $row['senha'])) {
            session_start();
            $_SESSION['user'] = [
                'email' => $row['email'],
                'nome' => $row['nome'], 
            ];
            return true;
        } else {
            return false;
        }
    }
}
