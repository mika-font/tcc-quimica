<?php
include_once('controle.php');
$sql = "SELECT * FROM questao";
$resultado = mysqli_query($conexao, $sql);

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
    <title>Listar Questões</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pd-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Questões</h2>
                    <hr>
                </div>   
            </div>
        </div>
        <div class="row">
            <?php 
            $limite = 2;
            $count = 0;
            while ($dados = mysqli_fetch_assoc($resultado)) : 
                $count++;
            ?>
            <div class="col-xl-6">
                <div class="card text-center h-100">
                    <div class="card-header">Questão <?php echo $dados['id_questao']; ?></div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $dados['enunciado']; ?></p>
                        <?php if (!empty($dados['imagem'])):?>
                            <img src="<?php echo $dados['imagem']?>" height="200px" width="auto">
                        <?php endif ?>
                        <div class="text-start">
                            <p><?php echo "a) " . $dados['alt_1'] ?></p>
                            <p><?php echo "b) " . $dados['alt_2'] ?></p>
                            <p><?php echo "c) " . $dados['alt_3'] ?></p>
                            <p><?php echo "d) " . $dados['alt_4'] ?></p>
                            <p><b>Resposta: <?php if ($dados['alt_correta'] == "alt1") {
                                                echo $dados['alt_1'];
                                            } elseif ($dados['alt_correta'] == "alt2") {
                                                echo $dados['alt_2'];
                                            } elseif ($dados['alt_correta'] == "alt3") {
                                                echo $dados['alt_3'];
                                            } else {
                                                echo $dados['alt_4'];
                                            } ?></b></p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="edit_questao.php?id_questao=<?php echo $dados['id_questao']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Editar</a>
                        <a href="processa_questao.php?deletar=<?php echo $dados['id_questao']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Excluir</a>
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