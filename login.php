<?php
if (isset($_POST['acessar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once("conexao.php");
    $conexao = conectar();
    session_start();

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_assoc($resultado);

        $_SESSION['email'] = $email;
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        $_SESSION['tipo'] = $dados['tipo'];

        header("Location: central.php");
    } elseif (mysqli_num_rows($resultado) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['id_usuario']);
        unset($_SESSION['tipo']);
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Login</title>
</head>

<body class="fundo">
    <main>
        <div class="row">
            <div class="col-xl-8">
                <div class="container text-light text-center text-login">
                    <h1>Bem vindo ao...</h1>
                    <h1>C₃ - Café, Crimes e Casos</h1>
                    <p>Descubra os segredos da química forense com a plataforma C3. A teoria e prática se unem em apenas uma interface interativa para desenvolver suas habilidades analíticas. Acesse de qualquer lugar e aprofunde seus conhecimentos na investigação criminal e química forense.</p>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="vh-100" style="background-color: var(--color-white);">
                    <div class="container px-4">
                        <div class="py-2">
                            <a href="index.php"><i class="fa-sharp fa-solid fa-arrow-left fa-xl" style="color: #000205;"></i></a>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="text-center py-3">
                                    <h3>Login</h3>
                                    <div class="m-3"><i class="fa-solid fa-user-secret fa-2xl"></i></div>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-12 py-2">
                                    <label class="form-label"><div class="mx-1"><i class="fa-solid fa-envelope fa-xl"></i> Email:</div></label>
                                    <input class="form-control" type="email" name="email" class="input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 py-2">
                                    <label class="form-label"><div class="mx-1"><i class="fa-solid fa-key fa-lg"></i> Senha:</div></label>
                                    <input class="form-control" type="password" name="senha" class="input" required>
                                    <div class="text-end py-2"><span><a href="recuperar_senha.php">Esqueceu a senha?</a></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-center">
                                    <button class="btn link-body-emphasis text-light" type="submit" name="acessar" style="background-color: var(--color-purple);">Acessar</button>
                                    <p class="py-2">Não possui conta? <a href="cad_usuario.php">Cadastre-se</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>