<?php
	require_once './inc/class/grupo.php';


	if(isset($_POST['nome'])){
		$product = new grupo();
		$product->setId($_POST['id']);
		$product->setNome($_POST['nome']);
		if($product->alterar()){
			echo "grupo alterado com sucesso!";
		}else{
			echo "Erro ao alterar o grupo!";
		}
		echo "</br><a href='index.php'>Voltar</a>";
	}
	if(isset($_POST['nome'])){
		$group = new grupo();
		$group->setId($_POST['id']);
		$group->setNome($_POST['nome']);
		if($group->alterar()){
			echo "grupo alterado com sucesso!";
		}else{
			echo "Erro ao alterar o grupo!";
		}
		echo "</br><a href='index.php'>Voltar</a>";
	}
?>