<?php include_once('controle.php') ?>
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
    <title>Cadastrar Questão</title>
</head>

<body>
    <?php include_once('cabecalho.php')?>
    <main class="container pb-3">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Cadastrar Questão</h2>
                    <div class="m-3"><i class="fa-solid fa-flask-vial fa-2xl" style="color: #000000;"></i></div>
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
            <?php } elseif ($msg == 2) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                    Faça upload de uma imagem e/ou um arquivo!
                </div>
        <?php }
        endif; ?>
        <div class="row">
            <div class="col">
                <form action="processa_questao.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Enunciado:</label>
                            <textarea class="form-control" name="enunciado" id="enunciado" cols="100" rows="30" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Imagem:</label>
                            <input class="form-control" type="file" name="imagem">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2 text-center">
                            <span>Escreva as alternativas.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Alternativa 1:</label>
                            <input class="form-control" type="text" name="alt1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Alternativa 2:</label>
                            <input class="form-control" type="text" name="alt2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Alternativa 3:</label>
                            <input class="form-control" type="text" name="alt3" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 py-2">
                            <label class="form-label">Alternativa 4:</label>
                            <input class="form-control" type="text" name="alt4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center py-2">
                            <span>Escolha a alternativa correta.</span>
                        </div>
                        <div class="col-xl-3 py-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="alt1" name="correta">
                                <label class="form-check-label">Alternativa 1</label>
                            </div>
                        </div>
                        <div class="col-xl-3 py-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="alt2" name="correta">
                                <label class="form-check-label">Alternativa 2</label>
                            </div>
                        </div>
                        <div class="col-xl-3 py-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="alt3" name="correta">
                                <label class="form-check-label">Alternativa 3</label>
                            </div>
                        </div>
                        <div class="col-xl-3 py-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="alt4" name="correta">
                                <label class="form-check-label">Alternativa 4</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-end py-3">
                                <button class="btn link-body-emphasis text-light" type="submit" name="cadastrar" style="background-color: var(--color-purple);">Cadastrar</button>
                                <a class="btn link-body-emphasis text-light" href="list_questao.php" style="background-color: var(--color-blue);">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include_once('rodape.php')?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>