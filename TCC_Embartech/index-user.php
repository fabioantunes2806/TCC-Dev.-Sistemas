<?php

    include('protect.php');

    if(!isset($_SESSION)) {
        session_start();
    }
    ?>

<a href="logout.php">Logout</a>