<?php
    $teste=array();
    $teste['nome']="Luís";
    $teste['idade']=20;
    
    $dados=array();
    $dados['telefone']="4040";
    $dados['altura']=1.80;
    $teste['dados']=$dados;
    echo json_encode($teste);
?>