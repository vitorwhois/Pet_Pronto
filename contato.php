<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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

        <section class="gradient-custom-2 conteiner-fluid vh-100">
            <div class=" py-5">
                <div class="container bg-white mt-5" style="border-radius: 15px;">
                    <div class=" row justify-content-center">
                        <div class=" col-md-12">
                            <div class="wrapper">
                                <div class="row no-gutters">
                                    <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <h3 class="mb-4">Get in touch</h3>
                                            <div id="form-message-warning" class="mb-4"></div>
                                            <div id="form-message-success" class="mb-4">
                                                Your message was sent, thank you!
                                            </div>
                                            <form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate" abineguid="10941FD2945441118671DB046F8B7BE6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="name">Full Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="email">Email Address</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                            <div id="pwm-inline-icon-78659" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -27px; margin-left: 286px;"><svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 40 64">
                                                                    <g>
                                                                        <path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z"></path>
                                                                        <path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z"></path>
                                                                    </g>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="subject">Subject</label>
                                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="#">Message</label>
                                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="submit" value="Send Message" class="btn btn-primary">
                                                            <div class="submitting"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 d-flex align-items-stretch  bg-secondary" style="border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
                                        <div class="info-wrap  w-100 p-md-5 p-4">
                                            <h3>Let's get in touch</h3>
                                            <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-map-marker"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-paper-plane"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-globe"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Website</span> <a href="#">yoursite.com</a></p>
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
        </section>

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