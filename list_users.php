<?php
include_once('controle.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Usuários do Sistema</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2>Usuários do Sistema</h2>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) :
            $msg = $_GET['msg'];
            if ($msg == 1) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Usuário cadastrado com sucesso!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Usuário editado com sucesso!
                </div>
            <?php } else if ($msg == 3) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Usuário excluído com sucesso!
                </div>
        <?php } 
        endif ?>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead class="text-center">
                            <tr>
                                <td>Nome</td>
                                <td>Email</td>
                                <td colspan="2">Opções</td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $sql = "SELECT * FROM usuario WHERE tipo = 0";
                            $result = mysqli_query($conexao, $sql);
                            $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach ($usuarios as $usuario) { ?>
                                <tr class="text-center">
                                    <td><?= $usuario['nome']; ?></td>
                                    <td><?= $usuario['email']; ?></td>
                                    <td><a href="edit_usuario.php?id_usuario=<?= $usuario['id_usuario']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);" <?php if($_SESSION['tipo'] == $usuario['tipo']){?>  <?php } ?>>Editar</a></td>
                                    <td><button type="button" class="card-link btn text-light" style="background-color: var(--color-purple);" data-bs-toggle="modal" data-bs-target="#excluir<?= $usuario['id_usuario']; ?>" <?php if($_SESSION['tipo'] == $usuario['tipo']){?> disabled <?php } ?>>Excluir</button></td>
                                </tr>
                                <div class="modal fade" id="excluir<?= $usuario['id_usuario']; ?>" tabindex="-1" aria-labelledby="excluirlabel<?= $usuario['id_usuario']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="excluirlabel<?= $usuario['id_usuario']; ?>">Excluir Usuário?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Você deseja mesmo excluir este usuário?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não, cancela!</button>
                                                <a href="processa_usuario.php?deletar=<?= $usuario['id_usuario']; ?>" class="btn text-light" style="background-color: var(--color-purple);">Sim, excluir!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>