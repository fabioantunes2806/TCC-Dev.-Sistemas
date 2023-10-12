<?php
    $servidor="localhost";
    $database="dbembartech"; 
    $usuario="root";
    $senha="";

    $pdo = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$senha);

    $mysqli = new mysqli($servidor, $usuario, $senha, $database);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados. " . $mysqli->error);
    }
?>