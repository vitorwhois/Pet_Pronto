<?php
// vervacina.php
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

// IDs da tabela de aplicação e do pet
$id_aplicacao_vacina = isset($_GET['id_aplicacao_vacina']) ? $_GET['id_aplicacao_vacina'] : null;
$id_pet = isset($_GET['id_pet']) ? $_GET['id_pet'] : null;

// Variável para armazenar o nome do pet
$nomePet = '';

// Verifica se os IDs são numéricos e maiores que zero
if (!is_numeric($id_aplicacao_vacina) || !is_numeric($id_pet) || $id_aplicacao_vacina <= 0 || $id_pet <= 0) {
    echo "<p>IDs inválidos.</p>";
    exit;
}

// Execute a consulta SQL usando os IDs da tabela de aplicação e do pet
try {
    $sql = "SELECT
                tab_pet.*,
                tab_dataaplicacaovacina.id_aplicacao_vacina,
                tab_vacina.titulo_vacina,
                tab_dataaplicacaovacina.data_aplicacao,
                tab_dataaplicacaovacina.proxima_dose
            FROM
                tab_pet
            LEFT JOIN
                tab_dataaplicacaovacina ON tab_pet.idtab_pet = tab_dataaplicacaovacina.tab_prontuario_idtab_prontuario
            LEFT JOIN
                tab_vacina ON tab_dataaplicacaovacina.tab_vacina_idtab_vacina = tab_vacina.idtab_vacina
            WHERE
                tab_pet.idtab_pet = ? AND
                tab_dataaplicacaovacina.id_aplicacao_vacina = ?";

    // Use declaração preparada para evitar injeção de SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_pet, $id_aplicacao_vacina);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Armazene o nome do pet na variável
        $nomePet = $row['nome_pet'];


    } else {
        echo "<p>Nenhuma informação encontrada para os IDs fornecidos.</p>";
    }

    $stmt->close();
} catch (Exception $e) {
    // Exiba mensagens de erro
    echo 'Erro: ' . $e->getMessage();
}

// Fechar a conexão
$conn->close();
?>





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
        <div class="verde shadow rounded overflow-hidden ">
            <div class="px-4 pt-0 pb-2 rosa">
                <div class="p-5">
                    <section>
                        <div class="d-flex justify-content-between align-items-center"></div>>
                        <main class="container pt-5">
                            <div class="row">
                                <div class="col-md-4 align-items-center">
                                    <div class="col-md-12 d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                        <p>Nome: <?php echo htmlspecialchars($nomePet); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="p-3 py-5">
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                            </div>
                                            <h4 class="text-right">Perfil</h4>
                                        </div>
                                        <form>
    <div class="row mt-2">


        <!-- Adicione outros campos conforme necessário -->

        <div class="col-md-12">
            <label for="titulo_vacina" class="labels">Vacina Aplicada:</label>
            <input type="text" id="titulo_vacina" name="titulo_vacina" class="form-control p-1 py-2" value="<?= isset($row['titulo_vacina']) ? htmlspecialchars($row['titulo_vacina']) : '' ?>" readonly>
        </div>

        <div class="col-md-12">
            <label for="data_aplicacao" class="labels">Data de Aplicação:</label>
            <input type="text" id="data_aplicacao" name="data_aplicacao" class="form-control p-1 py-2" value="<?= isset($row['data_aplicacao']) ? htmlspecialchars($row['data_aplicacao']) : '' ?>" readonly>
        </div>

        <div class="col-md-12">
            <label for="proxima_dose" class="labels">Próxima Dose:</label>
            <input type="text" id="proxima_dose" name="proxima_dose" class="form-control p-1 py-2" value="<?= isset($row['proxima_dose']) ? htmlspecialchars($row['proxima_dose']) : '' ?>" readonly>
        </div>
    </div>

    <div class="mt-3 text-center">
        <?php if (!empty($id_pet)) : ?>
            <a href="listavacinas.php?id=<?= $id_pet ?>" class="btn btn-primary mb-2">Voltar</a>
        <?php endif; ?>
    </div>
</form>

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

