<?php
	require_once './inc/class/grupo.php';	
	if(isset($_GET['id'])){
		$product = new grupo();
		$product->setId($_GET['id']);
		if($product->apagar()){
			?>
<script>
window.alert("Grupo excluido com sucesso!");
window.location.href = "../grupo/lista_grupo.php";
</script>
<?php
		}else{
					?>
<script>
window.alert("Erro ao excluir o grupo!");
window.location.href = "../grupo/lista_grupo.php";
</script>
<?php
		}
	}
?>