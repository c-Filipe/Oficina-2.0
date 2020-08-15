<?php

  
  require 'models/OrcamentoDao.php';
  

  $orcamentoDao = new OrcamentoDao();
  $lista = $orcamentoDao->read();
  

?>
<html>
  <head>
    <title>Oficina 2.0 - Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    

  </head>
  <body>

    <h1>Últimos Orçamentos</h1>
      <div class="menu">
        <a href="cadastro.php">        
            <button type="button" class="botao btn btn-primary btn-lg">Cadastrar Orçamento</button>
        </a>    
        <div class=" pesquisa search-area">
          <form method="GET" action="busca.php">
            
            <input type="search" placeholder="Pesquisar Orçamento por " name="p"  />
            <select name='filtro'>
              <option value="cliente" > Cliente </option>
              <option value="vendedor" > Vendedor </option >
            </select>
          </form> 
        </div>
      </div>    

    <table class="table table-hover table-dark">
     
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Cliente</th>
          <th scope="col">Data </th>
          <th scope="col">Hora</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Descrição</th>
          <th scope="col">Valor Total</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($lista as $atributos): ?>
          <?php 
            
            $data = $atributos->getData();
            $hora = $atributos->getHora();
          ?>
          <tr>
            <th scope="row"><?=$atributos->getId();?></th>
            <td><?=$atributos->getCliente();?></td>
            <td><?=date('d/m/Y', strtotime($data));?></td>
            <td><?=date('H:i', strtotime($hora));?></td>
            <td><?=$atributos->getVendedor();?></td>
            <td><?=$atributos->getDescricao();?></td>
            <td><?=$atributos->getValorTotal();?></td>
            <td>
              <a href='editar.php?id=<?=$atributos->getId();?>'>
                <button type="button" class="btn btn-secondary">EDITAR</button> 
              <a>
              <a href='actions/excluir.php?id=<?=$atributos->getId();?>'>
                <button type="button" class="btn btn-danger"  onclick="return confirm('ATENÇÃO! Esse orçamento será excluído permanentemente.')">EXCLUIR</button> 
              <a>

            </td>
          </tr>
        <?php endforeach;?>  
        
        
      </tbody>
    </table>
     
    
            

  </body>
</html>  
