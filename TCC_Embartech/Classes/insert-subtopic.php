<?php

    include('../conexao.php');

    // Inclui o arquivo protect-adm.php
    include('../protect-adm.php');

    //Se não houver uma sessão, iniciar sessão
    if(!isset($_SESSION)) {
        session_start();
    }
    ?>

    <h4>Cadastrar matéria</h4>

    <form action="save-subtopic.php" method="post">
         <select placeholder="Curso" name="txCurso">
            <?php 
                $stmt = $pdo->prepare("select * from tbcurso");
                $stmt->execute();
                while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
            ?>
                <option value="<?php echo $row['idCurso'] ?>">
                    <?php echo $row['nomeCurso'] ?>
                </option>
            <?php } ?>
        </select></br>
        <input type="text" required placeholder="Nome da matéria" name="txSubject" /></br>
        <input type="text" required placeholder="Breve descrição da matéria" name="txDesc" /></br>
        <input type="submit" value="salvar" />
    </form>
    