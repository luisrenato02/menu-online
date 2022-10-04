<?php
// inclui os arquivos .php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';
require_once '../inc/model/product.php';

$page_title = "Produtos";

$product = new Product();

$products = $product->getAllProducts();
$product_count = $products->rowCount();
$product_all = $products->fetchAll();

if (isset($_GET['product_id'])) {
    $product->setId($_GET['product_id']);
    if ($product->delete()) {
        echo "<script>window.alert('Produto excluido com sucesso!');</script>";
        echo "<script>location.href = '" . $config->urlLocal . "/admin/products.php';</script>";
    }
}

require_once "../inc/views/header.php";
require_once "../inc/views/navbar.php";
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Lista de produtos</h4>
                        <a href="create_product.php">Criar produto</a>
                    </div>
                    <?php if ($product_count > 0) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th>Grupo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product_all as $product_row) { 
                                    $name = $product_row['product_description'];
                                    $description = strlen($name) > 30 ? substr($name,0,30). "..." : $name;
                                    ?>
                                    <tr>
                                        <td><?php echo $product_row['product_id']; ?></td>
                                        <td><?php echo $product_row['product_name']; ?></td>
                                        <td><?php echo $product_row['product_price']; ?></td>
                                        <td><?php echo $product_row['product_description'] == null ? "Não ha descrição" : $description; ?></td>
                                        <td><?php echo $product_row['group_name']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <i class="fas fa-ellipsis-v" id="dropdownMenuButton" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="product/<?php echo $product_row['product_id']; ?>"><i class="fas fa-pencil-alt mr-2"></i> Editar</a>
                                                    <a class="dropdown-item" href="?product_id=<?php echo $product_row['product_id']; ?>" onclick="return confirm('Deseja mesmo excluir?'); "><i class="fas fa-trash-alt mr-2"></i> Excluir</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        Nenhum produto encontrado
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>