<?php
include_once('conexao.php');
$conexao = conectar();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

if (isset($_POST['solicitar'])) {
    $nova_senha = substr(md5(time()), 0, 6);
    $email = $_POST['email'];
    $nome = $_POST['nome'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado == TRUE) {
        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE usuario SET senha = '$nova_senha' WHERE email = '$email'";
            $resultado = mysqli_query($conexao, $sql);
            if ($resultado == TRUE) {
                try {
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = 'cafecrimesecasos@gmail.com'; 
                    $mail->Password = 'brqubszmzpjfcrji';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;
                    
                    $mail->setFrom('cafecrimesecasos@gmail.com', 'C3 - Café, Crimes e Casos'); 
                    $mail->addAddress($email, $nome);
                    $mail->addReplyTo('cafecrimesecasos@gmail.com');

                    $mail->IsHTML(true); 
                    $mail->CharSet = "UTF-8";
                    $mail->Subject = "Recuperar senha de acesso do C3";

                    $mensagem = "<h3>Olá ". $nome ."</h3>Uma solicitação de recuperação de senha foi realizado na plataforma C3 - Café, Crimes e Casos.<br>Sua senha temporária é " . $nova_senha . ".<br>Assim que você acessar sua conta na plataforma, solicitamos que vá na aba <b>Editar Conta</b> e altere a senha para uma senha mais segura.<br><br>Para mais informações, entre em contato conosco!";

                    $mail->Body = $mensagem;
                    $mail->send();
                    $msg = 2;
                } catch (Exception $e) {
                    echo "Erro ao enviar o email: {$mail->ErrorInfo}";
                }

            } else {
                echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
                die();
            }
        } else {
            $msg = 1;
        }
    } else {
        echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Recuperar Senha</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2>Recuperar a Senha</h2>
                    <div class="m-3"><i class="fa-solid fa-lock fa-2xl" style="color: #000000;"></i></div>
                    <hr>
                </div>
            </div>
        </div>
        <?php if (isset($msg)) :
            if ($msg == 1) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    O email fornecido não existe em nosso banco!
                </div>
            <?php } elseif($msg == 2) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Email enviado com sucesso, visualize sua caixa de mensagem!
                </div>
            <?php } endif ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="" class="">
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Nome:</label>
                            <input class="form-control" type="text" name="nome" class="input" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="email" name="email" class="input" required>
                        </div>
                        <div class="col-xl-12 py-2">
                            <div class="text-end">
                                <button class="btn link-body-emphasis text-light" type="submit" class="input" name="solicitar" style="background-color: var(--color-purple)">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>