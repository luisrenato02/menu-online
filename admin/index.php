<?php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';

$page_title = "Dashboard";

require_once "../inc/views/header.php";
require_once "../inc/views/navbar.php";
?>
<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <h1 class="my-5">Oi, <b><?php echo $strow["username"]; ?></b>. Bem vindo á Dashboard.</h1>
            <p>
                <a href="products.php" class="btn btn-warning">Produtos</a>
                <a href="groups.php" class="btn btn-warning">Grupos</a>
                <a href="logout.php" class="btn btn-danger">SAIR</a>
            </p>

        </div>
    </div>

    <?php require_once "../inc/views/footer.php"; ?>