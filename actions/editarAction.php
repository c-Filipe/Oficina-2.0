<?php

require '../models/Conexao.php';
require '../models/OrcamentoDao.php';

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$orcamentoDao = new OrcamentoDao;

$id = filter_input(INPUT_POST, 'id');
$cliente = filter_input(INPUT_POST, 'cliente');
$vendedor = filter_input(INPUT_POST,'vendedor');
$data = date('Y-m-d');
$hora = date('H:i:s');
$descricao = filter_input(INPUT_POST,'desc');
$valorTotal = filter_input(INPUT_POST,'total');




if($cliente && $vendedor && $descricao && $valorTotal){

    $orcamento = new Orcamento();
   
    $orcamento->setId($id);
    $orcamento->setCliente($cliente);
    $orcamento->setVendedor($vendedor);
    $orcamento->setData($data);
    $orcamento->getHora($hora);
    $orcamento->setDescricao($descricao);
    $orcamento->setValorTotal($valorTotal);
  

    $orcamentoDao->update($orcamento);

    header("Location: ../index.php");
    exit;
}
else{
    echo "<script> alert('Preencha todos os campos para atualizar seus dados') </script>";
    echo "<script> history.back() </script>";
}
?>