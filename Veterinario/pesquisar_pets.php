<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petpronto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];

    $sql = "SELECT * FROM tab_pet 
            INNER JOIN tab_cliente ON tab_pet.tab_cliente_cpf_cli = tab_cliente.cpf_cli
            WHERE tab_pet.registro_pet LIKE '%$search_term%' 
               OR tab_cliente.cpf_cli = '$search_term'";

    $result = $conn->query($sql);

 

if ($result->num_rows > 0) {
    echo '<div class="row">';
    
    while ($row = $result->fetch_assoc()) {
        echo '
            <div class="col-sm-3 mb-4">
                <div class="card card-block">
                    <img class="card-img-top" src="https://i.imgur.com/ZTkt4I5.jpg" style="height: 180px; width: 100%; display: block;" alt="Imagem do Pet">
                    <div class="card-body">
                        <h4 class="card-title">' . $row['nome_pet'] . '</h4>';
        
        // Verifica se a chave 'descricao_pronto' existe no array antes de acessá-la
        if (isset($row['descricao_pronto'])) {
            echo '<p class="card-text">' . $row['descricao_pronto'] . '</p>';
        } else {
            echo '<p class="card-text">Descrição não disponível.</p>';
        }


        echo '<p class="card-text">Dono: ' . $row['nome_cli'] . '</p>';

        echo '<a href="perfilpet.php?id=' . $row['idtab_pet'] . '" class="btn btn-primary">Ver</a>

                    </div>
                </div>
            </div>
        ';
    }
    
    echo '</div>'; // Fecha a div "row"
} else {
    echo '<p class="col-12 text-center" style="font-size: 18px; font-weight: bold; color: #555;">Nenhum animal de estimação encontrado.</p>';
}

// ... (código posterior)

}

$conn->close(); // Fecha a conexão com o banco de dados
?>
