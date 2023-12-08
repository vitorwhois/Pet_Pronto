<?php
include __DIR__ . "/../conexao.php";

if (isset($_POST['email']) && isset($_POST['senha'])) {
  echo "Formulário de Login Recebido<br>";

  $email = $conn->real_escape_string($_POST['email']);
  $senha = $conn->real_escape_string($_POST['senha']);

  echo "E-mail: $email<br>";
  echo "Senha: $senha<br>";

  $sql_code = "SELECT * FROM login WHERE email = ?";
  $stmt = $conn->prepare($sql_code);

  if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $quantidade = $result->num_rows;

    if ($quantidade == 1) {
      $usuario = $result->fetch_assoc();

      // Verifique a senha usando password_verify
      if (password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: ../painel.php");
        exit();
      } else {
        echo "Falha ao logar! Senha incorreta";
      }
    } else {
      echo "Falha ao logar! E-mail não encontrado";
    }

    $stmt->close();
  } else {
    echo "Erro na preparação da declaração SQL";
  }
}
