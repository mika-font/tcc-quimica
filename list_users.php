<?php
include_once('controle.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
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
            <div class="col s12">
                <h3>Usuários do Sistema</h3>
                <hr>
                <table class="striped">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Email</td>
                            <td colspan="2">Opções</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM usuario";
                        $result = mysqli_query($conexao, $sql);
                        $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <td><?php echo $usuario['nome']; ?></td>
                                <td><?php echo $usuario['email']; ?></td>
                                <td><a href="edit_usuario.php?id_usuario=<?php echo $usuario['id_usuario']; ?>" class="btn-floating purple"><i class="fa-sharp fa-solid fa-pen" style="color: #000000;"></i></a></td>
                                <td><a href="processa_usuario.php?id_usuario=<?php echo $usuario['id_usuario']; ?>" name="deletar" class="btn-floating red" name="deletar"><i class="fa-solid fa-trash" style="color: #000000;"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php')?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>