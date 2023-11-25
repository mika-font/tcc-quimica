<?php
include_once('controle.php');

if (isset($_POST['cadastrar'])) {
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $assunto = mysqli_escape_string($conexao, $_POST['assunto']);
    $data_inicio = mysqli_escape_string($conexao, $_POST['data_inicio']);
    $data_termino = mysqli_escape_string($conexao, $_POST['data_termino']);
    $questoes = $_POST['select_question'];
    if (!empty($titulo) && !empty($assunto) && !empty($data_inicio) && !empty($data_termino)) {
        if (count($questoes) == 10) {
            $sql = "INSERT INTO questionario (date_inic, date_fin, assunto, titulo_quest) VALUE ('$data_inicio', '$data_termino', '$assunto', '$titulo')";
            $resultado = mysqli_query($conexao, $sql);
            $id_questionario = mysqli_insert_id($conexao);

            for ($i = 0; $i < count($questoes); $i++) {
                $sql = "INSERT INTO contem (id_questionario, id_questao) VALUE ('$id_questionario', '$questoes[$i]')";
                $result = mysqli_query($conexao, $sql);
                if ($result == TRUE) {
                    continue;
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            }
            if ($resultado == TRUE && $result == TRUE) {
                header("Location: list_questionario.php?msg=1");
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: cad_questionario.php?msg=2");
        }
    } else {
        header("Location: cad_questionario.php?msg=1");
    }
} else if (isset($_POST['editar'])) {
    $id_questionario = mysqli_escape_string($conexao, $_POST['id_questionario']);
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $assunto = mysqli_escape_string($conexao, $_POST['assunto']);
    $data_inicio = mysqli_escape_string($conexao, $_POST['data_inicio']);
    $data_termino = mysqli_escape_string($conexao, $_POST['data_termino']);
    $questoes = $_POST['select_question'];
    if (!empty($titulo) && !empty($assunto) && !empty($data_inicio) && !empty($data_termino)) {
        if (count($questoes) == 10) {
            $sql = "UPDATE questionario SET date_inic='$data_inicio', date_fin='$data_termino', assunto='$assunto', titulo_quest='$titulo' WHERE id_questionario=$id_questionario";
            $resultado = mysqli_query($conexao, $sql);

            $atualiza = "DELETE FROM contem WHERE id_questionario = $id_questionario";
            $consulta = mysqli_query($conexao, $atualiza);

            for ($i = 0; $i < count($questoes); $i++) {
                $sql = "INSERT INTO contem (id_questionario, id_questao) VALUE ('$id_questionario', '$questoes[$i]')";
                $result = mysqli_query($conexao, $sql);
                if ($result == TRUE) {
                    continue;
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            }
            if ($resultado == TRUE && $result == TRUE) {
                header("Location: list_questionario.php?msg=2");
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: edit_questionario.php?id_questionario=$id_questionario&msg=2");
        }
    } else {
        header("Location: edit_questionario.php?id_questionario=$id_questionario&msg=1");
    }
} else if (isset($_GET['deletar'])) {
    $id_questionario = $_GET['deletar'];
    $sql_responde = "DELETE FROM responde WHERE id_questionario = $id_questionario";
    $deletar = mysqli_query($conexao, $sql_responde);
    if ($deletar == TRUE) {
        $sql_contem = "DELETE FROM contem WHERE id_questionario = $id_questionario";
        $deletar_contem = mysqli_query($conexao, $sql_contem);
        if ($deletar_contem == TRUE) {
            $sql_quest = "DELETE FROM questionario WHERE id_questionario = $id_questionario";
            $resultado = mysqli_query($conexao, $sql_quest);
            if ($resultado == TRUE) {
                header("Location: list_questionario.php?msg=3");
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        }
    }
}
