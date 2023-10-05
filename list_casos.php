<?php
include_once('controle.php');
$sql = "SELECT caso.id_caso, titulo, local, data, GROUP_CONCAT(imagem.url) 
AS urls_img FROM caso INNER JOIN imagem ON caso.id_caso = imagem.id_caso GROUP BY id_caso";
$resultado = mysqli_query($conexao, $sql);

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$result = mysqli_query($conexao, $sql);
$user = mysqli_fetch_assoc($result);
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
    <title>Casos Criminais</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Casos Criminais</h2>
                    <hr>
                </div>   
            </div>
        </div>
        <div class="row">
            <?php
            $limite = 3;
            $count = 0;
            while ($dados = mysqli_fetch_assoc($resultado)) :
                $urls = explode(",", $dados['urls_img']);
                $dataTime = date_create($dados['data']);
                $dataformat = date_format($dataTime, 'd/m/Y');
                $count++;
            ?>
                <div class="col-xl-4">
                    <div class="card me-2 bg-dark text-bg-dark h-100">
                        <img src="<?php echo $urls[0]; ?>" class="card-img object-fit-cover" height="100%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
                            <p class="card-text"><?php echo "<b>Local:</b> " . $dados['local'] . "<br><b> Data:</b> " . $dataformat; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
                            <?php if ($user['tipo'] == 1) : ?>
                                <a href="edit_casos.php?id_caso=<?php echo $dados['id_caso']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Editar</a>
                                <a href="processa_casos.php?deletar=<?php echo $dados['id_caso']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Excluir</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php if ($count == $limite) :
                    echo '<div class="py-3"></div>';
                    echo '</div>';
                    echo '<div class="row">';
                    $count = 0;
                endif ?>
            <?php endwhile ?>
        </div>    
    </main>
    <?php include_once('rodape.php')?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>