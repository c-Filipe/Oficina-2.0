<html>
    <head>
        <title>Oficina 2.0 - Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        
    </head>
    <body>
        
        <div class="cadastro">
            <h1>Cadastrar Orçamento</h1>
            <form method="POST" action="actions/cadastrar.php">
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" >
                </div>
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <input type="text" class="form-control" id="vendedor" name="vendedor" >
                </div>
                <div class="form-group">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="total">Valor Total</label>
                    <input type="text" class="form-control" id="total" name="total" >
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                <a href="index.php" class="btn btn-secondary btn-lg">Voltar</a> 
            </form>
        </div>

        <!-- Mascára para o valor monetario  -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
            $("#total").maskMoney({symbol:'R$ ', 
            showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
            })
        </script>
       

    </body>
</html>