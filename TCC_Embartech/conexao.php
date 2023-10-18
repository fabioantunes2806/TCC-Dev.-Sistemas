<?php
    // Atribuindo variáveis com valores referentes aos dados do banco de dados
    $servidor="localhost";
    $database="dbembartech"; 
    $usuario="root";
    $senha="";

    // variável $pdo instancia a classe PDO com as variáveis antes definidas
    $pdo = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$senha);

    // variável $mysqli instancia a classe mysqli com as variáveis antes definidas
    $mysqli = new mysqli($servidor, $usuario, $senha, $database);

    // Se ocorrer um erro, "matar" a página e emitir mensagem informando o erro
    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados. " . $mysqli->error);
    }
?>