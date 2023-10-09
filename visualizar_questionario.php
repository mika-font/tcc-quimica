<?php
include_once('controle.php');
if (isset($_GET['questionario'])) {
    $id_questionario = $_GET['questionario'];
} else {
    $id_questionario = $_POST['id_questionario'];
}
$sql = "SELECT * FROM questionario WHERE id_questionario = $id_questionario";
$sql2 = "SELECT * FROM questao INNER JOIN contem ON questao.id_questao = contem.id_questao WHERE contem.id_questionario = $id_questionario";
$result1 = mysqli_query($conexao, $sql);
$result2 = mysqli_query($conexao, $sql2);

if ($result1 == TRUE && $result2 == TRUE) {
    $info_questionario = mysqli_fetch_assoc($result1);
    $questions = mysqli_fetch_all($result2, MYSQLI_ASSOC); 
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}

if (isset($_POST['enviar'])) {
    $contagem = 0;
    $r_quest_1 = $_POST['questao1'];
    $r_quest_2 = $_POST['questao2'];
    $r_quest_3 = $_POST['questao3'];
    $r_quest_4 = $_POST['questao4'];
    $r_quest_5 = $_POST['questao5'];
    $r_quest_6 = $_POST['questao6'];
    $r_quest_7 = $_POST['questao7'];
    $r_quest_8 = $_POST['questao8'];
    $r_quest_9 = $_POST['questao9'];
    $r_quest_10 = $_POST['questao10'];
    if ($r_quest_1 == $questions[0]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_2 == $questions[1]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_3 == $questions[2]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_4 == $questions[3]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_5 == $questions[4]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    }
    if ($r_quest_6 == $questions[5]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_7 == $questions[6]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_8 == $questions[7]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_9 == $questions[8]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if ($r_quest_10 == $questions[9]['alt_correta']) {
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
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
    <title><?php echo $info_questionario['titulo_quest']; ?></title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="id_questionario" value="<?= $info_questionario['id_questionario'] ?>">
            <div class="row">
                <div class="col">
                    <div class="text-center py-3">
                        <h2><?php echo $info_questionario['titulo_quest']; ?></h2>
                        <p><i><?php echo "Assunto: " . $info_questionario['assunto']; ?></i></p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $i = 1;
                $limite = 2;
                $count = 0;
                foreach ($questions as $pergunta) :
                    $count++;
                ?>
                    <div class="col-xl-6 py-3">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <p class="card-text msg_justi"><?php echo $pergunta['enunciado']; ?></p>
                                <?php if (!empty($pergunta['imagem'])) : ?>
                                    <img src="<?php echo $pergunta['imagem'] ?>" height="200px" width="auto">
                                <?php endif ?>
                                <div class="text-start">
                                    <p><label><input type="radio" name="questao<?php echo $i; ?>" value="alt1" required> a) <?php echo $pergunta['alt_1'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?php echo $i; ?>" value="alt2" required> b) <?php echo $pergunta['alt_2'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?php echo $i; ?>" value="alt3" required> c) <?php echo $pergunta['alt_3'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?php echo $i; ?>" value="alt4" required> d) <?php echo $pergunta['alt_4'] ?></label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($count == $limite) :
                        echo '</div>';
                        echo '<div class="row">';
                        $count = 0;
                    endif ?>
                <?php $i++;
                endforeach ?>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-end py-3">
                        <input class="btn link-body-emphasis text-light" type="submit" name="enviar" style="background-color: var(--color-purple);">
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="resposta" aria-labelledby="respostaLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resposaLabel">Seu desempenho no questionário foi o seguinte!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Você acertou <?php echo $contagem ?>/10!</p>
                        <p>Suas respostas serão enviadas ao professor via email.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-light" data-bs-dismiss="modal" style="background-color: var(--color-purple);">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        <?php if (isset($_POST['enviar'])) : ?>
            document.addEventListener("DOMContentLoaded", (event) => {
                var myModal = new bootstrap.Modal(document.getElementById('resposta'));
                myModal.show();
            });
        <?php endif ?>
    </script>
</body>

</html>