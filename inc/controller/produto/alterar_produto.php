<?php
	require_once 'produto.php';


	if(isset($_POST['nome'])){
		$product = new produto();
		$product->setId($_POST['id']);
		$product->setNome($_POST['nome']);
		$product->setValor($_POST['valor']);
		$product->setDescricao($_POST['descricao']);
		$product->setId_grupo($_POST['id_grupo']);
		if($product->alterar()){
			echo "produto alterado com sucesso!";
		}else{
			echo "Erro ao alterar o produto!";
		}
		echo "</br><a href='./index.php'>Voltar</a>";
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
		echo "</br><a href='./index.php'>Voltar</a>";
	}
?>