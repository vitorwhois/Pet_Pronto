<?php

// Verificar se o formulário foi enviado
include('verificalogin.php');
$id_pet = isset($_GET['id_pet']) ? $_GET['id_pet'] : null;

// Adicione esta linha para depuração


// Verificar se o ID do pet é válido
if (!is_numeric($id_pet) || $id_pet <= 0) {
    echo "<p>ID do pet inválido.</p>";
    exit;
}

// Processar os dados do formulário
$data_aplicacao_vacina = isset($_POST['data_aplicacao_vacina']) ? $_POST['data_aplicacao_vacina'] : null;
$proxima_dose = isset($_POST['proxima_dose']) ? $_POST['proxima_dose'] : null;
$id_vacina = isset($_POST['id_vacina']) ? $_POST['id_vacina'] : null;

// Verificar se os dados do formulário estão presentes
if ($data_aplicacao_vacina !== null && $proxima_dose !== null && $id_vacina !== null) {
    // Conectar-se ao banco de dados
    $conn = new mysqli("localhost", "root", "", "petpronto");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Iniciar transação
    $conn->begin_transaction();

    try {
        // Inserir dados na tabela tab_dataaplicacaovacina
        $stmt_vacina = $conn->prepare("INSERT INTO tab_dataaplicacaovacina (tab_prontuario_idtab_prontuario, tab_vacina_idtab_vacina, data_aplicacao, proxima_dose) VALUES (?, ?, STR_TO_DATE(?, '%Y/%m/%d'), STR_TO_DATE(?, '%Y/%m/%d'))");
        $stmt_vacina->bind_param("iiss", $id_pet, $id_vacina, $data_aplicacao_vacina, $proxima_dose);
        $stmt_vacina->execute();
        $stmt_vacina->close();

        // Commit da transação
        $conn->commit();

        // Redirecionar para listavacinas.php
        header("Location: listavacinas.php?id=" . $id_pet);
        exit();
    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $conn->rollback();

        // Exibir mensagem de erro
        echo "Erro durante a inserção: " . $e->getMessage();
    } finally {
        // Fechar a conexão
        $conn->close();
    }
}
?>

<!-- Formulário de Registro de Vacina -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPronto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
</head>
<body>
    <div class="container d-flex justify-content-between align-items-center my-2" id="navtop">
        <ul class="nav justify-content-around gap-4">
        <li><i class="bi bi-envelope"></i><a class="ms-1" href="mailto:contato@petpronto.com.br">contact@petpronto.com.br</a></li>
        <li><i class="bi bi-whatsapp"></i><a class="ms-1" href="https://wa.me//5511990908080?text=Tenho%20interesse%20em%20saber%20mais%20sobre%20o%20PetPronto">(11) 99090-8080</a></li>
        </ul>
    
    <ul class="nav col-md-4 justify-content-end d-none d-md-flex">
        <li class="ms-3"><a class="" href=""><img src="img/icons/Facebook.png" alt=""></a></li>
        <li class="ms-3"><a class=""><img src="img/icons/Instagram.png" alt=""></a></li>
        <li class="ms-3"><a class=""><img src="img/icons/Twitter.png" alt=""></a></li>
    
    </ul>
    </div>
    
    <nav class="navbar navbar-expand-lg border-bottom borda sticky-top " id="navbar" style="background-color: white ;">
    
        <div class="container py-3 text-center">
            <a href="index.html"><img class="navbar-brand" src="img/Logo.png" alt="logo" width="70px"></a>
    
    
            <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbar-items" 
            aria-controls="navbar-items"
            aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar-items">
            <ul class="navbar-nav mb-2 mb-lg-0 py-2 ">
                <li class="nav-link">
                    <a href="index.html" class="nav-link active" aria-current="page">Inicio</a>
                </li>
                <li class="nav-link">
                    <a href="sobre.html" class="nav-link ">Sobre</a>
                </li>
                <li class="nav-link">
                    <a href="planos.html" class="nav-link">Planos</a>
                </li>
                <li class="nav-link">
                    <a href="contato.html" class="nav-link">Contato</a>
                </li>
            </ul>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/icone usuario.png" alt="" width="20" height="20">
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="perfilvet.php">Meus dados</a></li>
                        <li><a class="dropdown-item" href="encerrarsessao.php">Sair</a></li>
              </ul>  
            </div>   
        </div> 
    </nav>
