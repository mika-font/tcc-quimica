<?php
include_once('controle.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);

$sql_casos = "SELECT caso.id_caso, titulo, local, data, GROUP_CONCAT(imagem.url) 
AS urls_img FROM caso INNER JOIN imagem ON caso.id_caso = imagem.id_caso GROUP BY id_caso ORDER BY caso.id_caso DESC LIMIT 6";
$result_casos = mysqli_query($conexao, $sql_casos);

$sql_recom = "SELECT * FROM recomendacao ORDER BY id_recom DESC LIMIT 6";
$result_recom = mysqli_query($conexao, $sql_recom);

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Menu - <?php echo $dados['nome'] ?></title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-2">
                    <h2 class="h2">Bem-vindo a plataforma, <?= $dados['nome']; ?></h2>
                    <hr>
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="text-center aling-center">
                    <img src="./assets/img-sistem/logo.png" width="300px" height="auto">
                </div>
            </div>
            <div class="col-xl-7">
                <div class="text-wrap msg_inic">
                    <p class="mb-1">Esta plataforma foi especialmente elaborada para introduzí-lo no mundo da criminologia.</p>
                    <p class="mb-1">Não deixe de visitar a aba de conteúdos, onde desenvolvemos materiais completos e repleto de imagens para demonstrar as diferentes situações que um perito criminal poderá enfrentar na sua carreira.
                    E para treinar seus conhecimentos, visite a aba de questionários e responda as questões relacionadas ao conteúdo estudado, as respostas serão entregues à equipe pedagógica da plataforma para avaliarmos seu andamento e a efetividade do ensino, sua ajuda é extremamente importante.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>Veja alguns casos criminais...</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <?php
            $limite = 3;
            $count = 0;
            while ($casos = mysqli_fetch_assoc($result_casos)) :
                $urls = explode(",", $casos['urls_img']);
                $dataTime = date_create($casos['data']);
                $dataformat = date_format($dataTime, 'd/m/Y');
                $count++;
            ?>
                <div class="col-xl-4">
                    <div class="card me-2 bg-dark text-bg-dark h-100">
                        <img src="<?php echo $urls[0]; ?>" class="card-img object-fit-cover" height="100%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $casos['titulo']; ?></h5>
                            <p class="card-text"><?php echo "<b>Local:</b> " . $casos['local'] . "<br><b> Data:</b> " . $dataformat; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="visualizar_caso.php?id_caso=<?= $casos['id_caso']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
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
        <hr>
        <div class="row">
            <div class="col">
                <h4>Leia e assista algumas recomendações...</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <?php
            $limite = 3;
            $count = 0;
            while ($recom = mysqli_fetch_assoc($result_recom)) :
                $id_recom_p = $recom['id_recom'];
                $link_img = $recom['imagem'];
                $link_arq = $recom['arquivo'];

                $texto = $recom['sinopse'];
                $sinopse = recortarText($texto);
                $count++;
            ?>
                <div class="col-xl-6">
                    <div class="card h-100 bg-dark text-bg-dark text-center me-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $recom['titulo']; ?></h5>
                            <p class="card-text"><?php echo $sinopse; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="card-link btn text-light" style="background-color: var(--color-purple);" data-bs-toggle="modal" data-bs-target="#visual<?= $id_recom_p; ?>">Visualizar</button>
                        </div>
                    </div>
                </div>
                <div class="modal modal-xl fade" id="visual<?= $id_recom_p; ?>" tabindex="-1" aria-labelledby="visuallabel<?= $id_recom_p; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="visuallabel<?= $id_recom_p; ?>"><?= $recom['titulo']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-wrap pb-3"><?= $texto; ?></div>
                                <?php if($link_img != NULL){ ?>
                                    <div class="text-center p-2"><img src="<?= $link_img; ?>" height="200px" width="auto"></div>
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
                <?php if ($count == $limite) :
                    echo '<div class="py-3"></div>';
                    echo '</div>';
                    echo '<div class="row">';
                    $count = 0;
                endif ?>
            <?php endwhile ?>
            </div>
        </div>
        <hr>
    </main>
    <?php include_once('rodape.php')?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>