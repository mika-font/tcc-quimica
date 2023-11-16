<?php
if (isset($_POST['acessar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once("conexao.php");
    $conexao = conectar();
    session_start();

    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    $comando = "SELECT * FROM usuario WHERE email = '$email'";
    $consulta = mysqli_query($conexao, $comando);

    if (mysqli_num_rows($consulta) == 1) {
        $senha_bd = mysqli_fetch_assoc($consulta);
        if (password_verify($senha, $senha_bd['senha'])) {
            $_SESSION['email'] = $email;
            $_SESSION['id_usuario'] = $senha_bd['id_usuario'];
            $_SESSION['tipo'] = $senha_bd['tipo'];
            header("Location: central.php");
        } else {
            session_destroy();
            $msg = 2;
        }
    } else if (mysqli_num_rows($consulta) > 1 or mysqli_num_rows($consulta) == 0) {
        session_destroy();
        $msg = 3;
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
                    <h1>Seja Bem vindo(a) ao...</h1>
                    <h1><em>C₃ - Café, Crimes e Casos</em></h1>
                    <p>Descubra os segredos da química forense com a plataforma C3. A teoria e prática se unem em uma interface interativa para adentrar-se no mundo da criminologia. Acesse de qualquer computador e aprofunde seus conhecimentos na química forense e investigação criminal.</p>
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
                        <?php if (isset($_GET['msg'])) {
                            $msg = $_GET['msg'];
                            if ($msg == 1) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button class="btn-close" data-bs-dismiss="alert"></button>
                                    Usuário cadastrado com sucesso!
                                </div>
                            <?php }
                        } else if (isset($msg) && $msg == 2) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                                Senha incorreta, verifique suas credenciais!
                            </div>
                        <?php } else if (isset($msg) && $msg == 3) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                                Email não consta em nosso banco, verifique suas credenciais!
                            </div>
                        <?php } ?>
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-12 py-2">
                                    <label class="form-label">
                                        <div class="mx-1"><i class="fa-solid fa-envelope fa-xl"></i> Email:</div>
                                    </label>
                                    <input class="form-control" type="email" name="email" class="input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 py-2">
                                    <label class="form-label">
                                        <div class="mx-1"><i class="fa-solid fa-key fa-lg"></i> Senha:</div>
                                    </label>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>