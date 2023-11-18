<?php
include_once('controle.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

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
    $gabarito = array();
    $respostas = [
        $r_quest_1 = $_POST['questao1'],
        $r_quest_2 = $_POST['questao2'],
        $r_quest_3 = $_POST['questao3'],
        $r_quest_4 = $_POST['questao4'],
        $r_quest_5 = $_POST['questao5'],
        $r_quest_6 = $_POST['questao6'],
        $r_quest_7 = $_POST['questao7'],
        $r_quest_8 = $_POST['questao8'],
        $r_quest_9 = $_POST['questao9'],
        $r_quest_10 = $_POST['questao10']
    ];
    for ($i = 0; $i < count($questions); $i++) {
        if ($respostas[$i] == $questions[$i]['alt_correta']) {
            $contagem++;
        }
        $gabarito[] = $questions[$i]['alt_correta'];
    }
    $nome_questionario = $info_questionario['titulo_quest'];

    $id_usuario = $_SESSION['id_usuario'];
    $comando = "SELECT nome, email FROM usuario WHERE id_usuario = $id_usuario";
    $busca = mysqli_query($conexao, $comando);
    $usuario = mysqli_fetch_assoc($busca);
    $nome_aluno = $usuario['nome'];
    $email_aluno = $usuario['email'];

    $sql = "SELECT nome, email FROM usuario WHERE tipo = 1";
    $busca2 = mysqli_query($conexao, $sql);
    $professor = mysqli_fetch_assoc($busca2);
    $nome_prof = $professor['nome'];
    $email_prof = $professor['email'];

    try {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'cafecrimesecasos@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('cafecrimesecasos@gmail.com', 'C3 - Café, Crimes e Casos');
        $mail->addAddress($email_prof, $nome_prof);
        $mail->addReplyTo('cafecrimesecasos@gmail.com');

        $mail->IsHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->Subject = "Respostas do Questionário";

        $mensagem = "<h3>Olá " . $nome_prof . "</h3>Um aluno, chamado " . $nome_aluno . " de endereço de email " . $email_aluno . " respondeu o questionário: <b>" . $nome_questionario . "</b>.<br>Veja suas respostas:<br><table><thead><tr><td>Gabarito</td><td>Respostas</td></tr></thead><tbody>";
        for ($i = 0; $i < count($gabarito); $i++) :
            $mensagem .= "<tr><td>" . $gabarito[$i] . "</td><td>" . $respostas[$i] . "</td></tr>";
        endfor;
        $mensagem .= "</tbody></table>";

        $mail->Body = $mensagem;
        $mail->send();
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
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
    <title><?= $info_questionario['titulo_quest']; ?></title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
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
                                    <p><label><input type="radio" name="questao<?= $i ?>" value="A" required> a) <?php echo $pergunta['alt_1'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?= $i ?>" value="B" required> b) <?php echo $pergunta['alt_2'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?= $i ?>" value="C" required> c) <?php echo $pergunta['alt_3'] ?></label></p>
                                    <p><label><input type="radio" name="questao<?= $i ?>" value="D" required> d) <?php echo $pergunta['alt_4'] ?></label></p>
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
                        <h5 class="modal-title" id="resposaLabel">Seu desempenho no questionário foi o seguinte:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Você acertou <?php echo $contagem ?>/10</p>
                        <table class="table table-light table-hover">
                            <thead class="text-center">
                                <tr>
                                    <td>Gabarito</td>
                                    <td>Respostas</td>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php for ($i = 0; $i < count($gabarito); $i++) : ?>
                                    <tr class="text-center">
                                        <?php if ($gabarito[$i] == $respostas[$i]) { ?>
                                            <td style="background-color:var(--color-green)"><?= $gabarito[$i]; ?></td>
                                            <td style="background-color:var(--color-green)"><?= $respostas[$i]; ?></td>
                                        <?php } else { ?>
                                            <td style="background-color:var(--color-red)"><?= $gabarito[$i]; ?></td>
                                            <td style="background-color:var(--color-red)"><?= $respostas[$i]; ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
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