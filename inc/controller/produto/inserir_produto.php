<?php
	require_once 'produto.php';
	if(isset($_POST['nome'])){
		$product = new produto();
		$product->setNome($_POST['nome']);
		$product->setValor($_POST['valor']);
		$product->setDescricao($_POST['descricao']);
		$product->setId_grupo($_POST['id_grupo']);
		if($product->inserir()){
			?>


<script>
window.alert("Produto inserido com sucesso!");
window.location.href = "./lista_produto.php";
</script>
<?php
		}else{
			?>
<script>
window.alert("Erro ao inserir o produto!");
window.location.href = "./lista_produto.php";
</script>
<?php
		}
	}
	
?>