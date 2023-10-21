<?php
include_once('conexao.php');
$conexao = conectar();
if (isset($_POST['solicitar'])) {
    $nova_senha = substr(md5(time()), 0, 6);
    $nova_senha_cript = md5(md5($nova_senha));
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);
    
    if ($resultado == TRUE) {
        if (mysqli_num_rows($resultado) > 0) {
            if ($x) {
                $sql = "UPDATE usuario SET senha = '$nova_senha_cript' WHERE email = '$email'";
                $resultado = mysqli_query($conexao, $sql);
                if ($resultado == TRUE) {
                } else {
                    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                    die();
                }
            }
        } else {
            $msg = 1;
        }
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Recuperar Senha</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h1>Recuperar a Senha</h1>
                    <div class="m-3"><i class="fa-solid fa-lock fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($msg)) : 
            if ($msg == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    O email fornecido não existe em nosso banco!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    As senhas devem ser iguais!
                </div>
        <?php }
        endif ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="" class="">
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="email" name="email" class="input" required>
                        </div>
                        <div class="col-xl-12 py-2">
                            <div class="text-end">
                                <button class="btn link-body-emphasis text-light" type="submit" class="input" name="solicitar" style="background-color: var(--color-purple)">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>