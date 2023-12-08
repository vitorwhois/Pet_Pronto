<<!DOCTYPE html>
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
                            <a href="contato.php" class="nav-link active" aria-current="page">Contato</a>
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
        <div class="container mt-5 contact">
            <div class="row ">
                <div class="col-md-6 pt-5 mt-4">
                    <div class="well d-flex justify-content-center">
                        <form class="form-horizontal col-10 ms-md-5 " method="post">
                            <legend class="text-center header">Contate-nos</legend>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="fname" name="name" type="text" placeholder="Nome" class="form-control">
                                </div>
                            </div>
                            <div class=" ml-5 form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="lname" name="name" type="text" placeholder="Sobrenome" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <input id="phone" name="phone" type="text" placeholder="Telefone" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea class="form-control " style="width: 100%;" id="message" name="message" placeholder="Digite sua mensagem aqui" rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mt-4 pt-3">
                    <div class="panel panel-default">
                        <div class="text-center header"></div>
                        <div class="panel-body text-center">
                            <ul class="d-flex justify-content-around">
                                <li class=" d-flex align-items-center  text-center">
                                    <h4>Endereço:</h4>
                                </li>
                                <li class="li">
                                    <p>
                                        R. Pedro Rissato, 30<br />
                                        Osasco - SP<br />
                                        (11) 0800 555 555<br />
                                        petpronto@pronto.com.br<br />
                                    </p>
                                </li>
                            </ul>
                            <hr />
                            <div id="map1" class="map">
                                <iframe style="border:0; width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14633.107485835559!2d-46.7582018!3d-23.5225422!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ceff250e441ef9%3A0x88dae4d491bc1ac7!2sFaculdade%20de%20Tecnologia%20Prefeito%20Hirant%20Sanazar%20(Fatec%20Osasco)!5e0!3m2!1spt-BR!2sbr!4v1699645954532!5m2!1spt-BR!2sbr" frameborder="0" allowfullscreen></iframe>
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
                    <li class="nav-link"><a href="https://github.com/vitorwhois/Pet_Pronto">Projeto em construção <i class="bi bi-github"></i></a></li>
                </ul>
                <ul class="nav col justify-content-center justify-content-md-end" id="FooterSocial">
                    <li><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Facebook.png" alt=""></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Instagram.png" alt=""></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><img src="./img/icons/Twitter.png" alt=""></svg></a></li>
                </ul>
            </div>
        </footer>
    </body>

    </html>