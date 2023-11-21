<?php
include_once("controle.php");
if (isset($_POST['cadastrar'])) {
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $sinopse = mysqli_escape_string($conexao, $_POST['sinopse']);
    $arquivo = $_FILES['arquivo'];
    $imagem = $_FILES['imagem'];
    if (!empty($titulo) && !empty($sinopse)) {
        if (!empty($arquivo['name']) && $arquivo['error'] === UPLOAD_ERR_OK) {
            $name_arquivo = $arquivo['name'];
            $tmp_name_arquivo = $arquivo['tmp_name'];
            $diretorio = "uploads/";

            $extension_arquivo = strtolower(pathinfo($name_arquivo, PATHINFO_EXTENSION));
            $newname_arv = uniqid() . '.' . $extension_arquivo;
            move_uploaded_file($tmp_name_arquivo, $diretorio . $newname_arv);
            $arv_arv = $diretorio . $newname_arv;
        } else {
            $arv_arv = NULL;
        }
        if (!empty($imagem['name']) && $imagem['error'] === UPLOAD_ERR_OK) {
            $name_imagem = $imagem['name'];
            $tmp_name_imagem = $imagem['tmp_name'];
            $diretorio = "uploads/";

            $extension_imagem = strtolower(pathinfo($name_imagem, PATHINFO_EXTENSION));
            $newname_img = uniqid() . '.' . $extension_imagem;
            move_uploaded_file($tmp_name_imagem, $diretorio . $newname_img);
            $arv_img = $diretorio . $newname_img;
        } else {
            $arv_img = NULL;
        }
        $sql = "INSERT INTO recomendacao (titulo, sinopse, imagem, arquivo) VALUE ('$titulo', '$sinopse', '$arv_img', '$arv_arv')";
        $resultado = mysqli_query($conexao, $sql);

        if($resultado == TRUE){
            header("Location: list_recom.php?msg=1");
        } else {
            echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: cad_recom.php?msg=1"); 
    }
} else if (isset($_POST['editar'])) {
    $id_recom = mysqli_escape_string($conexao, $_POST['id_recom']);
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $sinopse = mysqli_escape_string($conexao, $_POST['sinopse']);
    $arquivo = $_FILES['arquivo'];
    $imagem = $_FILES['imagem'];
    if (!empty($titulo) && !empty($sinopse)) {
        if (!empty($arquivo['name']) && $arquivo['error'] === UPLOAD_ERR_OK) {
            $name_arquivo = $arquivo['name'];
            $tmp_name_arquivo = $arquivo['tmp_name'];
            $diretorio = "uploads/";

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
        if (!empty($imagem['name']) && $imagem['error'] === UPLOAD_ERR_OK) {
            $name_imagem = $imagem['name'];
            $tmp_name_imagem = $imagem['tmp_name'];
            $diretorio = "uploads/";

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
} else if (isset($_GET['deletar'])) {
    $id_recom = mysqli_escape_string($conexao, $_GET['deletar']) ;
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