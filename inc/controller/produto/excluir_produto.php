<?php
	require_once 'produto.php';	
	if(isset($_GET['id'])){
		$product = new produto();
		$product->setId($_GET['id']);
		if($product->apagar()){
			?>
<script>
window.alert("Produto excluido com sucesso!");
window.location.href = "../produto/lista_produto.php";
</script>
<?php
		}else{
					?>
<script>
window.alert("Erro ao excluir o produto!");
window.location.href = "../produto/lista_produto.php";
</script>
<?php
		}
	}
?>