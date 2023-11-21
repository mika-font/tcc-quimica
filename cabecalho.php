<?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) { ?>
    <div class="row">
        <header style="background-color: var(--color-purple);">
            <nav class="navbar navbar-expand-sm">
                <div class="container border-bottom p-1 mb-2">
                    <a href="central.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-sistem/logo-simb-branco.png" width="50" height="auto">Central</a>
                    <div class="dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Cadastrar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cad_casos.php">Casos Criminais</a></li>
                            <li><a class="dropdown-item" href="cad_recom.php">Recomendações</a></li>
                            <li><a class="dropdown-item" href="cad_questionario.php">Questionários</a></li>
                            <li><a class="dropdown-item" href="cad_questao.php">Questões</a></li>
                        </ul>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_conteudo.php">Conteúdo</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_casos.php">Casos Criminais</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_recom.php">Recomendações</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_questionario.php">Questionários</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_questao.php">Questões</a></li>
                    </ul>
                    <div class="dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            <li><a class="dropdown-item" href="edit_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Editar Conta</a></li>
                        </ul>
                    </div>
                </div>  
            </nav> 
        </header>
    </div>
<?php } else if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0) { ?>
    <div class="row">
        <header style="background-color: var(--color-purple);">
            <nav class="navbar navbar-expand-sm">
                <div class="container border-bottom p-1 mb-2">
                    <a href="central.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-sistem/logo-simb-branco.png" width="50" height="auto">Central</a>
                    <ul class="navbar-nav">
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_conteudo.php">Conteúdo</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_casos.php">Casos Criminais</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_recom.php">Recomendações</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_questionario.php">Questionários</a></li>
                    </ul>
                    <div class="dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            <li><a class="dropdown-item" href="edit_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Editar Conta</a></li>
                        </ul>
                    </div>
                </div>  
            </nav> 
        </header>
    </div>
<?php } else if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) { ?>
    <div class="row">
        <header style="background-color: var(--color-purple);">
            <nav class="navbar navbar-expand-sm">
                <div class="container border-bottom p-1 mb-2">
                    <a href="central.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-sistem/logo-simb-branco.png" width="50" height="auto">Central</a>
                    <div class="dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Cadastrar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cad_casos.php">Casos Criminais</a></li>
                            <li><a class="dropdown-item" href="cad_recom.php">Recomendações</a></li>
                            <li><a class="dropdown-item" href="cad_questionario.php">Questionários</a></li>
                            <li><a class="dropdown-item" href="cad_questao.php">Questões</a></li>
                        </ul>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_conteudo.php">Conteúdo</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_casos.php">Casos Criminais</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_recom.php">Recomendações</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_questionario.php">Questionários</a></li>
                        <li class="nav-link"><a class="nav-link link-body-emphasis text-light" href="list_questao.php">Questões</a></li>
                    </ul>
                    <div class="dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            <li><a class="dropdown-item" href="edit_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Editar Conta</a></li>
                            <li><a class="dropdown-item" href="list_users.php">Usuários do Sistema</a></li>
                        </ul>
                    </div>
                </div>  
            </nav> 
        </header>
    </div>
<?php } else if (!isset($_SESSION['tipo'])){ ?>
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
<?php } ?>