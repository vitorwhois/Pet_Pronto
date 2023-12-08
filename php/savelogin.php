<?php
require_once "../conexao.php";

if (!isset($_SESSION)) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);



    $sql = "INSERT INTO login (email, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        $id_cliente = $conn->insert_id;
        $_SESSION['id_cliente'] = $id_cliente;

        header("Location: ../register.php");
    } else {
        echo "Erro: " - $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
