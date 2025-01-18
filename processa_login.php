<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = htmlspecialchars(trim($_POST['senha']));

    $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindParam(':email', $email);
    $sql->execute();

    if ($sql->rowCount() == 1) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['nome'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.html?erro=1");
            exit();
        }
    } else {
        header("Location: login.html?erro=1");
        exit();
    }
}
?>

