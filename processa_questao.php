<?php
include_once("controle.php");

if (isset($_POST['cadastrar'])) {
    $enunciado = mysqli_escape_string($conexao, $_POST['enunciado']);
    $alt1 = mysqli_escape_string($conexao, $_POST['alt1']);
    $alt2 = mysqli_escape_string($conexao, $_POST['alt2']);
    $alt3 = mysqli_escape_string($conexao, $_POST['alt3']);
    $alt4 = mysqli_escape_string($conexao, $_POST['alt4']);
    $altcorreta = mysqli_escape_string($conexao, $_POST['correta']);

    if (!empty($enunciado) && !empty($alt1) && !empty($alt2) && !empty($alt3) && !empty($alt4) && !empty($altcorreta)) {
        if (isset($_FILES['imagem']) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            $name_img = $imagem['name'];
            $tmp_name = $imagem['tmp_name'];
            $diretorio = "uploads/";
            $extension = strtolower(pathinfo($name_img, PATHINFO_EXTENSION));
            $newname_img = uniqid() . '.' . $extension;
            move_uploaded_file($tmp_name, $diretorio . $newname_img);
            $arv_img = $diretorio . $newname_img;
        } else {
            $arv_img = NULL;
        }
        
        $sql = "INSERT INTO questao (enunciado, imagem, alt_correta, alt_1, alt_2, alt_3, alt_4) VALUE ('$enunciado', '$arv_img', '$altcorreta', '$alt1', '$alt2', '$alt3', '$alt4')";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado == TRUE) {
            header("Location: list_questao.php?msg=1");
        } else {
            echo mysqli_errno($conexao) . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: cad_questao.php?msg=1");
    }
} elseif (isset($_POST['editar'])) {
    $id_questao = mysqli_escape_string($conexao, $_POST['id_questao']);
    $enunciado = mysqli_escape_string($conexao, $_POST['enunciado']);
    $alt1 = mysqli_escape_string($conexao, $_POST['alt1']);
    $alt2 = mysqli_escape_string($conexao, $_POST['alt2']);
    $alt3 = mysqli_escape_string($conexao, $_POST['alt3']);
    $alt4 = mysqli_escape_string($conexao, $_POST['alt4']);
    $altcorreta = mysqli_escape_string($conexao, $_POST['correta']);

    if (!empty($enunciado) && !empty($alt1) && !empty($alt2) && !empty($alt3) && !empty($alt4) && !empty($altcorreta)) {
        if (isset($_FILES['imagem']) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            $name = $imagem['name'];
            $tmp_name = $imagem['tmp_name'];
            $diretorio = "uploads/";

            $sql = "SELECT (imagem) FROM questao WHERE id_questao='$id_questao'";
            $consulta = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_assoc($consulta);
            unlink($dados['imagem']);

            $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $newname_img = uniqid() . '.' . $extension;
            move_uploaded_file($tmp_name, $diretorio . $newname_img);
            $arv_img = $diretorio . $newname_img;
        } else if ($_FILES["imagem"]["error"] == UPLOAD_ERR_NO_FILE) {
            $arv_img = NULL;
        }

        $sql = "UPDATE questao SET enunciado='$enunciado', imagem='$arv_img', alt_correta='$altcorreta', alt_1='$alt1', alt_2='$alt2', alt_3='$alt3', alt_4='$alt4' WHERE id_questao=$id_questao";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado == TRUE) {
            header("Location: list_questao.php?msg=2");
        } else {
            echo mysqli_errno($conexao) . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: edit_questao.php?id_questao=$id_questao&msg=1");
    }
} elseif (isset($_GET['deletar'])) {
    $id_questao = mysqli_escape_string($conexao, $_GET['deletar']);
    $verificador = "SELECT * FROM contem WHERE id_questao = $id_questao LIMIT 1";
    $consulta = mysqli_query($conexao, $verificador);
    if (mysqli_num_rows($consulta) == 0) {
        $sql = "SELECT * FROM questao WHERE id_questao = $id_questao";
        $result = mysqli_query($conexao, $sql);
        if ($result == TRUE) {
            $sql = "DELETE FROM questao WHERE id_questao = $id_questao";
            $resultado = mysqli_query($conexao, $sql);
            if ($resultado == FALSE) {
                echo mysqli_error($conexao);
                header("Location: list_questao.php?msg=4");
            } else {
                $dados = mysqli_fetch_assoc($result);
                if (!empty($dados['imagem'])) {
                    unlink($dados['imagem']);
                }
                header("Location: list_questao.php?msg=3");
            }
        } else {
            echo mysqli_errno($conexao) . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: list_questao.php?msg=4");
    }
}
