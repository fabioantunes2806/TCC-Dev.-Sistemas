<?php

    // Inclui o arquivo conexao.php
    include('../conexao.php');

    // Inclui o arquivo protect-adm.php
    include('../protect-adm.php');

    //Se não houver uma sessão, iniciar sessão
    if(!isset($_SESSION)) {
        session_start();
    }
    ?>

    <h4>Cadastrar aula</h4>

    <form action="save-content.php" method="post">
         <select placeholder="Matéria" name="txMateria">
            <?php 
                $stmt = $pdo->prepare("select * from tbaula");
                $stmt->execute();
                while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
            ?>
                <option value="<?php echo $row['idAula'] ?>">
                    <?php echo $row['nomeAula'] ?>
                </option>
            <?php } ?>
        </select></br>
        <input type="text" required placeholder="Nome da Aula" name="txLesson" /></br>
        <input type="text" required placeholder="Breve descrição da aula" name="txDescLesson" /></br>
        <input type="file" required placeholder="PDF" name="arqPdf" /></br>
        <input type="submit" value="salvar" />
    </form>