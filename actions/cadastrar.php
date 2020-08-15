<?php

require '../models/Conexao.php';
require '../models/OrcamentoDao.php';

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$orcamentoDao = new OrcamentoDao;


$cliente = filter_input(INPUT_POST, 'cliente');
$vendedor = filter_input(INPUT_POST,'vendedor');
$data = date('Y-m-d');
$hora = date('H:i:s');
$descricao = filter_input(INPUT_POST,'desc');
$valorTotal = filter_input(INPUT_POST,'total');




if($cliente && $vendedor && $descricao && $valorTotal){
    $novoOrcamento = new Orcamento();
    $novoOrcamento->setCliente($cliente);
    $novoOrcamento->setVendedor($vendedor);
    $novoOrcamento->setData($data);
    $novoOrcamento->getHora($hora);
    $novoOrcamento->setDescricao($descricao);
    $novoOrcamento->setValorTotal($valorTotal);
  
    
    
    
    

    $orcamentoDao->create($novoOrcamento);
   
    header("Location: ../index.php");
    exit;
}
else{
    echo "<script> alert('Preencha todos os campos para cadastrar') </script>";
    echo "<script> history.back() </script>";
}
?>