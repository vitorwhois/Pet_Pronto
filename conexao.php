<?php

session_start();

$usuario = 'devweb6sql';
$senha = 'k2023_FaTEC#$';
$database = 'devweb6sql';
$hostname = 'devweb6sql.mysql.dbaas.com.br';

$conn = new mysqli($hostname, $usuario, $senha, $database);

if ($conn->error) {
    die('falha ao conectar ao bancco de dados: ' . $conn->error);
} else
    echo 'Conectado ao Banco de dados ';
