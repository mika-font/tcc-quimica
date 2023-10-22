<?php
include_once('controle.php');
$id_caso = $_GET['id_caso'];
$sql = "SELECT caso.id_caso, titulo, local, data, descricao, GROUP_CONCAT(imagem.url) 
AS urls_img FROM caso INNER JOIN imagem ON caso.id_caso = imagem.id_caso WHERE caso.id_caso = $id_caso";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);

$urls = explode(",", $dados['urls_img']);
$dataTime = date_create($dados['data']);
$dataformat = date_format($dataTime, 'd/m/Y');
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
    <title><?= $dados['titulo']; ?></title>
</head>

<body>
    <?php include_once('cabecalho.php') ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2"><?= $dados['titulo']; ?></h2>
                    <div class="m-3"><i class="fa-solid fa-file-invoice fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="h6"><strong>Local: </strong><?= $dados['local']; ?> <strong> Data: </strong><?= $dataformat; ?></p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-wrap">
                    <?= $dados['descricao']; ?>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <?php for($i = 0; $i < count($urls); $i++) : ?>
                        <img src="<?= $urls[$i]; ?>" height="200px" width="auto">
                    <?php endfor ?>
                </div>

            </div>
        </div>
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>