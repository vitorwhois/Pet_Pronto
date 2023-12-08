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

    // Lida com o upload da foto
    if (isset($_FILES['foto'])) {
        $foto_nome = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $foto_destino = "../img/cliente/pet" . uniqid() . "." . pathinfo($foto_nome, PATHINFO_EXTENSION);

        // Move a foto para o destino desejado
        move_uploaded_file($foto_temp, $foto_destino);

        // Salva o caminho/nome da foto no banco de dados se necessário
        $foto_caminho_no_banco = $foto_destino;
    } else {
        // Se não houver upload de foto, mantenha o valor existente no banco de dados
        $foto_caminho_no_banco = null;
    }

    // Prepara a atualização na tabela cliente
    $update_sql = "UPDATE cliente SET nome=?, sobrenome=?, entidade=?, cpf=?, cep=?, logradouro=?, numero=?, complemento=?, cidade=?, estado=?, telefone=?, foto=? WHERE id_cliente=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssssssssssi", $nome, $sobrenome, $entidade, $cpf, $cep, $logradouro, $numero, $complemento, $cidade, $estado, $telefone, $foto_caminho_no_banco, $id_cliente);

    // Executa a atualização na tabela cliente
    if ($update_stmt->execute()) {
        header("Location: ../perfilusuario.php");
    } else {
        echo "Erro: " . $update_stmt->error;
    }

    // Fecha as instruções preparadas
    $check_stmt->close();
    $update_stmt->close();
}

// Fecha a conexão
$conn->close();
