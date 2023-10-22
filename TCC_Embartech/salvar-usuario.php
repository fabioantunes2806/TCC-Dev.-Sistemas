<?php
    //Definição das variáveis pegando os campos do formulário de cadastro
    $nome = $_POST['regName'];
    $emailuser = $_POST['regEmail'];
    $senhauser = sha1($_POST['regSenha']);

    //Incluir o arquivo de conexão
    include("conexao.php");

    // Variável consulta recebe a variável $pdo executa o código de seleção para buscar o email na tabela do banco 
    $consulta = $pdo->prepare("SELECT * FROM tbuser WHERE email = '$emailuser'");
    $consulta->execute();

    /* Se o número de colunas na consulta for ao menos 1, emite a mensagem. 
    Se não, utiliza o insert para adicionar as informações ao banco */
    if ($consulta->rowCount() == 1){
        echo"E-mail já cadastrado";
    }else{
        $stmt = $pdo->prepare("insert into tbuser values(null, '$emailuser', '$nome','$senhauser', 1)");
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
    
    // Direciona para o arquivo login.php
    header("location:login.php");

?>