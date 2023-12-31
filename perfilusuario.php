<?php
session_start();

// Verifique se 'id_cliente' está definido na sessão
if (!isset($_SESSION['id_cliente'])) {
  echo "ID do cliente não está definido na sessão. Conteúdo da sessão:";
  var_dump($_SESSION);
  exit();  // Encerre a execução do script
}

// Obtém o caminho completo para conexao.php
include __DIR__ . "/conexao.php";

// Pega o id_cliente da sessão
$id_cliente = $_SESSION['id_cliente'];

// Prepara e executa a consulta SQL
$sql = "SELECT * FROM cliente WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$result = $stmt->get_result();

// Obtém os dados do cliente
$cliente = $result->fetch_assoc();

// Fecha a declaração
$stmt->close();

// Verifica se a consulta retornou dados
if ($cliente) {
  // Obter os dados de login associados a este cliente
  $sqlLogin = "SELECT * FROM login WHERE id_cliente = ?";
  $stmtLogin = $conn->prepare($sqlLogin);
  $stmtLogin->bind_param("i", $id_cliente);
  $stmtLogin->execute();
  $resultLogin = $stmtLogin->get_result();

  // Obtém os dados de login
  $login = $resultLogin->fetch_assoc();

  // Fecha a declaração
  $stmtLogin->close();
} else {
  // Se o cliente não for encontrado, redirecionar
  header("Location: login.php");
  echo "cliente nao econtrado";
  exit();
}

// Define a foto padrao do cliente
$foto_cliente = !empty($cliente['foto']) ? $cliente['foto'] : 'img/cliente/avatar-padrao.png';

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1">
  <title>PetPronto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
  <meta name="google-site-verification" content="AJPTi5rjZ0zTw-6RKsx0SsQKygpG7xSAZtrWjuG1Y7c" />
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

  <nav class="navbar navbar-expand-lg border-bottom borda sticky-top" id="navbar">

    <div class="container py-3 text-center">
      <a href="index.php"><img class="navbar-brand" src="img/Logo.png" alt="logo" width="70px"></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbar-items" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbar-items">
        <ul class="navbar-nav mb-2 mb-lg-0 py-2 ">
          <li class="nav-link">
            <a href="index.php" class="nav-link">Inicio</a>
          </li>
          <li class="nav-link">
            <a href="sobre.php" class="nav-link ">Sobre</a>
          </li>
          <li class="nav-link">
            <a href="planos.php" class="nav-link">Planos</a>
          </li>
          <li class="nav-link">
            <a href="contato.php" class="nav-link">Contato</a>
          </li>
        </ul>
        <div>
          <ul class="navbar-nav d-flex justify-content-end gap-3 text-center py-2 sandwichButton">
            <?php
            if (isset($_SESSION['id_cliente'])) {
              // Usuário está logado
              echo '<li class="nav-item"><a href="perfilusuario.php" class="btn btn-primary">Perfil</a></li>';
              echo '<li class="nav-item"><a href="logout.php" class="btn btn-secondary">Logout</a></li>';
            } else {
              // Usuário está deslogado
              echo '<li class="nav-item"><a href="login.php" class="btn btn-secondary">Login</a></li>';
              echo '<li class="nav-item"><a href="signup.php" class="btn btn-primary">Cadastrar</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
  </nav>

  <main>
    <section class=" container-fluid bg-secondary mb-5 pb-lg-3">
      <section>
        <div class="container py-5">

          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="<?php echo $foto_cliente; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3"><?php echo $cliente['nome']; ?></h5>

                  <div class="d-flex justify-content-center mb-2 mt-2">
                    <a href="altregister.php"><button type="button" class="btn btn-secondary ms-1">Alterar</button></a>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg "></i>
                      <h6 class="mb-0">Alertas</h6>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg"></i>
                      <p class="mb-0">05/09/2023</p>
                      <p class="mb-0">13:00</p>
                      <p class="mb-0">Castracao</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg"></i>
                      <p class="mb-0">10/11/2023</p>
                      <p class="mb-0">10:30</p>
                      <p class="mb-0">Vacina</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg"></i>
                      <p class="mb-0">12/11/2023</p>
                      <p class="mb-0">12:00</p>
                      <p class="mb-0">Tosa</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg"></i>
                      <p class="mb-0"> <a href="#" class="btn btn-secondary">Alterar alertas</a></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nome</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['nome'] . ' ' . $cliente['sobrenome']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cpf</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['cpf']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $login['email']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Telefone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['telefone']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cep</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['cep']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Endereço</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['logradouro']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Numero</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['numero']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Complemento</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['complemento']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cidade</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $cliente['cidade']; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Observações</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Informações importantes para o usuario adicionar.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>

    <section class="container">
      <div class=" row mt-5 mb-4 pt-2">
        <div class="col-md-6 d-flex justify-content-center ">
        </div>
        <h3 class=" text-center pb-4">Meus Pets</h3>
        <div class="input-group col-md-6 d-flex justify-content-center mb-5 ">
          <div class="form-outline">
            <input id="search-input" type="search" id="form1" class="form-control" />
          </div>
          <button id="search-button" type="button" class="btn btn-primary">Pesquisar
          </button>
        </div>

      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4 mb-4 pb-md-3">
        <div class="col">
          <div class="card h-100">
            <img src="img/meupetdog01.jpeg" class="card-img-top" alt="Hollywood Sign on The Hill" />
            <div class="card-body">
              <h5 class="card-title">Jujuba</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="img/meupetdog02.jpeg" class="card-img-top" alt="Palm Springs Road" />
            <div class="card-body">
              <h5 class="card-title">Pepeu</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="img/meupetgato.jpeg" class="card-img-top" alt="Los Angeles Skyscrapers" />
            <div class="card-body">
              <h5 class="card-title">Zorro</h5>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <a href=""><img src="img/meupetdog-3.jpeg" class="card-img-top" alt="Skyscrapers" /></a>
            <div class="card-body">
              <h5 class="card-title">Juju</h5>

            </div>
          </div>
        </div>
      </div>
      <div class=" row m4-5 mb-5 pb-2  pb-lg-5 justify-content-center">
        <div class=" ">
        </div>
        <a class="col-3  btn btn-primary">Cadastrar Pet</a>
      </div>
    </section>
  </main>

  <footer class="border-top borda align-items-center align-content-center">
    <div class="container d-flex justify-content-between flex-wrap my-4 py-sm-3 my-sm-4 align-items-center align-content-center" id="footerCell">
      <p class="col-md-4 mb-0 text-mute">Copyright © 2023 Pet Pronto</p>


      <ul class="nav col-md-4 justify-content-center">
        <li class="nav-link"><a href="https://github.com/vitorwhois/Pet_Pronto">Projeto em construção <i class="bi bi-github"></i></a></li>
      </ul>
      <ul class="nav col justify-content-center justify-content-md-end" id="FooterSocial">
        <li><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Facebook.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Instagram.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Twitter.png" alt=""></svg></a></li>
      </ul>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>