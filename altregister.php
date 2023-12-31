<?php

include('conexao.php');
if (!isset($_SESSION)) {
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
  <div id="fade" class="hide">
    <div id="loader" class="spinner-border text-info hide" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div id="message" class="hide">
      <div class="alert alert-light" role="alert">
        <h4>Mensagem:</h4>
        <p></p>
        <button id="close-message" type="button" class="btn btn-secondary">
          Fechar
        </button>
      </div>
    </div>
  </div>

  <form action="/php/updateform.php" method="post" id="addressForm" enctype="multipart/form-data">
    <section class="h-100 gradient-custom-2" id="register-container">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-6 bg">
            <div class="card card-registration card-registration-2 bg-indigo" style="border-radius: 15px;">
              <div class="col-lg-12 bg-indigo text-white" style="border-radius: 15px;">
                <div class="p-5">
                  <h3 class="fw-normal pt-3 mb-5">Atualize o seu Perfil</h3>

                  <div class="row">
                    <div class="col-md-4 mb-4 pb-2">


                      <div class="form-outline">
                        <label class="form-label" for="form3Examplev2">Nome</label>
                        <input type="text" id="" name="nome" class="form-control form-control-lg" required />
                      </div>

                    </div>
                    <div class="col-md-8 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="form3Examplev3">Sobrenome</label>
                        <input type="text" id="" name="sobrenome" class="form-control form-control-lg" required />
                      </div>

                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4 mb-4 pb-2  ">
                      <label class="form-label" for="">Entidade</label>
                      <select class="form-select form-control form-control-lg" id="entidade" name="entidade" required>
                        <option value="pf" selected>Pessoa Física</option>
                        <option value="pj">Pessoa Juridica</option>
                      </select>

                    </div>
                    <div class="col-md-8 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="">CPF - CNPJ</label>
                        <input type="text" id="cpfCnpj" name="cpfCnpj" class="form-control form-control-lg" minlength="11" maxlength="14" required title="Digite somente os números" placeholder="Pessoa Fisica CPF ou CNPJ PJ" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <label class="form-label" for="cep">CEP</label>
                        <input id="cep" name="cep" type="text" class="form-control form-control-lg" minlength="8" maxlength="8" required />
                      </div>

                    </div>
                    <div class="col-md-8 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <label class="form-label" for="logradouro">Logradouro</label>
                        <input type="text" id="address" name="logradouro" class="form-control form-control-lg" required data-input />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="">Número</label>
                        <input type="text" id="numero" name="numero" class="form-control form-control-lg" required />
                      </div>

                    </div>
                    <div class="col-md-3 mb-4 pb-2">

                      <div class="form-outline">
                        <label class="form-label" for="complemento">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="form-control form-control-lg" />
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input type="text" id="city" name="cidade" class="form-control form-control-lg" required data-input />
                      </div>
                    </div>
                  </div>


                  <div class="row">


                    <div class="col-md-2 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <labe class="pb-5" for="estado">Estado</labe>
                        <select class="pb-3 pt-2 mt-2 " id="state" name="estado" required data-input>
                          <option value="AC">AC</option>
                          <option value="AL">AL</option>
                          <option value="AP">AP</option>
                          <option value="AM">AM</option>
                          <option value="BA">BA</option>
                          <option value="CE">CE</option>
                          <option value="DF">DF</option>
                          <option value="ES">ES</option>
                          <option value="GO">GO</option>
                          <option value="MA">MA</option>
                          <option value="MT">MT</option>
                          <option value="MS">MS</option>
                          <option value="MG">MG</option>
                          <option value="PA">PA</option>
                          <option value="PB">PB</option>
                          <option value="PR">PR</option>
                          <option value="PE">PE</option>
                          <option value="PI">PI</option>
                          <option value="RJ">RJ</option>
                          <option value="RN">RN</option>
                          <option value="RS">RS</option>
                          <option value="RO">RO</option>
                          <option value="RR">RR</option>
                          <option value="SC">SC</option>
                          <option value="SP">SP</option>
                          <option value="SE">SE</option>
                          <option value="TO">TO</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-7 mb-4 pb-2">

                      <div class="form-outline form-white">
                        <label class="form-label" for="phone">Telefone</label>
                        <input type="tel" id="phone" name="telefone" class="form-control form-control-lg" required />
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4 pb-2">
                      <label class="form-label" for="foto">Enviar Foto</label>
                      <input type="file" id="foto" name="foto" class="form-control form-control-lg" accept="image/*" />
                    </div>
                  </div>

                  <a href="perfilusuario.php"><button type="submit" class="btn btn-primary btn-lg " data-mdb-ripple-color="dark">Atualizar</button></a>

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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>