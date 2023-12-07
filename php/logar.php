<?php
include __DIR__ . "/../conexao.php";


if (isset($_POST['email']) && isset($_POST['senha'])) {
  if (strlen($_POST['email']) == 0) {
    echo "Preencha seu e-mail";
  } elseif (strlen($_POST['senha']) == 0) {
    echo "Preencha sua senha";
  } else {
    // Limpa o campo email - contra SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);

    // Prepara a declaração SQL
    $sql_code = "SELECT * FROM cliente WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql_code);

    // Verifica se a preparação da declaração foi bem-sucedida
    if ($stmt) {
      // Liga os parâmetros
      $stmt->bind_param("ss", $email, $senha);

      // Executa a declaração
      $stmt->execute();

      // Obtém o resultado
      $result = $stmt->get_result();
      $quantidade = $result->num_rows;

      if ($quantidade == 1) {
        $usuario = $result->fetch_assoc();

        // Inicia a sessão
        if (!isset($_SESSION)) {
          session_start();
        }

        // Define as variáveis de sessão
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];

        // Redireciona para a página do painel
        header("Location: ../painel.php");
        exit(); // Importante para evitar execução de código adicional após o redirecionamento
      } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
      }

      // Fecha a declaração
      $stmt->close();
    } else {
      echo "Erro na preparação da declaração SQL";
    }
  }
}
