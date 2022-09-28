<?php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo $config->urlLocal; ?>/admin/">Menu Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config->urlLocal; ?>/admin/lista_produto.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config->urlLocal; ?>/admin/lista_grupo.php">Grupos</a>
                </li>

                <li class="nav-item dropdown dropdown-menu-right">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Conta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>