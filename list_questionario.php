<?php
include_once('controle.php');
$sql = "SELECT * FROM questionario";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$result = mysqli_query($conexao, $sql);
$user = mysqli_fetch_assoc($result);

function date_verify($date_bd_inicio, $date_bd_final){
    $hoje = date('Y-m-d');
    $time_hoje = strtotime($hoje);
    $time_inicio = strtotime($date_bd_inicio);
    $time_final = strtotime($date_bd_final);
    if($time_hoje >= $time_inicio && $time_hoje <= $time_final){
        return TRUE;
    } else {
        return FALSE;
    }
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
    <title>Questionários</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2>Questionários</h2>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) :
            $msg = $_GET['msg'];
            if ($msg == 1) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Questionário cadastrado com sucesso!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Questionário editado com sucesso!
                </div>
            <?php } else if ($msg == 3) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Questionário excluído com sucesso!
                </div>
        <?php } 
        endif ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead class="text-center">
                            <tr>
                                <td>Título</td>
                                <td>Assunto</td>
                                <td>Data de Início</td>
                                <td>Data de Término</td>
                                <td colspan="3">Opções</td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            foreach ($dados as $questionario) :
                                $date_bd_inicio = $questionario['date_inic'];
                                $date_bd_final = $questionario['date_fin'];
                                $verificador = date_verify($date_bd_inicio, $date_bd_final);
                                $data1 = date_create($date_bd_inicio);
                                $data2 = date_create($date_bd_final);
                                $data_inicio = date_format($data1, 'd/m/Y');
                                $data_fim = date_format($data2, 'd/m/Y');
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $questionario['titulo_quest']; ?></td>
                                    <td><?php echo $questionario['assunto']; ?></td>
                                    <td><?php echo $data_inicio; ?></td>
                                    <td><?php echo $data_fim; ?></td>
                                    <?php if ($verificador == TRUE) { ?>
                                        <td><a href="visualizar_questionario.php?questionario=<?= $questionario['id_questionario']?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Responder</a></td>
                                    <?php } else { ?>
                                        <td><button href="visualizar_questionario.php?questionario=<?= $questionario['id_questionario']?>" class="card-link btn text-light" style="background-color: var(--color-purple);" disabled>Responder</button></td>
                                    <?php } ?>
                                    <?php if ($user['tipo'] == 1) : ?>
                                        <td><a href="edit_questionario.php?id_questionario=<?= $questionario['id_questionario']; ?>" class="card-link btn text-light" style="background-color: var(--color-purple);">Editar</a></td>
                                        <td><button type="button" class="card-link btn text-light" style="background-color: var(--color-purple);" data-bs-toggle="modal" data-bs-target="#excluir<?= $questionario['id_questionario']; ?>">Excluir</button></td>
                                        <td><a href="#" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar Respostas</a></td>
                                    <?php endif; ?>
                                </tr>
                                <div class="modal fade" id="excluir<?= $questionario['id_questionario']; ?>" tabindex="-1" aria-labelledby="excluirlabel<?= $questionario['id_questionario']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="excluirlabel<?= $questionario['id_questionario']; ?>">Excluir questionário?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Você deseja mesmo excluir este questionário?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não, cancela!</button>
                                                <a href="processa_questionario.php?deletar=<?= $questionario['id_questionario']; ?>" class="btn text-light" style="background-color: var(--color-purple);">Sim, excluir!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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