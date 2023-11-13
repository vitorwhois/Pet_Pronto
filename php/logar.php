<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
  if (strlen($_POST['email']) == 0) {
    echo "preencha seu email";
  } else if (strlen($_POST['senha']) == 0) {
    echo "preencha sua senha";;
  } else {
    //limpa o campo email - contra sql injection
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
    $sql_code = $conn->query($sql_code) or die("falha na execução do código SQL: " . $conn->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
      $usuario = $sql_query->fetch_assoc();

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['user'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Location: index.html");
    } else {
      echo "Falha ao logar! E-mail ou senha incorretos";
    }
  }
}
?>