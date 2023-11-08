<?php
include_once('controle.php');
$sql = "SELECT * FROM questao";
$result = mysqli_query($conexao, $sql);
$questoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <title>Cadastrar Questionário</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Cadastrar Questionário</h2>
                    <div class="m-3"><i class="fa-solid fa-clipboard-question fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="processa_questionario.php">
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Título:</label>
                            <input class="form-control" type="text" name="titulo" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Assunto:</label>
                            <input class="form-control" type="text" name="assunto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Data de Início:</label>
                            <input class="form-control" type="date" name="data_inicio" required>
                        </div>
                        <div class="col-xl-6 py-2">
                            <label class="form-label">Data de Término:</label>
                            <input class="form-control" type="date" name="data_termino" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2 text-center">
                            <span>Selecione 10 questões para compor o questionário.</span>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $limite = 2;
                        $count = 0;
                        foreach ($questoes as $questao) :
                            $count++;
                        ?>
                            <div class="col-xl-6 py-3">
                                <div class="card text-center h-100">
                                    <div class="card-header">
                                        <label><input type="checkbox" id="checkbox" name="select_question[]" onclick="limitar()" value="<?php echo $questao['id_questao'] ?>"> Questão n° <?php echo $questao['id_questao']; ?></label>
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
                        <?php endforeach ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-end py-3">
                                <button class="btn link-body-emphasis text-light" type="submit" id="cadastro" name="cadastrar" style="background-color: var(--color-purple);" disabled>Cadastrar</button>
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
        function limitar(){
            let botaoEnvio = document.getElementById("cadastro");
            let checkBoxes = document.querySelectorAll("#checkbox");
            let limite = 10;
            let selecionado = 0;
            for (count = 0; count < checkBoxes.length; count++) {
                if (checkBoxes[count].checked == true) {
                    selecionado = selecionado + 1;
                    console.log(selecionado);
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