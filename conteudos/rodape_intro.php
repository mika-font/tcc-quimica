<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){ ?>
    <div class="row">
        <div style="background-color: var(--color-purple);">
            <footer class="container py-3 my-3 text-light">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../central.php">Central</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_conteudo.php">Conteúdos</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_casos.php">Casos Criminais</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_recom.php">Recomendações</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_questionario.php">Questionários</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_questao.php">Questões</a></li>
                </ul>
                <p class="text-center text-light">Mikael Fontoura do Nascimento</p>
                <p class="text-center text-light">Instituto Federal Farroupilha - Campus Avançado Uruguaiana</p>
            </footer>
        </div>
    </div>
<?php } else if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) { ?>
    <div class="row">
        <div style="background-color: var(--color-purple);">
            <footer class="container py-3 my-3 text-light">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../central.php">Central</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_conteudo.php">Conteúdos</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_casos.php">Casos Criminais</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_recom.php">Recomendações</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_questionario.php">Questionários</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_questao.php">Questões</a></li>
                </ul>
                <p class="text-center text-light">Mikael Fontoura do Nascimento</p>
                <p class="text-center text-light">Instituto Federal Farroupilha - Campus Avançado Uruguaiana</p>
            </footer>
        </div>
    </div>
<?php } else if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0) { ?>
    <div class="row">
        <div style="background-color: var(--color-purple);">
            <footer class="container py-3 my-3 text-light">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../central.php">Central</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_conteudo.php">Conteúdos</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_casos.php">Casos Criminais</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_recom.php">Recomendações</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-light px-2" href="../list_questionario.php">Questionários</a></li>
                </ul>
                <p class="text-center text-light">Mikael Fontoura do Nascimento</p>
                <p class="text-center text-light">Instituto Federal Farroupilha - Campus Avançado Uruguaiana</p>
            </footer>
        </div>
    </div>
<?php } ?>