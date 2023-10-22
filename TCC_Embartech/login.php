<?php 
    // Inclui o arquivo de conexão
    include('conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script>
		function confereSenha() {
            // Pega os valores dos inputs e os atribui às const
			const regSenha = document.querySelector('input[name=regSenha]');
			const regConfirm = document.querySelector('input[name=regConfirm]');

            // Se os dois campos possuirem o mesmo valor, não faz nada. Se não, emite a mensagem
			if(regConfirm.value === regSenha.value) {
				regConfirm.setCustomValidity('');
			} else {
				regConfirm.setCustomValidity('As senhas não conferem');
			}
		}
		</script>
</head>
    <body>

    <h4>Log in</h4>
    <!-- Abre o formulário com o método post -->
    <form action="" method="post">
        <div>
            <?php
                if(isset($_POST['email']) || isset($_POST['senha'])) {

                    // Variáveis email e senha recebem seus respectivos valores no formulário
                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string(sha1($_POST['senha']));

                    // Select no banco para verificar se as variáveis email e senha existem no banco, junto com o valor de idperm = 1
                    $sql_code = "SELECT * FROM tbuser WHERE email = '$email' AND senha = '$senha' AND idperm = 1";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                    // variável quantidade recebe o número de linhas da resposta da consulta
                    $quantidade = $sql_query->num_rows;

                    // Se quantidade for igual a 1
                    if($quantidade == 1) {

                        // variável usuario recebe os dados da próxima linha do valor de $sql_query 
                        $usuario = $sql_query->fetch_assoc();

                        // Se não houver uma sessão, iniciar sessão
                        if(!isset($_SESSION)) {
                            session_start();
                        }

                        // $_SESSION recebe idUser, username e idperm
                        $_SESSION['idUser'] = $usuario['idUser'];
                        $_SESSION['username'] = $usuario['username'];
                        $_SESSION['idperm'] = $usuario['idperm'];

                        // Redireciona para index-user.php
                        header("Location: index-user.php");

                    }else 
                    
                    // Variáveis email e senha recebem seus respectivos valores no formulário
                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string(sha1($_POST['senha']));

                    // Select no banco para verificar se as variáveis email e senha existem no banco, junto com o valor de idperm = 2
                    $sql_code = "SELECT * FROM tbuser WHERE email = '$email' AND senha = '$senha' AND idperm = 2";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                    // variável quantidade recebe o número de linhas da resposta da consulta
                    $quantidade = $sql_query->num_rows;

                    // Se quantidade for igual a 1
                    if($quantidade == 1) {

                        // variável usuario recebe os dados da próxima linha do valor de $sql_query 
                        $usuario = $sql_query->fetch_assoc();

                        // Se não houver uma sessão, iniciar sessão
                        if(!isset($_SESSION)) {
                            session_start();
                        }

                        // $_SESSION recebe idUser, username e idperm
                        $_SESSION['idUser'] = $usuario['idUser'];
                        $_SESSION['username'] = $usuario['username'];
                        $_SESSION['idperm'] = $usuario['idperm'];

                        // Redireciona para index-adm.php
                        header("Location: index-adm.php");

                        //Se não, emite mensagem de falha no login
                    }else{
                        echo "Falha ao logar! E-mail ou senha incorretos.";
                    }
                }
            ?>
        </div>
            <!-- Formulário de login -->
        <div>
            <input type="email" name="email" required placeholder="Seu Email" id="logEmail" autocomplete="off">
        </div>
        <div>
            <input type="password" name="senha" required placeholder="Sua senha" id="logPass" autocomplete="off">
        </div>
        <input type="submit" value="Log In">
        <p><a href="#0">Esqueceu sua senha?</a></p>
    </form>


    <h4>Sign Up</h4>
            <!-- Formulário de cadastro com a action para o arquivo salvar-usuario.php -->
<form action="salvar-usuario.php" method="post">
    <div>
        <input type="text" name="regName" required placeholder="Username" id="regName" autocomplete="off">
    </div>
    <div>
        <input type="email" name="regEmail" required placeholder="Email" id="regEmail" autocomplete="off">
    </div>
    <div>
        <input type="password" name="regSenha" required onchange='confereSenha();' placeholder="Senha" id="regSenha" autocomplete="off">
    </div>
    <div>
        <input type="password" name="regConfirm" required onchange='confereSenha();' placeholder="Confirmar Senha" id="regSenha" autocomplete="off">
    </div>
        <input type="submit" value="Registrar">
    </form>

</body>
</html>