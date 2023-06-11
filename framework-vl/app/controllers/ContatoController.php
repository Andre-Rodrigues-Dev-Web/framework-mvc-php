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
            // Lógica de processamento do formulário

            // Obter dados do formulário
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];

            // Validar os campos do formulário (exemplo)

            // Enviar e-mail
            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com'; // Configurar o host SMTP do seu provedor de e-mail
                $mail->Port = 587; // Configurar a porta SMTP do seu provedor de e-mail
                $mail->SMTPAuth = true;
                $mail->Username = 'seu_email@example.com'; // Configurar seu endereço de e-mail
                $mail->Password = 'sua_senha'; // Configurar sua senha de e-mail
                $mail->setFrom('seu_email@example.com', 'Seu Nome'); // Configurar o endereço de e-mail e o nome remetente
                $mail->addAddress('andrelaurentinomg@gmail.com'); // Configurar o endereço de e-mail do destinatário
                $mail->Subject = 'Mensagem do formulário de contato';
                $mail->Body = "Nome: $nome\n\nE-mail: $email\n\nMensagem: $mensagem";
                $mail->send();

                // Redirecionar para uma página de sucesso
                header('Location: contato');
                exit;
            } catch (Exception $e) {
                // Tratar erros no envio de e-mail
                echo 'Erro ao enviar e-mail: ' . $mail->ErrorInfo;
            }
        }

        // Renderiza o template view/contato.php
        include 'app/views/contato.php';
    }
}
