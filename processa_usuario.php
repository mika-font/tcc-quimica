<?php
session_start();
include_once('conexao.php');
$conexao = conectar();

if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $repetirSenha = $_POST['repetirSenha'];
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
        $tipo = 0;
        if ($senha === $repetirSenha) {
            $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
            $resultado = mysqli_query($conexao, $sql);
            if($resultado == true){
                header("Location: login.php?msg=1"); //mensagem dizendo que a conta foi cadastrada com sucesso
            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            header("Location: cad_usuario.php?msg=2"); //mensagem dizendo que as senhas não são iguais
        }
    } else {
        header("Location: cad_usuario.php?msg=1"); //mensagem dizendo que falta completar os campos
    }
} else if (isset($_POST['editar'])) {
    if (isset($_SESSION['id_usuario']) && isset($_SESSION['email']) && isset($_SESSION['tipo'])) {
            $id_usuario = $_POST['id_usuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $repetirSenha = $_POST['repet_senha'];
            $tipo = $_POST['tipo'];

        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
            if($senha == $repetirSenha){
                $sql = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha', tipo='$tipo' WHERE id_usuario='$id_usuario'";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado == true) {
                    header("Location: list_users.php?msg=1"); //mensagem de que a edição deu certo
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            } else {
                header("Location: edit_usuario.php?msg=2"); //mensagem de que as senhas não são iguais
            }
        } else {
            header("Location: edit_usuario.php?msg=1"); //mensagem de que falta completar campos
        }
    } else {
        include_once('controle.php');
    }
} else if (isset($_GET['deletar'])) {
    if (isset($_SESSION['id_usuario']) && isset($_SESSION['email']) && isset($_SESSION['tipo'])) {
        $id_usuario = $_GET['deletar'];
        $sql = "DELETE FROM usuario WHERE id_usuario='$id_usuario'";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado == true) {
            header("Location: list_users.php?msg=3"); //mensagem de que a exclusão deu certo
        } else {
            echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
            die();
        }
    } else {
        include_once('controle.php');
    }
}
