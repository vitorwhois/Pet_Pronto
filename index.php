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
    <div>
        <ul class="navbar-nav d-flex justify-content-end gap-3 text-center py-2 sandwichButton">
            <li class="nav-item">
                <a href="login.php"><button class="btn btn-secondary">Login</button></a>
            </li>
            <li class="nav-item">
                <a href="signup.php" class="btn btn-primary">Cadastrar</a>
            </li>
        </ul>
    </div>        
    </div> 
</nav>

<main>
    <section class="hero">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 d-flex flex-column align-content-center justify-content-center px-3 pt-5 pb-4 p-lg-0 m-lg-0">
                <h1 class="pt-2">Transforme o Cuidado com Seu Pet em uma Experiência Inteligente</h1>
                <p class="pt-2">Descubra uma maneira inovadora de garantir a segurança, saúde e felicidade do seu companheiro.
                    Com a nossa plataforma você estará sempre conectado ao seu animal de estimação, tenha o histórico de saúde do seu pet à mão, onde quer que esteja.</p>
                    <ul class="d-flex gap-3 p-0 pt-2">
                        <li><a href="signup.html" class="btn btn-primary">Cadastrar</a></li>
                        <li><a href="sobre.html" class= "btn btn-secondary flex-nowrap">Saiba mais</a></li>
                    </ul>
            </div>
            <div class="col-md-6 d-flex"><img class="img-fluid" src="img/petPrincipal.png" alt="Cachorro" height="672"></div>
        </div>
    </div>
    </section>

    <section class="mb-5 pb-5">
    <div class="container solucoes">
        <div class="row">
            <div class="col-12 d-flex justify-content-sm-center px-3 pt-5 pb-4  mt-4">
                <h2>Conheça nossas principais soluções</h2>
            </div>
            <div class=" col-md-4 pt-4 pb-4 px-3">
                <h3 class="pt-2 pb-xxl-4">Rastreamento em tempo real</h3>
                <p class="pt-2 pb-xxl-2">"Mantenha-se tranquilo enquanto rastreamos a localização do seu pet em tempo real. Esteja sempre conectado e saiba onde seu companheiro peludo está, oferecendo segurança total em aventuras ao ar livre."</p>
                <img class="img-fluid pt-2" src="img/Image (Replace).png" alt="">
            </div>
            <div class=" col-md-4 pt-4 pb-4 px-3">
                <h3 class="pt-2">Gerenciamento de Saúde Simplificado</h3>
                <p class="pt-2">Cuide da saúde do seu pet facilmente. Registre vacinas, consultas veterinárias e medicamentos de forma organizada. Mantenha um histórico de saúde completo para garantir sempre os melhores cuidados.</p>
                <img class="img-fluid pt-2" src="img/Image (Replace)(1).png" alt="">
            </div>
            <div class=" col-md-4 pt-4 pb-4 px-3">
                <h3 class="pt-2">Alertas e Notificações Personalizada</h3>
                <p class="pt-2">Receba alertas e notificações personalizadas em tempo real. De lembretes de consultas veterinárias a datas de vacinação, nossa plataforma mantém você informado e seu pet em dia com os cuidados necessários.</p>
                <img class="img-fluid pt-2" src="img//Image (Replace)3.png" alt="">
            </div>

        </div>
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