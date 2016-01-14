<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Importação
            <small>via csv</small>
        </h1>
        <br/>
        <a href="csv/modelo/Modelo.csv"><button class="btn btn"><i class="fa fa-download"></i> Baixar modelo</button></a>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="read.php" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputFile">CSV</label>
                    <input type="file" id="exampleInputFile" name="file" >
                    
                    <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section><!-- /.content -->
    
    
    <?php if(isset($_GET["msg"]) AND $_GET["msg"]=="file"){  ?><!--Pega o GET msg e exibe a respectiva mensagem de erro -->
        <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Erro!</b> O arquivo enviado não é do tipo CSV. Tente de novo.
        </div>
    <?php } ?><!--TERMINA AQUI-->
    
    
    <?php if(isset($_GET["msg"]) AND $_GET["msg"]=="pattern"){  ?><!--Pega o GET msg e exibe a respectiva mensagem de erro -->
        <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Erro!</b> O CSV enviado não segue os padrões do sistema. Baixe o modelo aqui e tente de novo.
        </div>
    <?php } ?><!--TERMINA AQUI-->
    
    
    <?php if(isset($_GET["msg"]) AND $_GET["msg"]=="success"){  ?><!--Pega o GET msg e exibe a respectiva mensagem de erro -->
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Sucesso!</b> Foram salvos <?php echo $_GET["qtp"] ?> produtos no Banco de Dados.
        </div>
    <?php } ?><!--TERMINA AQUI-->
</aside><!-- /.right-side -->
