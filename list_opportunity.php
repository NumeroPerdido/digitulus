
<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_opportunity";
?> 

<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de Atendimentos
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>
                  <?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]=="add"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Adicionado com Sucesso.
                                    </div>";
                        }
                        if($_GET["success"]=="edit"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Atualizado com Sucesso.
                                    </div>";
                        }
                         if($_GET["success"]=="delete"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Deletado com Sucesso.
                                    </div>";
                        }
                    }
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Atendimentos</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="list_opportunity" class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Id Atendimento</th>
                                                <th>Resumo do Atendimento</th>
                                                <th>Status</th>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Tel</th>
                                                <th>Cel</th>
                                                <th>E-mail</th>
                                                <th>Continuar Atendimento</th>
                                                <th>Concluir Venda</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Id Atendimento</th>
                                                <th>Resumo do Atendimento</th>
                                                <th>Status</th>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Tel</th>
                                                <th>Cel</th>
                                                <th>E-mail</th>
                                                <th>Continuar Atendimento</th>
                                                <th>Concluir Venda</th>              
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        <!-- page script -->
        <script type="text/javascript">
            //script para carregar o conteúdo da tabela
            $(document).ready(function() {
                var cbx;
                var table = $('#list_opportunity').DataTable( {
                    dom: 'Bfrtip',
                    "processing": true,
                    "serverSide": true,
                    colReorder: true,
                    buttons: [
                        'colvis'
                    ],
                    //seta a ordenação default como a primeira coluna sendo decrescente
                    "order": [[ 0, "desc" ]],
                    //faz um filtro inicial mostrando apenas as opportunities que pertencem ao usuário logado
//                    "searchCols":[null,null,null,null,null,null,null,null,null,null],
                    "searchCols":[null,null,null,null,null,null,null,null,null,{ "search": "<?php echo $_SESSION["user"]->user_id; ?>" }],
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
                         //Gera o link para edição na última coluna
                         $('td:eq(8)', nRow).html("<a href='index.php?page=Editar-Atendimento&opportunity_id="+ajax[0]+"&client_id="+ajax[8]+"''><i class='fa fa-edit'/>Continuar Atendimento</a>");
                         $('td:eq(9)', nRow).html("<a href='index.php?page=Concluir-Venda&opportunity_id="+ajax[0]+"&client_id="+ajax[8]+"''><i class='fa fa-check-square-o'/>Concluir Venda</a>");
                        
                        //função para colorir a tabela de acordo com o status
                        //nRow é o elemento HTML da linha, iDataIndex é o número da linha, e ajax[2]/status é o status do atendimento
                        color_row(nRow,iDataIndex,ajax[2]);
                    },
                } );
                //Coloca o input pra busca no head de cada coluna
                $('#list_opportunity tfoot th').each( function () {
                    var title = $('#list_opportunity thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );

                // Aplica o filtro
                $("#list_opportunity tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( "%"+this.value+"%" )
                        .draw();
                } );
                var j=0;
                $('#list_opportunity thead th').each( function () {
                    // Get the column API object
                    var visibility=$(this).attr('visibility');
                    var col = table.column( j );
                    // Toggle the visibility
                    if(visibility=="false"){
                      col.visible(false);
                    }
                    j++;
                } );
            } );
        </script>