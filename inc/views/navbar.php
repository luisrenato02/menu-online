<?php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-main navbar-light px-5 d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo $config->urlLocal; ?>/">
            <span class="logo-text">Menu Online</span>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config->urlLocal; ?>/admin/products.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config->urlLocal; ?>/admin/groups.php">Grupos</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#"><?php echo $strow["username"]; ?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>