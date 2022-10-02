<?php
require_once __DIR__ . '../../model/product.php';
require_once __DIR__ . '../../utils/core.php';

$product = new Product();

$error = false;

if (isset($_POST["btn-product-create"])) {
    $product_name = trim($_POST['product_name']);
    $product_name = strip_tags($product_name);
    $product_name = htmlspecialchars($product_name);

    $product_description = trim($_POST['product_description']);
    $product_description = strip_tags($product_description);
    $product_description = htmlspecialchars($product_description);

    $product_price = trim($_POST['product_price']);
    $product_price = strip_tags($product_price);
    $product_price = htmlspecialchars($product_price);

    $id_group = trim($_POST['id_group']);
    $id_group = strip_tags($id_group);
    $id_group = htmlspecialchars($id_group);

    $filename = $_FILES['product_image']['name'];

    if (empty($product_name)) {
        $error = true;
        $product_name_err = "Nome é um campo obrigatório";
    }

    if (empty($product_price)) {
        $error = true;
        $product_price_err = "Preço é um campo obrigatório";
    }

    if (!$error) {
        $file_name = mt_rand() . time() . $filename;
        $target_file = __DIR__ . '/../../uploads/' . $file_name;
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $valid_extension = array("png", "jpeg", "jpg");

        $product->setId(random_id(15));
        $product->setName($product_name);
        $product->setDescription($product_description);
        $product->setPrice($product_price);
        $product->setImage($file_name);
        $product->setGroup($id_group);

        if (in_array($file_extension, $valid_extension)) {
            if (move_uploaded_file(
                $_FILES['product_image']['tmp_name'],
                $target_file
            )) {
                $product->setImage($file_name);
            }
        }

        $response = $product->create();

        if ($response) {
            unset($_POST);
            echo "<script>alert('Produto criado com sucesso!');</script>";
            echo "<script>location.href = '" . $config->urlLocal . "/admin/products.php';</script>";
        } else {
            $errorType = "warning";
            $errorMSG = "Erro no servidor.";
        }
    }
}

if (isset($_POST["btn-product-update"])) {
    $product_id = trim($_POST['product_id']);
    $product_id = strip_tags($product_id);
    $product_id = htmlspecialchars($product_id);

    $product_name = trim($_POST['product_name']);
    $product_name = strip_tags($product_name);
    $product_name = htmlspecialchars($product_name);

    $product_description = trim($_POST['product_description']);
    $product_description = strip_tags($product_description);
    $product_description = htmlspecialchars($product_description);

    $product_price = trim($_POST['product_price']);
    $product_price = strip_tags($product_price);
    $product_price = htmlspecialchars($product_price);

    $id_group = trim($_POST['id_group']);
    $id_group = strip_tags($id_group);
    $id_group = htmlspecialchars($id_group);

    if (empty($product_name)) {
        $error = true;
        $product_name_err = "Nome é um campo obrigatório";
    }

    if (empty($product_price)) {
        $error = true;
        $product_price_err = "Preço é um campo obrigatório";
    }

    if (!$error) {
        $product->setId($product_id);
        $product->setName($product_name);
        $product->setDescription($product_description);
        $product->setPrice($product_price);
        $product->setGroup($id_group);
        $response = $product->update();

        if ($response) {
            unset($_POST);
            echo "<script>alert('Produto atualizado com sucesso!');</script>";
            echo "<script>location.href = '" . $config->urlLocal . "/admin/products.php';</script>";
        } else {
            $errorType = "warning";
            $errorMSG = "Erro no servidor.";
        }
    }
}
