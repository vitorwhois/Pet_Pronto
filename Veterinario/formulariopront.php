<?php
include('verificalogin.php');
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    echo "<h2>Usuário não está logado</h2>";
} else {
    echo "<h2>Bem-vindo, " . $_SESSION['usuario'] . "!</h2>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Substitua isso pela forma correta de obter o ID do pet
    $id_pet = isset($_GET['id']) ? $_GET['id'] : null;

    // Verifica se o ID do pet é válido
    if (!is_numeric($id_pet) || $id_pet <= 0) {
        echo "<p>ID do pet inválido.</p>";
        $conexao->close();
        exit;
    }

    // Verificar se o ID do pet está presente
    if (!$id_pet) {
        echo "ID do pet não fornecido na URL.";
        exit(); // Encerrar o script se o ID não estiver presente
    }

    // Processar os dados do formulário
    $descricao_pronto = $_POST['descricao_pronto'];
    $orientacoes = $_POST['orientacoes'];
    $titulo = $_POST['titulo'];
    $receita_pronto_online = $_POST['receita_pronto_online'];
    $peso_pronto = $_POST['peso_pronto'];

    // Verificar se a chave 'data_alta_pront' existe no array $_POST
    $data_alta_pront_text = isset($_POST['data_alta_pront']) ? $_POST['data_alta_pront'] : null;

    // Formatar a data para o formato do banco de dados (YYYY-MM-DD)
    $data_alta_pront = $data_alta_pront_text ? date('Y-m-d', strtotime($data_alta_pront_text)) : null;

    // Conectar-se ao banco de dados
    $conn = new mysqli("localhost", "root", "", "petpronto");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Iniciar uma transação para garantir que ambas as inserções tenham êxito ou falhem
    $conn->begin_transaction();

    try {
        // Inserir dados na tabela tab_prontuario
        $stmt_prontuario = $conn->prepare("INSERT INTO tab_prontuario (tab_pet_idtab_pet, descricao_pronto, orientacoes, titulo, receita_pronto_online, peso_pronto) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_prontuario->bind_param("issssd", $id_pet, $descricao_pronto, $orientacoes, $titulo, $receita_pronto_online, $peso_pronto);
        $stmt_prontuario->execute();

        // Obter o ID inserido na tabela tab_prontuario
        $id_prontuario = $stmt_prontuario->insert_id;
        $stmt_prontuario->close();

        // Assuming you have started the session in your script
        session_start();

        // Get the veterinarian's ID from the session
        $id_veterinario = isset($_SESSION['id_veterinario']) ? $_SESSION['id_veterinario'] : null;

        // Check if the veterinarian's ID is present in the session
        if (!$id_veterinario) {
            echo "ID do veterinário não fornecido na sessão.";
            exit(); // Terminate the script if the ID is not present
        }

        // Inserir dados na tabela tab_atendimento
        $stmt_atendimento = $conn->prepare("INSERT INTO tab_atendimento (tab_veterinario_idtab_veterinario, tab_prontuario_idtab_prontuario, data_atendimento, data_alta_pront) VALUES (?, ?, NOW(), ?)");
        $stmt_atendimento->bind_param("iis", $id_veterinario, $id_prontuario, $data_alta_pront);
        $stmt_atendimento->execute();
        $stmt_atendimento->close();

        // Commit se tudo ocorrer sem erros
        $conn->commit();

        // Redirecionar para listaprontuarios.php
        header("Location: listaprontuarios.php?id=" . $id_pet);
        exit();
    } catch (Exception $e) {
        // Rollback em caso de erro
        $conn->rollback();

        // Adicionar mensagem de debug
        echo "Erro na inserção do prontuário e atendimento: " . $e->getMessage();
    } finally {
        // Fechar a conexão e as declarações preparadas
        if (isset($stmt_prontuario)) $stmt_prontuario->close();
        if (isset($stmt_atendimento)) $stmt_atendimento->close();
        $conn->close();
    }
}
?>









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
        $id_pet = isset($_GET['id']) ? $_GET['id'] : null;

        // Verifica se o ID do pet é válido
        if (!is_numeric($id_pet) || $id_pet <= 0) {
            echo "<p>ID do pet inválido.</p>";
            $conexao->close();
            exit;
        }

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
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pet" value="id_pet">

                                        <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Titulo</label><input type="text" name="titulo" class="form-control p-1 py-2" placeholder="" value=""></div>
                                        <label class="labels">Peso (kg)</label>
    <input type="text" name="peso_pronto" class="form-control p-1 py-2" placeholder="Informe o peso em kg" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Descrição Sintomas</label>
                                            <textarea class="form-control " name="descricao_pronto" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>

                                            <div class="col-md-12 "><label class="labels">Orientações</label><input type="text" name="orientacoes" class="form-control p-1 py-2" placeholder="" value=""></div>
                                            <div class="col-md-12"><label class="labels">Data atendimento</label><input type="text" name="data_atendimento" class="form-control p-1 py-2" placeholder="" value=""></div>
                                            <div class="col-md-12"><label class="labels">Data alta</label><input type="text" name="data_alta_pront" class="form-control p-1 py-2" placeholder="" value=""></div>
                                            <div class="form-group">
                                            <div class="form-group">
                                            <div class="form-group">
    <label class="mt-4" for="receita_pronto_online">Receita Online</label>
    <textarea class="form-control" name="receita_pronto_online" id="receita_pronto_online" rows="3"></textarea>
</div>


                                        <div class="mt-5 text-center ">
                                            <button class="btn btn-primary profile-button" type="submit">Confirmar</button>
                                        </div>
                                        <div class="mt-3 text-center">

            <?php if (!empty($id_pet)) : ?>
            <a href="listaprontuarios.php?id=<?= $id_pet ?>" class="btn btn-primary mb-2">Voltar</a>
            <?php endif; ?>
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

