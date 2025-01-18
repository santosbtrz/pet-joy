<?php
$host = 'localhost'; // substitua pelo host do seu banco de dados
$db = 'petjoy'; // substitua pelo nome do seu banco de dados
$user = 'root'; // substitua pelo seu nome de usuário do MySQL
$password = ''; // substitua pela sua senha do MySQL

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

$conn->close();
?>
