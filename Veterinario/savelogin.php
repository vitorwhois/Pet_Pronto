<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);



    $sql = "INSERT INTO cliente (email, senha) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: register.html");
    } else {
        echo "Erro: " - $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
