<?php
require_once "../inc/config.php";
require_once "../inc/model/group.php";
require_once "../inc/controller/product.php";

$group = new Group();

$groups = $group->getAllGroups();
$group_all = $groups->fetchAll();

$page_title = "Criar produto";

require_once "../inc/views/header.php";
require_once "../inc/views/navbar.php";
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>Criar Produto</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="mt-4">
                        <div class="form-group">
                            <label>*Nome</label>
                            <input type="text" name="product_name" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>*Grupo</label>
                            <select class="form-control" name="id_group" required>
                                <option value="" disabled selected>Selecione um grupo</option>
                                <?php foreach ($group_all as $group_row) { ?>
                                    <option value="<?php echo $group_row['group_id']; ?>"><?php echo $group_row['group_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>*Preço</label>
                            <input type="number" name="product_price" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Descricao</label>
                            <textarea name="product_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" class="form-control-file" name="product_image">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-dark btn-lg btn-block" name="btn-product-create">Criar Produto</button>
                            <p class="text-center mt-2"><a href="products.php" class="btn btn-link text-muted">Voltar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>