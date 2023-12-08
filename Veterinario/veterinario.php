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
    
    <body >
    <?php

include('verificalogin.php');

    


?>
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
        </div> 
    </nav>
    
    <main>
        
        <body>
            
            <body>
                
                <div class="p-5 m-5">
                    <nav class="navbar d-flex justify-content-center">
                        <form class="form-inline" onsubmit="return pesquisarPets()">
                            <h1 class="text-center">Pesquisar Pets</h1>
                  <div class="input-group">
                      <input type="text" class="form-control" name="search_term" id="search_term" aria-label="Text input with segmented dropdown button">
                      <button type="submit" class="btn btn btn-primary">Buscar</button>
                    </div>
                </form>
            </nav>
        </div>
        
        <div class="p-5" style="background-color: #F1D5CA; display: none;" id="resultado_pesquisa_section">
            <section id="resultado_pesquisa">
                <div class="row">
                </div>
            </section>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- Inclua o script do Bootstrap JS, se necessário -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>]
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    



        <script>
            function pesquisarPets() {
                var search_term = document.getElementById("search_term").value;
                
                // Fazer a requisição AJAX
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("resultado_pesquisa").innerHTML = this.responseText;
                        
                        // Mostrar a seção rosa após a pesquisa
                document.getElementById("resultado_pesquisa_section").style.display = "block";
            }
        };
        xmlhttp.open("POST", "pesquisar_pets.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("search=true&search_term=" + search_term);
        
        return false; // Impede que o formulário seja enviado normalmente
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        var mainContent = document.getElementById("seu-conteudo-principal");
        var windowHeight = window.innerHeight;
        mainContent.style.minHeight = (windowHeight - footer.offsetHeight) + "px";
    });
    </script>
    
    <footer class="border-top borda align-items-center align-content-center">
    <div class="container d-flex justify-content-between flex-wrap my-4 py-sm-3 my-sm-4 align-items-center align-content-center" id="footerCell">
      <p class="col-md-4 mb-0 text-mu   te">Copyright © 2023 Pet Pronto</p>


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
  