<div class="row">
<div class="col-xl-12 col-md-12 col-sm-11 mx-auto py-1 ">

        <!-- Profile widget -->
        <div class="verde shadow rounded overflow-hidden " >
            <div class="px-4 pt-0 pb-2 rosa">

            <div class="p-5">
                <section>
                    <div class="d-flex justify-content-between align-items-center"></div>>
                    <main class="container pt-5">
                    <div class="row">
                    <div class="col-md-4 align-items-center">
                    <div class="col-md-12 d-flex flex-column align-items-center text-center p-3 py-5">
                   
        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

        <?php

        // Conexão com o banco de dados (substitua com suas configurações)
        $conexao = new mysqli("localhost", "root", "", "petpronto");

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Obtém o ID do pet da URL

        // Consulta SQL para obter o nome do pet pelo ID
        $consultaNome = "SELECT nome_pet FROM tab_pet WHERE idtab_pet = ?";
        $stmt = $conexao->prepare($consultaNome);
        $stmt->bind_param("i", $id_pet);
        $stmt->execute();
        $resultadoNome = $stmt->get_result();

        // Exibe o nome do pet
        if ($resultadoNome->num_rows > 0) {
            $nomePet = $resultadoNome->fetch_assoc()['nome_pet'];
            echo "<p>Nome: " . htmlspecialchars($nomePet) . "</p>";
        } else {
            echo "<p>Nenhum pet encontrado com o ID fornecido.</p>";
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
        ?>
    </div>
                    </div>
                    <div class="col-md-5 ">
                        <div class="p-3 py-5">
                            </div>
                            <div class="col-md-12 ">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        </div>
                                        <h4 class="text-right">Perfil</h4>
                                    </div>
 <!-- Formulário de Registro de Vacina -->
<form action="" method="post">
    <input type="hidden" name="id_pet" value="<?= $id_pet ?>">

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="labels">Data Aplicação</label>
            <input type="text" name="data_aplicacao_vacina" class="form-control p-1 py-2" placeholder="Informe a data de aplicação" value="">
        </div>
        <div class="col-md-12">
            <label class="labels">Próxima Dose</label>
            <input type="text" name="proxima_dose" class="form-control p-1 py-2" placeholder="Informe a próxima dose" value="">
        </div>
        <div class="col-md-12">
            <label class="labels">Escolha a Vacina</label>
            <select name="id_vacina" class="form-control p-1 py-2">
                <?php
                // Conectar-se ao banco de dados
                $conn = new mysqli("localhost", "root", "", "petpronto");

                // Verificar a conexão
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Consultar as vacinas da tabela tab_vacina
                $result = $conn->query("SELECT idtab_vacina, titulo_vacina FROM tab_vacina");

                // Verificar se há resultados
                if ($result->num_rows > 0) {
                    // Loop através dos resultados e exibir opções do menu suspenso
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"{$row['idtab_vacina']}\">{$row['titulo_vacina']}</option>";
                    }
                }

                // Fechar a conexão
                $conn->close();
                ?>
            </select>
        </div>
    </div>

    <div class="mt-5 text-center">
        <button class="btn btn-primary profile-button" type="submit">Confirmar Vacina</button>
    </div>

    <div class="mt-3 text-center">
        <?php if (!empty($id_pet)) : ?>
            <a href="listavacinas.php?id=<?= $id_pet ?>" class="btn btn-primary mb-2">Voltar</a>
        <?php endif; ?>
    </div>
</form>

                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
            </div>
        </div>
                      </div>
                      </div>
                    </div>
                </div>


        

            </div>
        </div>
    </div>
</div>
<footer class="border-top borda align-items-center align-content-center">
    <div class="container d-flex justify-content-between flex-wrap my-4 py-sm-3 my-sm-4 align-items-center align-content-center" id="footerCell">
      <p class="col-md-4 mb-0 text-mute">Copyright © 2023 Pet Pronto</p>


    <ul class="nav col-md-4 justify-content-center">       
      <li class="nav-link"><a href="">Inicio</a></li>
      <li class="nav-link"><a href="">Sobre</a></li>
      <li class="nav-link"><a href="">Planos</a></li>
      <li class="nav-link"><a href="">Contato</a></li>
      </ul>
    <ul class="nav col justify-content-center justify-content-md-end" id="FooterSocial">
      <li ><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Facebook.png" alt=""></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Instagram.png" alt=""></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Twitter.png" alt=""></svg></a></li>
    </ul>
   </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>


