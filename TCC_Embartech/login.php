<?php 
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
			const regSenha = document.querySelector('input[name=regSenha]');
			const regConfirm = document.querySelector('input[name=regConfirm]');

			if(regConfirm.value === regSenha.value) {
				regConfirm.setCustomValidity('');
			} else {
				regConfirm.setCustomValidity('As senhas não conferem');
			}
		}

		function sucesso() {
			alert("Usuário cadastrado com sucesso! :)")
		}

		</script>
</head>
    <body>

    <h4>Log in</h4>
    <form action="" method="post">
        <div>
            <?php
                if(isset($_POST['email']) || isset($_POST['senha'])) {

                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string(sha1($_POST['senha']));

                    $sql_code = "SELECT * FROM tbuser WHERE email = '$email' AND senha = '$senha'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                    $quantidade = $sql_query->num_rows;

                    if($quantidade == 1) {

                        $usuario = $sql_query->fetch_assoc();

                        if(!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['idUser'] = $usuario['idUser'];
                        $_SESSION['username'] = $usuario['username'];

                        header("Location: index-user.php");

                    }else{
                        echo "Falha ao logar! E-mail ou senha incorretos.";
                    }
                }
            ?>
        </div>
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