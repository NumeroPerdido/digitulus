
<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_image";
?> 

<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de Imagens
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Produtos</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <a href="#" id="link" ><button type="submit" id="edit_btn" class="btn btn-primary">Editar Produtos</button></a>
                                    <table id="list_product" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Label</th>
                                                <th>Adicionar</th>
                                                <th>Renomear</th>
                                                <th>Thumbnail</th>
                                                <th>Remover</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Label</th>
                                                <th>Adicionar</th>
                                                <th>Renomear</th>
                                                <th>Thumbnail</th>
                                                <th>Remover</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
    
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            //variável global contendo todos os skus que foram marcados
            var skus=[];
            //script para carregar o conteúdo da tabela
            $(document).ready(function() {
                var cbx;
                var table = $('#list_product').DataTable( {
                    dom: 'C<"clear">lfrtip',
                    "processing": true,
                    "serverSide": true,
                    //recebe o json desse página para ser aplicado na tabela
                    "ajax": {
                        "url":"pagination/pagination_serverside.php",
                        "type": "POST"
                    },
                    "fnCreatedRow": function( nRow, ajax, iDataIndex ) {
                         // nRow - this is the HTML element of the row
                         // aData - array of the data in the columns. Get column 4 data: aData[3]
                         // iDataIndex - row index in the table
                         // Append to the first column
                         var label;
                         //remove a aspas simples pra jogar string na url
                         label=ajax[0].replace("'","");
                         //Gera o link para add imagem na última coluna
                         $('td:eq(1)', nRow).html("<a href='index.php?page=Adicionar-Imagem&label="+label+"'><i class='fa fa-plus-circle'/> Adicionar Imagens</a>");
                         //Gera o link para edição na última coluna
                         $('td:eq(2)', nRow).html("<a href='index.php?page=Renomear-Imagem&label="+label+"'><i class='fa fa-edit'/> Renomear Imagens</a>");
                        //Gera o link para edição na última coluna
                         $('td:eq(3)', nRow).html("<a href='index.php?page=Thumbnail-Imagem&label="+label+"'><i class='fa fa-picture-o'/> Thumbnail Imagens</a>");
                        //Gera o link para edição na última coluna
                         $('td:eq(4)', nRow).html("<a href='index.php?page=Remover-Imagem&label="+label+"'><i class='fa fa-times-circle'/> Remover Imagens</a>");
                    },
                } );
                
                //Coloca o input pra busca no head de cada coluna
                $('#list_product tfoot th').each( function () {
                    var title = $('#list_product thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );

                // Aplica o filtro
                $("#list_product tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                
            } );
        </script>