<?php
include_once("controle.php");
if (isset($_POST['cadastrar'])) {
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $imagem = $_FILES['imagem'];
    $arquivo = $_FILES['arquivo'];
    if (!empty($titulo) && !empty($sinopse)) {
        if (!empty($imagem) || !empty($arquivo)) {
            $name_imagem = $imagem['name'];
            $tmp_name_imagem = $imagem['tmp_name'];
            $name_arquivo = $arquivo['name'];
            $tmp_name_arquivo = $arquivo['tmp_name'];
            
            $diretorio = "uploads/";

            $extension_imagem = strtolower(pathinfo($name_imagem, PATHINFO_EXTENSION));
            $newname_img = uniqid() . '.' . $extension_imagem;
            move_uploaded_file($tmp_name_imagem, $diretorio . $newname_img);

            $extension_arquivo = strtolower(pathinfo($name_arquivo, PATHINFO_EXTENSION));
            $newname_arv = uniqid() . '.' . $extension_arquivo;
            move_uploaded_file($tmp_name_arquivo, $diretorio . $newname_arv);

            $arv_img = $diretorio . $newname_img;
            $arv_arv = $diretorio . $newname_arv;

            $sql = "INSERT INTO recomendacao (titulo, sinopse, imagem, arquivo) VALUE ('$titulo', '$sinopse', '$arv_img', '$arv_arv')";
            $resultado = mysqli_query($conexao, $sql);

            if($resultado == TRUE){
                header("Location: list_recom.php?msg=1");
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: cad_recom.php?msg=2");
        }
    } else {
        header("Location: cad_recom.php?msg=1"); 
    }
} else if ($_POST['editar']) {
    $id_recom = $_POST['id_recom'];
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    if (!empty($titulo) && !empty($sinopse)) {
        $diretorio = "uploads/";
        if (isset($_FILES['arquivo'])) {
            $arquivo = $_FILES['arquivo'];
            $name_arquivo = $arquivo['name'];
            $tmp_name_arquivo = $arquivo['tmp_name'];

            $sql = "SELECT (arquivo) FROM recomendacao WHERE id_recom='$id_recom'";
            $consulta = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_assoc($consulta);
            unlink($dados['arquivo']);

            $extension_arquivo = strtolower(pathinfo($name_arquivo, PATHINFO_EXTENSION));
            $newname_arv = uniqid() . '.' . $extension_arquivo;
            move_uploaded_file($tmp_name_arquivo, $diretorio . $newname_arv);
            $arv_arv = $diretorio . $newname_arv;
        } else {
            $arv_arv = NULL;
        }
        if (isset($_FILES['imagem'])) {
            $imagem = $_FILES['imagem'];
            $name_imagem = $imagem['name'];
            $tmp_name_imagem = $imagem['tmp_name'];

            $sql = "SELECT (imagem) FROM recomendacao WHERE id_recom='$id_recom'";
            $consulta = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_assoc($consulta);
            unlink($dados['imagem']);

            $extension_imagem = strtolower(pathinfo($name_imagem, PATHINFO_EXTENSION));
            $newname_img = uniqid() . '.' . $extension_imagem;
            move_uploaded_file($tmp_name_imagem, $diretorio . $newname_img);
            $arv_img = $diretorio . $newname_img;
        } else {
            $arv_img = NULL;
        }
            $sql = "UPDATE recomendacao SET titulo='$titulo', sinopse='$sinopse', imagem='$arv_img', arquivo='$arv_arv' WHERE id_recom=$id_recom";
            $resultado = mysqli_query($conexao, $sql);
            if($resultado == TRUE){
                header("Location: list_recom.php?msg=2");
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
    } else {
        header("Location: edit_recom.php?id_recom=$id_recom&msg=1");
    }
} else if ($_GET['deletar']) {
    $id_recom = $_GET['deletar'];
    $sql = "SELECT * FROM recomendacao WHERE id_recom=$id_recom";
    $result = mysqli_query($conexao, $sql);
    if($result == TRUE){
        $dados = mysqli_fetch_assoc($result);
        if(!empty($dados['arquivo'])){
            unlink($dados['arquivo']);
        }
        if(!empty($dados['imagem'])){
            unlink($dados['imagem']);
        }
        $sql = "DELETE FROM recomendacao WHERE id_recom=$id_recom";
        $resultado = mysqli_query($conexao, $sql);
        if($resultado == TRUE){
            header("Location: list_recom.php?msg=3");
        } else {
            echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
            die();
        }
    }
}
?>