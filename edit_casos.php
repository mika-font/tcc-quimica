<?php
include_once('controle.php');
$id_caso = $_GET['id_caso'];
$sql = "SELECT * FROM caso WHERE id_caso = '$id_caso'";
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
    <title>Formulário de Caso Criminal</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Editar Caso Criminal</h2>
                    <div class="m-3"><i class="fa-sharp fa-solid fa-newspaper fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                Os campos devem ser preenchidos corretamente!
            </div>
        <?php endif; ?>
        <form method="POST" action="processa_casos.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 py-2">
                    <input type="hidden" name="id_caso" value="<?php echo $dados['id_caso'] ?>">
                    <label class="form-label">Título:</label>
                    <input class="form-control" type="text" name="titulo" value="<?php echo $dados['titulo'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 py-2">
                    <label class="form-label">Local:</label>
                    <input class="form-control" type="text" name="local" value="<?php echo $dados['local'] ?>" required>
                </div>
                <div class="col-xl-6 py-2">
                    <label class="form-label">Data:</label>
                    <input class="form-control" type="date" name="data" value="<?php echo $dados['data'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 py-2">
                    <label class="form-label">Descrição: </label>
                    <textarea class="form-control" name="texto" id="texto" cols="100" rows="30" required><?php echo $dados['descricao'] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 py-2">
                    <label class="form-label">Imagem(ns):</label>
                    <input class="form-control" type="file" name="imagem[]" multiple required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-end py-3">
                        <button class="btn link-body-emphasis text-light" type="submit" name="editar" style="background-color: var(--color-purple);">Editar</button>
                        <a class="btn link-body-emphasis text-light" href="list_casos.php" style="background-color: var(--color-blue);">Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>