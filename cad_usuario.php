<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Cadastrar Conta</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Cadastrar Conta</h2>
                    <div class="m-3"><i class="fa-solid fa-user-secret fa-2xl"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) :
            $msg = $_GET['msg'];
            if ($msg == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    É necessário completar os campos abaixo!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    As senhas devem ser iguais!
                </div>
            <?php } else if ($msg == 3) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Já existe uma conta cadastrada com este email!
                </div>
        <?php }
        endif ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="processa_usuario.php" class="form-cad-user">
                    <div class="text-center">
                        <p>Campo Obrigatório: *</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Nome:*</label>
                            <input class="form-control" type="text" name="nome" class="input" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Email:*</label>
                            <input class="form-control" type="email" name="email" class="input" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Senha:*</label>
                            <input class="form-control" type="password" name="senha" class="input" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Repetir Senha:*</label>
                            <input class="form-control" type="password" name="repetirSenha" class="input" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 py-2">
                            <?php if (isset($_SESSION['id_usuario'])) { ?>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="radio" value="1" name="tipo">Professor</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label"><input class="form-check-input" type="radio" value="0" name="tipo">Aluno</label> 
                                </div>
                            <?php } elseif (!isset($_SESSION['id_usuario'])) { ?>
                                <p>Já possui conta? Faça <a href="login.php">Login</a></p>
                            <?php } ?>
                        </div>
                        <div class="col-xl-4">
                            <div class="text-end py-2">
                                <button class="btn link-body-emphasis text-light" type="submit" class="input" name="cadastrar" style="background-color: var(--color-purple)">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>