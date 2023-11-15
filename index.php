<?php
include_once('conexao.php');
$conexao = conectar();
$sql_casos = "SELECT caso.id_caso, titulo, local, data, GROUP_CONCAT(imagem.url) 
AS urls_img FROM caso INNER JOIN imagem ON caso.id_caso = imagem.id_caso GROUP BY id_caso ORDER BY caso.id_caso DESC LIMIT 6";
$result_casos = mysqli_query($conexao, $sql_casos);

if ($result_casos == TRUE) {
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./assets/img-sistem/atomo.ico" type="image/x-icon">
    <title>C₃ - Café, Crimes e Casos</title>
</head>

<body>
    <header class="row">
        <nav class="navbar navbar-expand-sm" style="background-color: var(--color-purple);">
            <div class="container border-bottom p-1 mb-2">
                <a href="index.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-sistem/logo-simb-branco.png" width="50" height="auto">Início</a>
                <ul class="navbar-nav text-end">
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="sobre.html">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="cad_usuario.php">Cadastre-se</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container py-5">
        <div class="row">
            <div class="col-xl-6">
                <div class="text-center aling-center">
                    <img src="./assets/img-sistem/logo.png" width="500px" height="auto">
                </div>
            </div>
            <div class="col-xl-6">
                <h3 class="h1 text-center">Seja Bem-Vindo ao C₃!</h3>
                <div class="msg_inic py-2 text-wrap">
                    <p>Conheça a C3, uma plataforma exclusiva e dedicada à comunidade interessada pela química forense e investigação criminal. 
                    Unindo conteúdos completos e repletos de imagens com recomendações de produções midiáticas, materiais complementares e casos criminais famosos, a C3 tem a honra de tê-lo como estudante, caro investigador(a).
                    Está preparado para conhecer esse universo incrível? Então cadastre-se e aproveite ao máximo a experiência e investigue cada canto dessa plataforma!
                    </p>
                </div>
                <div class="text-center p-4 m-4">
                    <a href="cad_usuario.php" class="btn text-light" style="background-color: var(--color-purple);">Cadastre-se</a>
                    <p class="p-2">Já possui conta? <a href="login.php">Acesse</a></p>
                </div>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="text-center pb-2">
                <h2 class="h2">Conheça alguns casos criminais</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $limite = 3;
            $count = 0;
            while ($dados = mysqli_fetch_assoc($result_casos)) :
                $urls = explode(",", $dados['urls_img']);
                $dataTime = date_create($dados['data']);
                $dataformat = date_format($dataTime, 'd/m/Y');
                $count++;
            ?>
                <div class="col-xl-4">
                    <div class="card me-2 bg-dark text-bg-dark h-100">
                        <img src="<?php echo $urls[0]; ?>" class="card-img object-fit-cover" height="100%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
                            <p class="card-text"><?php echo "<b>Local:</b> " . $dados['local'] . "<br><b> Data:</b> " . $dataformat; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="cad_usuario.php" class="card-link btn text-light" style="background-color: var(--color-purple);">Visualizar</a>
                        </div>
                    </div>
                </div>
                <?php if ($count == $limite) :
                    echo '<div class="py-3"></div>';
                    echo '</div>';
                    echo '<div class="row">';
                    $count = 0;
                endif ?>
            <?php endwhile ?>
        </div>
        <hr>
        <div class="text-center">
            <img src="./assets/img-sistem/logo_compacta.png" height="150px" width="auto">
        </div>
        <hr>
    </main>
    <div class="row">
        <div style="background-color: var(--color-purple);">
            <footer class="container py-3 my-3 text-light">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="sobre.html">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="cad_usuario.php">Cadastre-se</a></li>
                </ul>
                <p class="text-center text-light">Mikael Fontoura do Nascimento</p>
                <p class="text-center text-light">Instituto Federal Farroupilha - Campus Avançado Uruguaiana</p>
            </footer>
        </div>
    </div>
</body>

</html>