<?php
include_once('controle.php');
$sql = "SELECT * FROM recomendacao";
$resultado = mysqli_query($conexao, $sql);

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$result = mysqli_query($conexao, $sql);
$user = mysqli_fetch_assoc($result);

function recortarText($texto)
{
    $palavras = explode(' ', $texto);
    $recorte = array_slice($palavras, 0, 20);
    $sinopse = implode(' ', $recorte);
    return $sinopse;
}
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
    <title>Listar Recomendações</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Recomendações</h2>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) :
            $msg = $_GET['msg'];
            if ($msg == 1) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Recomendação cadastrada com sucesso!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Recomendação editada com sucesso!
                </div>
            <?php } else if ($msg == 3) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Recomendação excluída com sucesso!
                </div>
        <?php }
        endif ?>
        <div class="row">
            <?php
            $limite = 2;
            $count = 0;
            while ($dados = mysqli_fetch_assoc($resultado)) :
                $id_recom_p = $dados['id_recom'];
                $link_img = $dados['imagem'];
                $link_arq = $dados['arquivo'];

                $texto = nl2br($dados['sinopse']);
                $sinopse = recortarText($texto);
                $count++;
            ?>
                <div class="col-xl-6 py-2">
                    <div class="card h-100 bg-dark text-bg-dark text-center me-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
                            <p class="card-text"><?php echo $sinopse . "..."; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="card-link btn text-light" style="background-color: var(--color-purple);" data-bs-toggle="modal" data-bs-target="#visual<?= $id_recom_p; ?>">Visualizar</button>
                            <?php if ($user['tipo'] == 1) : ?>
                                <a href="edit_recom.php?id_recom=<?= $id_recom_p; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Editar</a>
                                <button type="button" class="card-link btn text-light" style="background-color: var(--color-purple);" data-bs-toggle="modal" data-bs-target="#excluir<?= $id_recom_p; ?>">Excluir</button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="modal modal-xl fade" id="visual<?= $id_recom_p; ?>" tabindex="-1" aria-labelledby="visuallabel<?= $id_recom_p; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="visuallabel<?= $id_recom_p; ?>"><?= $dados['titulo']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-wrap msg_inic pb-3"><?= $texto; ?></div>
                                <?php if($link_img != NULL){ ?>
                                    <div class="text-center p-2"><img src="<?= $link_img; ?>" height="500px" width="auto"></div>
                                <?php } ?>
                                <?php if($link_arq != NULL){ ?>
                                    <p>Acesse o documento complementar através do link: <a href="<?= $link_arq; ?>">Arquivo PDF</a></p>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar Recomendação</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="excluir<?= $id_recom_p; ?>" tabindex="-1" aria-labelledby="excluirlabel<?= $id_recom_p; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="excluirlabel<?= $id_recom_p; ?>">Excluir esta recomendação?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Você deseja mesmo excluir esta recomendação?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não, cancela!</button>
                                <a href="processa_recom.php?deletar=<?= $id_recom_p; ?>" class="btn text-light" style="background-color: var(--color-purple);">Sim, excluir!</a>
                            </div>
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
        </div>            
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>