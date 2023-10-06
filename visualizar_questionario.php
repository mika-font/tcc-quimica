<?php
include_once('controle.php');
$id_questionario = $_GET['questionario'];
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

if(isset($_POST['enviar'])){
    $respostas = mysqli_fetch_assoc($result2);
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
    if($r_quest_1 == $respostas[0]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_2 == $respostas[1]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_3 == $respostas[2]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_4 == $respostas[3]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_5 == $respostas[4]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    }
    if($r_quest_6 == $respostas[5]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_7 == $respostas[6]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_8 == $respostas[7]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_9 == $respostas[8]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    if($r_quest_10 == $respostas[9]['alt_correta']){
        $contagem++;
        //estilizar o correto com js
    } else {
        //estilizar o errado com js
    }
    echo $contagem;
    //modal de quantas questões acertou e quantas errou.
    //enviar resposta para o email do professor
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
                                    <p><input type="radio" name="questao<?php echo $i; ?>" value="alt1"> a) <?php echo $pergunta['alt_1'] ?></p>
                                    <p><input type="radio" name="questao<?php echo $i; ?>" value="alt2"> b) <?php echo $pergunta['alt_2'] ?></p>
                                    <p><input type="radio" name="questao<?php echo $i; ?>" value="alt3"> c) <?php echo $pergunta['alt_3'] ?></p>
                                    <p><input type="radio" name="questao<?php echo $i; ?>" value="alt4"> d) <?php echo $pergunta['alt_4'] ?></p>
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
        </form>
        <div class="row">
            <div class="col">
                <div class="text-end py-3">
                    <input class="btn link-body-emphasis text-light" type="submit" name="enviar"  style="background-color: var(--color-purple);">
                </div>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>