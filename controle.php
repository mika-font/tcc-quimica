<?php
session_start();
if (!isset($_SESSION['email']) or !isset($_SESSION['id_usuario']) or !isset($_SESSION['tipo'])){
    unset($_SESSION['email']);
    unset($_SESSION['id_usuario']);
    unset($_SESSION['tipo']);
    session_destroy();
    header('Location: login.php');
} else {
    include_once("conexao.php");
    $conexao = conectar();
}
?>