<?php
	require_once './inc/class/grupo.php';
	if(isset($_POST['nome'])){
		$product = new grupo();
		$product->setNome($_POST['nome']);
		if($product->inserir()){
			?>


<script>
window.alert("Grupo inserido com sucesso!");
window.location.href = "./lista_grupo.php";
</script>
<?php
		}else{
			?>
<script>
window.alert("Erro ao inserir o Grupo!");
window.location.href = "./lista_grupo.php";
</script>
<?php
		}
	}
?>