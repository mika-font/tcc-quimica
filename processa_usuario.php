<?php
if (isset($_POST['cadastrar'])) {
    session_start();
    include_once('conexao.php');
    $conexao = conectar();  

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $repetirSenha = $_POST['repetirSenha'];
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
        $tipo = 0;
        if ($senha == $repetirSenha) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha_cript', '$tipo')";
            $resultado = mysqli_query($conexao, $sql);
            if ($resultado == true) {
                if(isset($_SESSION) && $_SESSION['tipo'] == 1){
                    header("Location: list_users.php?msg=1");
                } else {
                    header("Location: login.php?msg=1");
                }
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: cad_usuario.php?msg=2");
        }
    } else {
        header("Location: cad_usuario.php?msg=1");
    }
} else if (isset($_POST['editar'])) {
    include_once('controle.php');

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $repetirSenha = $_POST['repet_senha'];
    $tipo = $_POST['tipo'];

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
        if ($senha == $repetirSenha) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha_cript', tipo='$tipo' WHERE id_usuario='$id_usuario'";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado == true) {
                if ($_SESSION['tipo'] == 1 && $_SESSION['id_usuario'] != $id_usuario) {
                    header("Location: list_users.php?msg=2");
                } else {
                    header("Location: central.php?msg=1");
                }
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: edit_usuario.php?msg=2");
        }
    } else {
        header("Location: edit_usuario.php?msg=1");
    }
} else if (isset($_GET['deletar'])) {
    include_once('controle.php');
    $id_usuario = $_GET['deletar'];
    $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado == true) {
        header("Location: list_users.php?msg=3");
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
