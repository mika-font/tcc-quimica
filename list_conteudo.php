<?php include_once('controle.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>Conteúdos</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container col-md-9">
        <div class="row">
            <div class="col">
                <div class="text-center py-3">
                    <h2 class="h2">Conteúdos</h2>
                    <hr>
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card me-2 bg-dark text-bg-dark h-100">
                    <img src="./assets/img/minucias.png" class="card-img object-fit-cover h-70" >
                    <div class="card-body">
                        <h4 class="card-title">Introdução à Química Forense</h4>
                        <p class="card-text msg_inic">Breve introdução a respeito da sua definição, áreas de atuação profissional e histórico.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="./conteudos/introducao.php" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card me-2 bg-dark text-bg-dark h-100">
                    <img src="./assets/img/minucias.png" class="card-img object-fit-cover h-70">
                    <div class="card-body">
                        <h4 class="card-title">Papiloscopia</h4>
                        <p class="card-text msg_inic">Aprofunde-se em uma das áreas mais abordadas em produções cinematográficas, a papiloscopia.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="./conteudos/papiloscopia.php" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card me-2 bg-dark text-bg-dark h-100">
                    <img src="./assets/img/minucias.png" class="card-img object-fit-cover h-70">
                    <div class="card-body">
                        <h4 class="card-title">Técnicas de Revelação de impressão Digital</h4>
                        <p class="card-text msg_inic">Continuando o módulo anterior, existem diferentes técnicas de revelação de uma impressão digital, venha conhecer algumas delas.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="./conteudos/tecnicas_revel.php" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="py-3"></div>
        </div>
    </main>
    <?php include_once('rodape.php')?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>