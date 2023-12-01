<?php
include __DIR__ . "/../conexao.php";

if (isset($_POST['email']) || isset($_POST['senha'])) {
  if (strlen($_POST['email']) == 0) {
    echo "preencha seu email";
  } else if (strlen($_POST['senha']) == 0) {
    echo "preencha sua senha";;
  } else {
    //limpa o campo email - contra sql injection
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    $quantidade = $result->num_rows;

    if ($quantidade == 1) {
      $usuario = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['user'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Location: ../painel.php");
    } else {
      echo "Falha ao logar! E-mail ou senha incorretos";
    }
  }
}
