<?php
    // Inclui o arquivo protect-adm.php
    include('protect-adm.php');

    //Se não houver uma sessão, iniciar sessão
    if(!isset($_SESSION)) {
        session_start();
    }
    ?>
<!-- Link que executa o logout.php -->
<a href="logout.php">Logout</a>