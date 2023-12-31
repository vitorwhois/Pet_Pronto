<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1">
  <title>PetPronto</title>
  <meta name="description" content="Descubra o PetPronto: sua solução completa para cuidar, rastrear e proteger seu pet. Acesse informações de saúde, localize seu companheiro peludo e aproveite descontos exclusivos. Seu melhor amigo merece o melhor, junte-se a nós hoje!">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.9.95/css/materialdesignicons.css" rel="stylesheet">
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
            <a href="planos.php" class="nav-link active" aria-current="page">Planos</a>
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

  <main class="container">
    <section>
      <div>
        <div class="row my-5 py-4">
          <div class=" = col-md-6 pe-md-3 pe-lg-5">
            <img class="img-fluid rounded" src="img/vetwork.jpg" alt="Cachorro" height="672">
          </div>
          <div class="col-md-6 d-flex flex-column align-content-center justify-content-center px-3 pt-3 pt-m-5 pb-m-4 p-lg-0 m-lg-0">
            <h3 class="pt-2">Prontuario smart</h3>
            <p class="pt-2">Tenha todas as informações do seu pet sempre à mão. Colabore eficientemente com seu veterinário, compartilhando dados cruciais de saúde para um cuidado personalizado e imediatamente acessível.</p>
          </div>

        </div>
        <div class="row my-5 py-4 d-flex flex-wrap-reverse">
          <div class="col-md-6 d-flex flex-column align-content-center justify-content-center ps-md-3 ps-lg-5 pt-3">
            <h3 class="pt-2">Notificações Personalizadas</h3>
            <p class="pt-2">Fique por dentro das necessidades do seu pet. Receba notificações personalizadas, desde lembretes de consultas até atualizações de saúde, para que você possa cuidar com confiança.</p>
          </div>
          <div class="col-md-6 d-flex">
            <img class="img-fluid rounded" src="img/phoneAlert.jpg" alt="pessoa recebendo alerta no ceular" height="672">
          </div>
        </div>

        <div class="row my-5 py-4 ">
          <div class="col-md-6 ">
            <img class="img-fluid rounded pe-md-3 pe-lg-5" src="img/lembrete.png" alt="pessoa recebendo alerta no ceular" height="672">
          </div>
          <div class="col-md-6 d-flex flex-column align-content-center justify-content-center pt-3">
            <h3 class="pt-2">Registro de Vacinação e Lembretes</h3>
            <p class="pt-2">Nunca mais perca uma vacina. Registre o histórico de vacinação do seu pet de forma organizada e receba lembretes automáticos para garantir que seu amigo esteja sempre protegido."</p>
          </div>
        </div>
    </section>

    <div class="pricing8 py-5 mt-lg-5 mb-lg-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h3 class="mb-3">Conheça nossos planos</h3>
            <h6>Tenha acesso a atualizações regulares, suporte ao cliente e uma plataforma confiável para cuidar do seu pet. Garanta a segurança, saúde e felicidade do seu companheiro com facilidade.</h6>
          </div>
        </div>
        <!-- row  -->
        <div class="row mt-4">
          <!-- column  -->
          <div class="col-md-4 ml-auto pricing-box align-self-center">
            <div class="card mb-4">
              <div class="card-body p-4 text-center">
                <h5 class="font-weight-normal">Plano mensal</h5>
                <sup>$</sup><span class="text-dark display-5">12,90</span>
                <h6 class="font-weight-light font-14">Mês</h6>
                <p class="mt-4">Comece sua jornada de cuidados com seu pet com nosso Plano Mensal. Cancele a qualquer momento, sem compromissos de longo prazo.</p>
              </div>
              <a class="btn btn-info-gradiant p-3 btn-block border-0 text-white" href="#">ESCOLHER </a>
            </div>
          </div>
          <!-- column  -->
          <!-- column  -->
          <div class="col-md-4 ml-auto pricing-box align-self-center">
            <div class="card mb-4">
              <div class="card-body p-4 text-center">
                <h5 class="font-weight-normal">Plano Semestral</h5>
                <sup>$</sup><span class="text-dark display-5">9,90</span>
                <h6 class="font-weight-light font-14">Mês</h6>
                <p class="mt-4">Economize mais com nosso Plano Semestral. Desfrute de todos os benefícios de monitoramento contínuo por seis meses inteiros.</p>
              </div>
              <a class="btn btn-info-gradiant  p-3 btn-block border-0 text-white" href="#">ESCOLHER </a>
            </div>
          </div>
          <!-- column  -->
          <!-- column  -->
          <div class="col-md-4 ml-auto pricing-box align-self-center">
            <div class="card mb-4 pricing-box-premium">
              <div class="card-body p-4 text-center">
                <h5 class="font-weight-normal">Plano Anual</h5>
                <sup>$</sup><span class="text-dark display-5">6,90</span>
                <h6 class="font-weight-light font-14">Mês</h6>
                <p class="mt-4">A escolha inteligente para pais de pets comprometidos. Fique tranquilo com um ano inteiro de monitoramento contínuo.
                </p>
                <p>Assine agora e ganhe um brinde exclusivo!</p>
              </div>
              <a class="btn btn-info-gradiant p-3 btn-block border-0 text-white" href="#">ESCOLHER</a>
            </div>
          </div>
          <!-- column  -->
        </div>
      </div>
    </div>
  </main>

  <footer class="border-top borda align-items-center align-content-center">
    <div class="container d-flex justify-content-between flex-wrap my-4 py-sm-3 my-sm-4 align-items-center align-content-center" id="footerCell">
      <p class="col-md-4 mb-0 text-mute">Copyright © 2023 Pet Pronto</p>


      <ul class="nav col-md-4 justify-content-center">
        <li class="nav-link"><a href="https://github.com/vitorwhois/Pet_Pronto">Projeto em construção <i class="bi bi-github"></i></a></li>
      </ul>
      <ul class="nav col justify-content-center justify-content-md-end" id="FooterSocial">
        <li><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Linkedin.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Instagram.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Twitter.png" alt=""></svg></a></li>
      </ul>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>