<?php 

    $idSubject = $_POST['txMateria'];
    $lessonName = $_POST['txLesson'];
    $lessonDescription = $_POST['txDescLesson'];

    include('../conexao.php');

    //insert PDF
    if(isset($_FILES["arqPdf"]["name"])){
        $arqNome = $_FILES["arqPdf"]["name"];
        $arqTipo = $_FILES["arqPdf"]["type"];
        $arqTamanho = $_FILES["arqPdf"]["size"];
        $arqNomeTemp = $_FILES["arqPdf"]["tmp_name"];
        $erroPdfMarc = $_FILES["arqPdf"]["error"];

        if($erroPdfMarc==0){
            if(is_uploaded_file($arqNomeTemp)){
                if(move_uploaded_file($arqNomeTemp,"../estruturas/archives/". $arqNome)){
                    $caminhoI = '../estruturas/archives/' .$arqNome;
      
            }
                else{
                    $erro = "Falha ao mover imagem do marcador";
                    echo "$erro";
                }
            }
            else{
                $erro = "Erro no envio: A imagem do marcador não foi recebida com sucesso.";
                echo "$erro";
            }
        }
        else{
            $erro = "Erro no envio: ". $erro;
            echo "$erro";
        }
    }
    else{
        $erro = "Imagem do Marcador enviado não encontrada";
        echo "$erro";
    }

    $stmt = $pdo->prepare("insert into tbmaterial values(null, '$idSubject', '$lessonName', '$lessonDescription', '$caminhoI')");
    $stmt->execute();

    header("location:insert-content.php");
?>