<?php

use Dotenv\Dotenv;


require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Inicia a sessão apenas se não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$usuario = $_ENV['USUARIO'];
$senha = $_ENV['SENHA'];
$database = $_ENV['DATABASE'];
$hostname = $_ENV['HOSTNAME'];

// Conecta ao banco de dados
$conn = new mysqli($hostname, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die('Falha ao conectar ao banco de dados: ' . $conn->connect_error);
}
