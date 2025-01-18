<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['message']);

    $assuntos = [
        'duvida' => 'Dúvida',
        'elogio' => 'Elogio',
        'reclamacao' => 'Reclamação',
        'sugestao' => 'Sugestão',
        'veterinario' => 'Serviços Veterinários',
        'assistencia' => 'Assistência',
        'outros' => 'Outros'
    ];

    if (array_key_exists($assunto, $assuntos)) {
        $assunto_texto = $assuntos[$assunto];
    

    
    if (!empty($nome) && !empty($email) && !empty($assunto) && !empty($mensagem) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'assist.petjoy@gmail.com';
            $mail->Password = 'nyjiuqvuoygeqwcm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('assist.petjoy@gmail.com', 'PET.JOY');
            $mail->addAddress('assist.petjoy@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "FORMULÁRIO RECEBIDO: $assunto_texto";
            $mail->Body = "Nome: $nome<br>Email: $email<br>Assunto: $assunto<br>Mensagem:<br>$mensagem";
            $mail->AltBody = "Nome: $nome\nEmail: $email\nAssunto: $assunto_texto\nMensagem:\n$mensagem";

            $mail->send();
            echo 'E-mail enviado com sucesso.';
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        echo "Dados inválidos.";
    }
} else {
    echo "Método de envio inválido.";
}
}
?>
