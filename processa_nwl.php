<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        // Echo para depuração
        echo "Email recebido: " . $email . "<br>";
        
        try {
            $stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (:email)");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            // Echo mensagem de sucesso
            echo "<script>alert('Inscrição realizada com sucesso!'); window.location.href='index.php';</script>";
            exit();
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "O campo de email está faltando.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
