<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])){
    die("voce nao esta logado")
}

?>