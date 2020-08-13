<?php

require '../models/Conexao.php';
require '../models/OrcamentoDao.php';


$orcamentoDao = new OrcamentoDao;
$id = filter_input(INPUT_GET,'id');
   

    if($id){
        $orcamentoDao->delete($id);

    }
   
    header('location: ../index.php');
    exit;