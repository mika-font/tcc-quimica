<?php
include_once('controle.php');

if(isset($_POST['cadastrar'])){
    $titulo = $_POST['titulo'];
    $assunto = $_POST['assunto'];
    $data_inicio = $_POST['data_inicio'];
    $data_termino = $_POST['data_termino'];
    $questoes = $_POST['select_question'];
    if(!empty($titulo) && !empty($assunto) && !empty($data_inicio) && !empty($data_termino)){
        if(count($questoes) == 10){
            $sql = "INSERT INTO questionario (date_inic, date_fin, assunto, titulo_quest) VALUE ('$data_inicio', '$data_termino', '$assunto', '$titulo')";
            $resultado = mysqli_query($conexao, $sql);
            $id_questionario = mysqli_insert_id($conexao);

            for($i=0; $i < count($questoes); $i++){
                $sql = "INSERT INTO contem (id_questionario, id_questao) VALUE ('$id_questionario', '$questoes[$i]')";
                $result = mysqli_query($conexao, $sql);
                if($result == TRUE){
                    continue;
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            }
            if($resultado == TRUE && $result == TRUE){
                header("Location: list_questionario.php?msg=1"); //mensagem informando que deu certo
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: cad_questionario.php?msg=2"); //mensagem informando para selecionar 10 questões somente
        }
    } else {
        header("Location: cad_questionario.php?msg=1"); //mensagem informando para preencher os campos
    }
} else if (isset($_POST['editar'])){
    $id_questionario = $_POST['id_questionario'];
    $titulo = $_POST['titulo'];
    $assunto = $_POST['assunto'];
    $data_inicio = $_POST['data_inicio'];
    $data_termino = $_POST['data_termino'];
    $questoes = $_POST['select_question'];
    if(!empty($titulo) && !empty($assunto) && !empty($data_inicio) && !empty($data_termino)){
        if(count($questoes) == 10){
            $sql = "UPDATE questionario SET data_inic='$data_inicio', data_fin='$data_termino', assunto='$assunto', titulo_quest='$titulo' WHERE id_questionario=$id_questionario";
            $resultado = mysqli_query($conexao, $sql);
            for($i=0; $i < count($questoes); $i++){
                $sql = "UPDATE contem SET id_questao='$questoes[$i]' WHERE id_questionario=$id_questionario";
                $result = mysqli_query($conexao, $sql);
                if($result == TRUE){
                    continue;
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            }
            if($resultado == TRUE && $result == TRUE){
                header("Location: list_questionario.php?msg=2"); //mensagem informando que deu certo
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: edit_questionario.php?msg=2"); //mensagem informando para selecionar 10 questões somente
        }
    } else {
        header("Location: edit_questionario.php?msg=1"); //mensagem informando para preencher os campos
    }
} else if (isset($_GET['deletar'])){
    $id_questionario = $_GET['deletar'];
    $sql = "DELETE FROM contem WHERE id_questionario=$id_questionario";
    $sql2 = "DELETE FROM questionario WHERE id_questionario=$id_questionario";
    $result = mysqli_query($conexao, $sql);
    $result2 = mysqli_query($conexao, $sql2);

    if($result == TRUE && $result2 == TRUE){
        header("Location: list_questionario.php?msg=3"); //mensagem informando que deu certo
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
?>