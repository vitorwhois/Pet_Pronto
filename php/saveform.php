<?php
require_once "../conexao.php";
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $entidade = $_POST['entidade'];
    $cpf = $_POST['cpfCnpj'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];

    // Recupera o id_cliente da sessão ou de onde você o obtém
    $id_cliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : null;

    // Verifica se o id_cliente existe na tabela login
    $check_sql = "SELECT id_cliente FROM login WHERE id_cliente = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $id_cliente);
    $check_stmt->execute();
    $check_stmt->store_result();

    // Se o id_cliente não existir, redireciona ou trata o erro conforme necessário
    if ($check_stmt->num_rows == 0) {
        echo "Erro: id_cliente não encontrado na tabela login.";
        exit;
    }

    // Prepara a inserção na tabela cliente
    $insert_sql = "INSERT INTO cliente (id_cliente, nome, sobrenome, entidade, cpf, cep, logradouro, numero, complemento, cidade, estado, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("isssssssssss", $id_cliente, $nome, $sobrenome, $entidade, $cpf, $cep, $logradouro, $numero, $complemento, $cidade, $estado, $telefone);

    // Executa a inserção na tabela cliente
    if ($insert_stmt->execute()) {
        header("Location: ../perfilusuario.php");
    } else {
        echo "Erro: " . $insert_stmt->error;
    }

    // Fecha as instruções preparadas
    $check_stmt->close();
    $insert_stmt->close();
}

// Fecha a conexão
$conn->close();
