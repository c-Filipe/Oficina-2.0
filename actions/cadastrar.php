<?php
session_start();
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
    $_SESSION['msg'] = " <div class='alert alert-success alert-dismissible fade show' role='alert'>Cadastrado com sucesso! ";
    header("Location: ../index.php");
    exit;
}
else{
    $_SESSION['msg'] = " <div class='alert alert-danger alert-dismissible fade show' role='alert'>Preencha todos os campos para cadastrar o orçamento! ";
    echo "<script> history.back() </script>";
}
?>