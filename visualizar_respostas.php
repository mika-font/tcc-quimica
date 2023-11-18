<?php
include_once('controle.php');
$id_questionario = $_GET['id_questionario'];
$sql = "SELECT usuario.nome, responde.quant_acertos, questionario.titulo_quest FROM usuario 
INNER JOIN responde ON usuario.id_usuario = responde.id_usuario 
INNER JOIN questionario ON responde.id_questionario = questionario.id_questionario 
WHERE questionario.id_questionario = $id_questionario";
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
    <title>Visualizar Retorno</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2>Visualizar Retorno do Questionário</h2>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead class="text-center">
                            <tr>
                                <td>Nome do Aluno</td>
                                <td>Número de Acertos</td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            while ($dados = mysqli_fetch_assoc($resultado)) { ?>
                                <tr class="text-center">
                                    <td><?= $dados['nome']; ?></td>
                                    <td><?= $dados['quant_acertos']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-end py-3">
                    <a href="gerarpdf.php" class="btn link-body-emphasis text-light" style="background-color: var(--color-purple);">Gerar PDF</a> 
                </div>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>