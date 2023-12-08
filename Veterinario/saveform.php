<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $entidade = $_POST['entidade'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];




    $sql = "INSERT INTO cliente (nome, sobrenome, entidade, cpf, cep, logradouro, numero, complemento, cidade, estado, telefone ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $nome, $sobrenome, $entidade, $cpf, $cep, $logradouro, $numero, $complemento, $cidade, $estado, $telefone);

    if ($stmt->execute()) {
        header("Location: index.html");
    } else {
        echo "Erro: " - $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
