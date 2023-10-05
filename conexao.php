<?php
function conectar(){
    $bdServidor = "localhost";
    $bdUsuario = "root";
    $bdSenha = "";
    $bdBanco = "quimica_forense";

    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
    
    if ($conexao) {
        return $conexao;
    } else {
        die("Erro ao acessar o banco de dados! " . mysqli_connect_errno() . ": " . mysqli_connect_error());
    }
}
?>