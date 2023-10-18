<?php

// Se não houver sessão iniciada, inicia uma sessão
if(!isset($_SESSION)) {
    session_start();
}

// Destrói a sessão
session_destroy();

// Redireciona para login.php
header("Location: login.php");

?>