<?php
session_start();
require '../models/Conexao.php';
require '../models/OrcamentoDao.php';


$orcamentoDao = new OrcamentoDao;
$id = filter_input(INPUT_GET,'id');
   

    if($id){
        $orcamentoDao->delete($id);

    }
    $_SESSION['msg'] = " <div class='alert alert-danger alert-dismissible fade show' role='alert'>Orçamento ". $id ." excluído! ";
    
    header('location: ../index.php');
    exit;