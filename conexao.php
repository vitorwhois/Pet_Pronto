<?php

use Dotenv\Dotenv;


require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Inicia a sessão apenas se não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$usuario = $_ENV['DB_USER'];
$senha = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];
$hostname = $_ENV['DB_HOSTNAME'];

// Conecta ao banco de dados
$conn = new mysqli($hostname, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die('Falha ao conectar ao banco de dados: ' . $conn->connect_error);
}
