<?php

    $nome = $_POST['regName'];
    $emailuser = $_POST['regEmail'];
    $senhauser = sha1($_POST['regSenha']);

    include("conexao.php");

    $consulta = $pdo->prepare("SELECT * FROM tbuser WHERE email = '$emailuser'");
    $consulta->execute();

    if ($consulta->rowCount() == 1){
        echo"E-mail já cadastrado";
    }else{
        $stmt = $pdo->prepare("insert into tbuser values(null, '$emailuser', '$nome','$senhauser', null)");
        $stmt ->execute();
    } 

   /* $sql_code1 = "SELECT * FROM tbusuario WHERE email = '$emailuser'";
        $sql_query1 = $mysqli->query($sql_code1) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade1 = $sql_query1->num_rows;

        if($quantidade1 == 1) {
            echo("Email já cadastrado");
        }else{
            $stmt = $pdo->prepare("insert into tbusuario
                values(null,'$nome','$emailuser','$senhauser')");	    
            $stmt ->execute();  
        } */
    
    header("location:login.php");

?>