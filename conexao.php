<?php

// Inicia a sessão apenas se não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = 'devweb6sql';
$senha = 'k2023_FaTEC#$';
$database = 'devweb6sql';
$hostname = 'devweb6sql.mysql.dbaas.com.br';

// Conecta ao banco de dados
$conn = new mysqli($hostname, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die('Falha ao conectar ao banco de dados: ' . $conn->connect_error);
}



// Não esqueça de fechar a conexão quando terminar de usá-la





/*
$usuario = 'devweb6sql';
$senha = 'k2023_FaTEC#$';
$database = 'devweb6sql';
$hostname = 'devweb6sql.mysql.dbaas.com.br';

$usuario = 'root';
$senha = '';
$database = 'petpronto01';
$hostname = 'localhost';
*/