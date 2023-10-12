<?php


if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['idUser'])) {
//  include("../estruturas/cabecalho-visitante.php");
    die("Você não pode acessar esta página porque não está logado. Faça Login para continuar.");
//  include("../estruturas/rodape.php");
} 

?>