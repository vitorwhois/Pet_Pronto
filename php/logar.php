<?php
include __DIR__ . "/../conexao.php";

if (isset($_POST['email']) && isset($_POST['senha'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $senha = $conn->real_escape_string($_POST['senha']);

  $sql_code = "SELECT * FROM login WHERE email = ?";
  $stmt = $conn->prepare($sql_code);

  if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $quantidade = $result->num_rows;

    if ($quantidade == 1) {
      $usuario = $result->fetch_assoc();
      $_SESSION['id_cliente'] = $usuario['id_cliente'];
      $_SESSION['email'] = $usuario['email'];

      // Verifique a senha usando password_verify
      if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['email'] = $usuario['email'];
        //  $_SESSION['nome'] = $usuario['nome'];

        header("Location: ../perfilusuario.php");
        exit();
      } else {
        header("Location: ../login.php?erro=senha-incorreta");
        exit();
      }
    } else {
      header("Location: ../login.php?erro=email-nao-encontrado");
      exit();
    }

    $stmt->close();
  } else {
    header("Location: ../login.php?erro=preparacao-sql");
    exit();
  }
}
