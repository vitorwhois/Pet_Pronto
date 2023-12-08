<?php
session_start();
include('conexao.php');

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

  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
  <script src="js/script.js" defer></script>


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


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbar-items" aria-label="Toggle navigation">
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
              <button class="btn btn-secondary">Login</button>
            </li>
            <li class="nav-item">
              <a href="register.html" class="btn btn-primary">Cadastrar</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>
  <form action="savelogin.php" method="POST">

    <section class="h-100 gradient-custom-2" id="register-container">
      <div class="container py-5 h-90">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-6">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="col-lg-12">
                  <div class="p-5">
                    <h1 class=" mb-5" style="color: var(--cor--darkest);">Cadastro</h1>

                    <div class="mb-4 pb-2">

                      <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Examplev4">Email</label>
                      </div>
                    </div>

                    <div class="mb-4 pb-2">
                      <div class="form-outline">
                        <input type="password" id="password" name="senha" class="form-control form-control-lg" minlength="6" required />
                        <label class="form-label" for="password">Senha</label>
                      </div>
                    </div>
                    <div class="mb-4 pb-2">
                      <div class="form-outline">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg" minlength="6" />
                        <label class="form-label" for="passwordConf">Confirme a senha</label>
                      </div>
                    </div>
                    <div class="row ms-1 mb-4 pb-1" id="buttonDiv"></div>


                    <!--
                          //Salvar informacoes do user para BD                         
                        <p id="fullName"></p>
                        <p id="sub"></p>
                        <p id="given_name"></p>
                        <p id="family_name"></p>
                        <p id="email"></p>
                        <p id="verifiedEmail"></p>
                        <img id="picture" />
                       -->


                    <div class="d-flex justify-content-between">
                      <a href="index.html" class="btn btn-secondary btn-lg align-content-end mt-4 mt-lg-5 onclick=" voltar()" ">Cancelar</a>

                        <a href=" savelogin.html">
                        <button type="submit" class="btn btn-primary btn-lg mt-4 mt-lg-5 ">Login</button>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
    </section>

  </form>
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
</body>

</html>