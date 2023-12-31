<?php
include_once('controle.php');
$id_questionario = $_GET['id_questionario'];
$sql = "SELECT * FROM questao WHERE questao.id_questao NOT IN (SELECT id_questao FROM contem WHERE id_questionario = $id_questionario)";
$result = mysqli_query($conexao, $sql);
$questoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM questionario WHERE id_questionario=$id_questionario";
$resultado = mysqli_query($conexao, $sql2);
$info_quest = mysqli_fetch_assoc($resultado);

$sql3 = "SELECT * FROM questao INNER JOIN contem ON questao.id_questao = contem.id_questao WHERE contem.id_questionario = $id_questionario";
$retorno = mysqli_query($conexao, $sql3);
$dados = mysqli_fetch_all($retorno, MYSQLI_ASSOC);
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
    <title>Editar Questionário</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Editar Questionário</h2>
                    <div class="m-3"><i class="fa-solid fa-clipboard-question fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) :
            $msg = $_GET['msg'];
            if ($msg == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Preencha todos os campos corretamente!
                </div>
            <?php } else if ($msg == 2) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Selecione somente 10 questões!
                </div>
        <?php }
        endif ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="processa_questionario.php">
                    <div class="text-center">
                        <p>Campo Obrigatório: *</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <input type="hidden" name="id_questionario" value="<?= $id_questionario; ?>">
                            <label class="form-label">Título:*</label>
                            <input class="form-control" type="text" name="titulo" value="<?php echo $info_quest['titulo_quest']; ?>" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Assunto:*</label>
                            <input class="form-control" type="text" name="assunto" value="<?php echo $info_quest['assunto']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Data de Início:*</label>
                            <input class="form-control" type="date" name="data_inicio" value="<?php echo $info_quest['date_inic']; ?>" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Data de Término:*</label>
                            <input class="form-control" type="date" name="data_termino" value="<?php echo $info_quest['date_fin']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2 text-center">
                            <span>Questões pertencentes ao questionario:</span>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $limite = 2;
                        $count = 0;
                        $num_quest = 1;
                        foreach ($dados as $pergunta) :
                            $count++;
                        ?>
                            <div class="col-xl-6 py-3">
                                <div class="card text-center h-100">
                                    <div class="card-header">
                                        <input type="checkbox" id="checkbox" checked name="select_question[]" onclick="limitar()" value="<?php echo $pergunta['id_questao'] ?>"> Questão n° <?= $num_quest; ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $pergunta['enunciado']; ?></p>
                                        <?php if (!empty($pergunta['imagem'])) : ?>
                                            <img src="<?php echo $pergunta['imagem'] ?>" height="200px" width="auto">
                                        <?php endif ?>
                                        <div class="text-start">
                                            <p><?php echo "a) " . $pergunta['alt_1'] ?></p>
                                            <p><?php echo "b) " . $pergunta['alt_2'] ?></p>
                                            <p><?php echo "c) " . $pergunta['alt_3'] ?></p>
                                            <p><?php echo "d) " . $pergunta['alt_4'] ?></p>
                                            <p><b>Resposta: <?php if ($pergunta['alt_correta'] == "A") {
                                                                echo $pergunta['alt_1'];
                                                            } elseif ($pergunta['alt_correta'] == "B") {
                                                                echo $pergunta['alt_2'];
                                                            } elseif ($pergunta['alt_correta'] == "C") {
                                                                echo $pergunta['alt_3'];
                                                            } else {
                                                                echo $pergunta['alt_4'];
                                                            } ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($count == $limite) :
                                echo '</div>';
                                echo '<div class="row">';
                                $count = 0;
                            endif ?>
                        <?php $num_quest++;
                        endforeach ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2 text-center">
                            <span>Selecione as questões que irão compor o questionário:</span>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $limite = 2;
                        $count = 0;
                        $num_quest = 11;
                        foreach ($questoes as $questao) :
                            $count++;
                        ?>
                            <div class="col-xl-6 py-3">
                                <div class="card text-center h-100">
                                    <div class="card-header">
                                        <input type="checkbox" id="checkbox" name="select_question[]" onclick="limitar()" value="<?php echo $questao['id_questao'] ?>"> Questão n° <?= $num_quest; ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $questao['enunciado']; ?></p>
                                        <?php if (!empty($questao['imagem'])) : ?>
                                            <img src="<?php echo $questao['imagem'] ?>" height="200px" width="auto">
                                        <?php endif ?>
                                        <div class="text-start">
                                            <p><?php echo "a) " . $questao['alt_1'] ?></p>
                                            <p><?php echo "b) " . $questao['alt_2'] ?></p>
                                            <p><?php echo "c) " . $questao['alt_3'] ?></p>
                                            <p><?php echo "d) " . $questao['alt_4'] ?></p>
                                            <p><b>Resposta: <?php if ($questao['alt_correta'] == "alt1") {
                                                                echo $questao['alt_1'];
                                                            } elseif ($questao['alt_correta'] == "alt2") {
                                                                echo $questao['alt_2'];
                                                            } elseif ($questao['alt_correta'] == "alt3") {
                                                                echo $questao['alt_3'];
                                                            } else {
                                                                echo $questao['alt_4'];
                                                            } ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($count == $limite) :
                                echo '</div>';
                                echo '<div class="row">';
                                $count = 0;
                            endif ?>
                        <?php $num_quest++;
                        endforeach ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-end py-3">
                                <button class="btn link-body-emphasis text-light" id="editar" type="submit" name="editar" style="background-color: var(--color-purple);" disabled>Editar</button>
                                <a class="btn link-body-emphasis text-light" href="list_questionario.php" style="background-color: var(--color-blue);">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php') ?>
    <script>
        function limitar() {
            let botaoEnvio = document.getElementById("editar");
            let checkBoxes = document.querySelectorAll("#checkbox");
            let limite = 10;
            let selecionado = 0;
            for (count = 0; count < checkBoxes.length; count++) {
                if (checkBoxes[count].checked == true) {
                    selecionado = selecionado + 1;
                    if (selecionado > limite || selecionado < limite) {
                        botaoEnvio.disabled = true;
                    } else {
                        botaoEnvio.disabled = false;
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>