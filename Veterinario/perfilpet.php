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
<?php
// perfilpet.php
include('verificalogin.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petpronto";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Execute a consulta SQL usando o ID do pet
$idPet = isset($_GET['id']) ? $_GET['id'] : null;

// Execute a consulta SQL usando o ID do pet
try {
    if (!is_null($idPet)) {
        $sql = "SELECT tab_pet.*, tab_cliente.email_cli, tab_cliente.nome_cli
                FROM tab_pet 
                INNER JOIN tab_cliente ON tab_pet.tab_cliente_cpf_cli = tab_cliente.cpf_cli 
                WHERE idtab_pet = " . $idPet;
                
        $resultado = $conn->query($sql);

        // Verifique se há resultados
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();

            // Atribua os valores às variáveis correspondentes
            $nome_pet = $row['nome_pet'];
            $registro_pet = $row['registro_pet'];
            $dono_pet = $row['nome_cli']; // Agora usa o e-mail do cliente como dono do pet
            $raca_pet = $row['raca_pet'];
            $porte_pet = $row['porte_pet'];
            $email_cliente = $row['email_cli'];
        }
    }
} catch (Exception $e) {
    // Exiba mensagens de erro
    echo 'Erro: ' . $e->getMessage();
}

// Fechar a conexão
$conn->close();
?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Consultar o banco de dados para verificar as credenciais
    $sql = "SELECT tab_veterinario_idtab_veterinario FROM tab_loginvet WHERE usuario_vet = ? AND senha = ?";
    
    // Usar prepared statements para evitar SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Login bem-sucedido
        $_SESSION["usuario_vet"] = $usuario;  // Pode armazenar mais informações na sessão se necessário
        header("Location: listaprontuarios.php?id=" . $idPet);  // Redirecionar para a página de prontuários
        exit(); // Certifique-se de encerrar o script após redirecionamento
    } else {
        // Login falhou
        echo "Credenciais inválidas";
    }
}

// Aqui começa a parte do código que só será executada se o veterinário estiver logado
if (isset($_SESSION['usuario_vet'])) :
    // Seu código existente aqui
?>
<!-- HTML, etc. -->
<?php endif; ?>
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
                <div class="container rounded  mt-0 mb-4 borders-4 " >
                    <div class="row">
                    <div class="col-md-3 border-right">
    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <img class="rounded-circle mt-5" width="130px" src="img/petPig.jpg">
        <span class="font-weight-bold"><?= isset($nome_pet) ? $nome_pet : '' ?></span>
        <span class="text-black-50"><?= isset($email_cliente) ? $email_cliente : '' ?></span>
    </div>
</div>


                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Perfil</h4>
                                </div>
                                <div class="row mt-3">
    <div class="col-md-12">
        <label class="labels">Nome_pet</label>
        <span id="nome_pet" class="form-control"><?= isset($nome_pet) ? $nome_pet : '' ?></span>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label class="labels">Registro_pet</label>
        <span id="registro_pet" class="form-control"><?= isset($registro_pet) ? $registro_pet : '' ?></span>
    </div>
    <div class="col-md-12">
        <label class="labels">Dono_pet (esta na tab_cli)</label>
        <span id="dono_pet" class="form-control"><?= isset($dono_pet) ? $dono_pet : '' ?></span>
    </div>
    <div class="col-md-12">
        <label class="labels">Raça_pet</label>
        <span id="raca_pet" class="form-control"><?= isset($raca_pet) ? $raca_pet : '' ?></span>
    </div>
    <div class="col-md-12">
        <label class="labels">Porte_pet</label>
        <span id="porte_pet" class="form-control"><?= isset($porte_pet) ? $porte_pet : '' ?></span>
    </div>
</div>
                                <div class="mt-5 text-center"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        </div>    
                </div>
            </div>
            
            <div class="p-5">
            <section>
              <div class="d-flex justify-content-between align-items-center"></div>>
 <!-- Título destacado -->
 <h4 class="text-center mb-4" style="color: #000; font-weight: bold; font-size: 28px;">Prontuários</h4>

              <div class="row justify-content-center">
        
                <div class="col-sm-3">
                <div class="card card-block">
                    <h4 class="card-title">Prontuarios</h4>
                    <div class="card-block">
                      <img class="card-img-top pt-0 pb-2" data-src="holder.js/100px180/" alt="100%x180" src="img/imagekley.png" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                    <p class="card-text"></p>

                    <?php if (!empty($idPet)) : ?>
                        
    <a href="listaprontuarios.php?id=<?= $idPet ?>" class="btn btn-primary mb-2">Ver</a>
<?php endif; ?>

                    
                  </div>
                  </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-block">
                        <h4 class="card-title">Vacinas</h4>
                        <div class="card-block">
                          <img class="card-img-top  pt-0 pb-2" data-src="holder.js/100px180/" alt="100%x180" src="img/vacina_caes_widexl.png" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                        <p class="card-text"></p>
                        <?php if (!empty($idPet)) : ?>
                        
                        <a href="listavacinas.php?id=<?= $idPet ?>" class="btn btn-primary mb-2">Ver</a>
                    <?php endif; ?>
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