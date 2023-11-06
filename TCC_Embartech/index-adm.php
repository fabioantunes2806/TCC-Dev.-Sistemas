<?php
    // Inclui o arquivo protect-adm.php
    include('protect-adm.php');

    //Se não houver uma sessão, iniciar sessão
    if(!isset($_SESSION)) {
        session_start();
    }
    ?>

   <a href="classes/insert-subtopic.php"><button>Inserir matéria</button> </br>
   <a href="classes/insert-content.php"><button>Inserir conteúdo</button>

<!-- Link que executa o logout.php -->
<a href="logout.php">Logout</a>