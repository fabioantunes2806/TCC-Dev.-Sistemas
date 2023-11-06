<?php 

    $idCurso = $_POST['txCurso'];
    $subjectName = $_POST['txSubject'];
    $description = $_POST['txDesc'];


    include('../conexao.php');

    $stmt = $pdo->prepare("insert into tbaula values(null, '$idCurso', '$subjectName', '$description')");
    $stmt->execute();

    header("location:insert-subtopic.php");

?>

