<?php
    // Inclui o arquivo protect.php
    include('protect.php');

    //Se não houver uma sessão, iniciar sessão
    if(!isset($_SESSION)) {
        session_start();
    }
    ?>
<!-- Link que executa o logout.php -->
<a href="logout.php">Logout</a>