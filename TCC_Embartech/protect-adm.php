<?php

// Se não houver sessão iniciada, inicia uma sessão
if(!isset($_SESSION)) {
    session_start();
}

// Se o isset for diferente de um idUser cadastrado no banco, "mata" a página e emite a mensagem
if(!isset($_SESSION['idUser'])) {
    die("Você não pode acessar esta página porque não está logado. Faça Login para continuar.");
    // Se não se o idperm for diferente de 2, "mata" a página e emite a mensagem
}else if($_SESSION['idperm'] != 2) {
    die("Você não possui permissão para acessar esse conteúdo.");
}
?>