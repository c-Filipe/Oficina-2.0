<?php

  
    require 'models/OrcamentoDao.php';


    $orcamentoDao = new OrcamentoDao;

    $busca = filter_input(INPUT_POST,'busca');
    $filtro = filter_input(INPUT_POST,'filtro');
    $dataInicial = filter_input(INPUT_POST,'dataInicial');
    $dataFinal = filter_input(INPUT_POST,'dataFinal');

    

    $dataInicial = implode('-', array_reverse(explode('/', $dataInicial)));
    $dataFinal = implode('-', array_reverse(explode('/', $dataFinal)));

    if (empty($dataInicial)) {
        echo "<script> alert('Preencha o campo data inicial para poder filtrar sua busca') </script>";
        echo "<script> history.back() </script>";
        exit;
    }
    if (empty($dataFinal)) {
        echo "<script> alert('Preencha o campo data final para poder filtrar sua busca') </script>";
        echo "<script> history.back() </script>";
        exit;
    }

    // Pesquisa entre datas 
    
       $buscaLista =  $orcamentoDao->filtroEntreDatas($filtro,$busca,$dataInicial,$dataFinal);
        
    
    
?>
<html>

<head>
    <title>Oficina 2.0 - Pesquisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>

<body>

    <h1> Busca por <?=$filtro;?>: <em><?= $busca; ?></em> entre as datas
     <br/> <em><?=date('d/m/Y',  strtotime($dataInicial));?> e <?=date('d/m/Y',  strtotime($dataFinal));?>  </em></h1>
    

    <div class="menu">
        <a href="index.php">
            <button type="button" class="btn btn-outline-info">Voltar para tela inicial</button>
        </a><br>

        <?php if (count($buscaLista) === 0) : ?>

            <span class="noResult">Nenhum resultado encontrado</span>
            
            
            

        <?php endif ?>  
        <?php if (count($buscaLista) > 0) : ?>
            <h3>Filtrar busca por data</h3>
            <div class="filtro container d-flex justify-content-center">
                <form method="POST" action="buscaData.php">

                    <input type="hidden" value="<?=$busca;?>" name="busca">
                    <input type="hidden" value="<?=$filtro;?>" name="filtro">
                    
                    <input type="text" id="dataInicial" name="dataInicial" placeholder="Data Inicial" class="data">
                    <p>Entre</p>
                   
                    <input type="text" id="dataFinal" name="dataFinal" placeholder="Data Final" class="data">
                    <input type="submit" value="Filtrar">

                </form>
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
                    
                    <?php foreach ($buscaLista as $atributos) : ?>
                        <?php

                        $data = $atributos->getData();
                        $hora = $atributos->getHora();
                        ?>
                        <tr>
                            <th scope="row"><?= $atributos->getId(); ?></th>
                            <td><?= $atributos->getCliente(); ?></td>
                            <td><?= date('d/m/Y', strtotime($data)); ?></td>
                            <td><?= date('H:i', strtotime($hora)); ?></td>
                            <td><?= $atributos->getVendedor(); ?></td>
                            <td><?= $atributos->getDescricao(); ?></td>
                            <td><?= $atributos->getValorTotal(); ?></td>
                            <td>
                                <a href='editar.php?id=<?= $atributos->getId(); ?>'>
                                    <button type="button" class="btn btn-secondary">EDITAR</button>
                                    <a>
                                        <a href='actions/excluir.php?id=<?= $atributos->getId(); ?>'>
                                            <button type="button" class="btn btn-danger" onclick="return confirm('ATENÇÃO! Esse orçamento será excluído permanentemente.')">EXCLUIR</button>
                                            <a>

                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        <?php endif ?>    

        <script src="https://unpkg.com/imask"></script>
      
      <script>
          IMask(
            document.getElementById('dataInicial'),
            {
                mask:'00/00/0000'
            }


          );
          IMask(
            document.getElementById('dataFinal'),
            {
                mask:'00/00/0000'
            }


          );
          
      </script>


</body>

</html>