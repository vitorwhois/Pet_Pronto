<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1">
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

  <nav class="navbar navbar-expand-lg border-bottom borda sticky-top" id="navbar" style="background-color: white ;">

    <div class="container py-3 text-center">
      <a href="index.php"><img class="navbar-brand" src="img/Logo.png" alt="logo" width="70px"></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbar-items" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbar-items">
        <ul class="navbar-nav mb-2 mb-lg-0 py-2 ">
          <li class="nav-link">
            <a href="index.php" class="nav-link active" aria-current="page">Inicio</a>
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
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/icone usuario.png" alt="" width="20" height="20">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Meus dados</a></li>
            <li><a class="dropdown-item" href="#">Sair</a></li>
          </ul>
        </div>
      </div>
  </nav>

  <main>

    <div class=" p-5 m-5">
      <nav class="navbar d-flex  justify-content-center ">
        <form class="form-inline">
          <h1 class="text-center">Pesquisar Pets</h1>
          <div class="input-group">
            <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
            <button type="button" class="btn btn btn-primary">Buscar</button>
            </button>
          </div>
        </form>
      </nav>
    </div>

    <div class="p-5" style="background-color: #F1D5CA ;">
      <section>

        <div class="container">
          <div class="row">
            <div class="col-md-4 ">
              <div class="card border border-2">
                <img class="card-img-top " src="img/carameloDog.jpg" alt="Card image cap" height="275">
                <h7 class="card-title " style="text-align: center; justify-content: center;">Stevem Howkins</h5>
                  <p class="card-text" style="text-align: center; justify-content: center;">193987</p>

              </div>
            </div>
            <div class="col-md-4 ">
              <div class="card border border-2">
                <img class="card-img-top " src="img/petPig.jpg" alt="Card image cap" height="275">
                <h7 class="card-title " style="text-align: center; justify-content: center;">Stevem Howkins</h5>
                  <p class="card-text" style="text-align: center; justify-content: center;">193987</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border border-2">
                <img class="card-img-top " src="img/petPig.jpg" alt="Card image cap" height="275">
                <h7 class="card-title " style="text-align: center; justify-content: center;">Stevem Howkins</h5>
                  <p class="card-text" style="text-align: center; justify-content: center;">193987</p>

              </div>
            </div>
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
        <li><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Facebook.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Instagram.png" alt=""></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Twitter.png" alt=""></svg></a></li>
      </ul>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>