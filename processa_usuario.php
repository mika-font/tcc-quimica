<?php
if (isset($_POST['cadastrar'])) {
    session_start();
    include_once('conexao.php');
    $conexao = conectar();

    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);
    $repetirSenha = mysqli_escape_string($conexao, $_POST['repetirSenha']);
    $tipo = 0;

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
        if ($senha == $repetirSenha) {
            $comando = "SELECT email FROM usuario WHERE email='$email'";
            $consulta = mysqli_query($conexao, $comando);
            if (mysqli_num_rows($consulta) == 0) {
                $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha_cript', '$tipo')";
                $resultado = mysqli_query($conexao, $sql);
                if ($resultado == true) {
                    if (isset($_SESSION) && $_SESSION['tipo'] == 2) {
                        header("Location: list_users.php?msg=1");
                    } else {
                        header("Location: login.php?msg=1");
                    }
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            } else {
                header("Location: cad_usuario.php?msg=3");
            }
        } else {
            header("Location: cad_usuario.php?msg=2");
        }
    } else {
        header("Location: cad_usuario.php?msg=1");
    }
} else if (isset($_POST['editar'])) {
    include_once('controle.php');

    $id_usuario = mysqli_escape_string($conexao, $_POST['id_usuario']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);
    $repetirSenha = mysqli_escape_string($conexao, $_POST['repetirSenha']);
    $tipo = mysqli_escape_string($conexao, $_POST['tipo']);

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($repetirSenha)) {
        if ($senha == $repetirSenha) {
            $comando = "SELECT email FROM usuario WHERE email='$email'";
            $consulta = mysqli_query($conexao, $comando);
            $email_bd = mysqli_fetch_assoc($consulta);
            if (mysqli_num_rows($consulta) == 0 || $email == $email_bd['email']) {
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
                header("Location: edit_usuario.php?id_usuario=$id_usuario&msg=3");
            }
        } else {
            header("Location: edit_usuario.php?id_usuario=$id_usuario&msg=2");
        }
    } else {
        header("Location: edit_usuario.php?id_usuario=$id_usuario&msg=1");
    }
} else if (isset($_GET['deletar'])) {
    include_once('controle.php');
    $id_usuario = mysqli_escape_string($conexao, $_GET['deletar']);
    $sql_responde = "DELETE FROM responde WHERE id_usuario = $id_usuario";
    $consulta = mysqli_query($conexao, $sql_responde);
    if($consulta == TRUE){
        $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado == true) {
            header("Location: list_users.php?msg=3");
        } else {
            echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
            die();
        }
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
