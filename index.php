<?php
require_once './inc/config.php';
require_once './inc/model/product.php';

$product = new Product();

$products = $product->getAllProducts();
$product_count = $products->rowCount();
$product_all = $products->fetchAll();

$page_title = "Inicio";

$lastCategory = '';

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 4;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
$arrayCount = count($rows);

require_once './inc/views/header.php';
?>
<style>
  body {
    background: url(assets/images/background.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-color: #000;
  }
</style>
<main class="container">
  <div class="container--logo">
    <img class="logo" src="assets/images/logo.png" alt="Logo Malbec">
  </div>

  <?php if ($product_count > 0) { ?>
    <?php foreach ($product_all as $key => $product_row) { ?>

      <?php if ($product_row['group_name'] != $lastCategory) {
        $lastCategory = $product_row['group_name']; ?>
        <div class="col-6">
          <span class="category--name mb-3"><?php echo $lastCategory; ?></span>
        </div>
      <?php } ?>


      <div class="row mt-4 pb-5">


        <div class="col-md-4">
          <div class="card card--product">
            <div class="card-image">
              <?php if ($product_row["product_image"] <> null || $product_row["product_image"] <> "") { ?>
                <img src="<?php echo $config->urlLocal; ?>/uploads/<?php echo $product_row["product_image"]; ?>" class="card-img-top product--image" alt="Imagem do Produto">
              <?php } else { ?>
                <img src="<?php echo $config->urlLocal; ?>/assets/images/default.jpg" class="card-img-top product--image" alt="Imagem do Produto" style="border-radius: 20px;">
              <?php } ?>
            </div>
            <div class="card-body">
              <h5 class="card-title product--name"><?php echo $product_row["product_name"]; ?></h5>
              <p class="card-text product--description">
                <?php echo $product_row['product_description'] == null ? "Não ha descrição" : $product_row['product_description']; ?>
              </p>
              <button class="btn btn-success mt-2">
                R$ <?php echo number_format($product_row["product_price"], 2, ',', '.'); ?>
              </button>
            </div>
          </div>
        </div>

      </div>
    <?php } ?>
  <?php } else { ?>
    Loja ainda sem produto
  <?php } ?>

</main>
<?php require_once './inc/views/footer.php'; ?>