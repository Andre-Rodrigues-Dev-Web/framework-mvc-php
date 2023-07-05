<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContatoController
{
    public function index()
    {
        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];

            // Enviar e-mail
            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com';
                $mail->Port = 587; 
                $mail->SMTPAuth = true;
                $mail->Username = 'seu_email@example.com'; 
                $mail->Password = 'sua_senha'; 
                $mail->setFrom('seu_email@example.com', 'Seu Nome'); 
                $mail->addAddress('andrelaurentinomg@gmail.com'); 
                $mail->Subject = 'Mensagem do formulário de contato';
                $mail->Body = "Nome: $nome\n\nE-mail: $email\n\nMensagem: $mensagem";
                $mail->send();

                header('Location: contato');
                exit;
            } catch (Exception $e) {
                echo 'Erro ao enviar e-mail: ' . $mail->ErrorInfo;
            }
        }
        include 'app/views/contato.php';
    }
}
