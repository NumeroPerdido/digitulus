
<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_client";
?> 

<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de Clientes
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
                                    <h3 class="box-title">Clientes</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="list_client" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id Cliente</th>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Tel</th>
                                                <th>Cel</th>                                                
                                                <th>E-mail</th>
                                                <th>Editar Cliente</th>
                                                <th>Novo Atendimento</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Id Cliente</th>
                                                <th>Nome</th>
                                                <th>Sobrenome</th>
                                                <th>Tel</th>
                                                <th>Cel</th>                                                
                                                <th>E-mail</th>
                                                <th>Editar Cliente</th>
                                                <th>Novo Atendimento</th>             
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
                var table = $('#list_client').DataTable( {
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
                         $('td:eq(6)', nRow).html("<a href='index.php?page=Editar-Cliente&client_id="+ajax[0]+"'><i class='fa fa-edit'/> Editar Cliente</a>");
                         $('td:eq(7)', nRow).html("<a href='index.php?page=Adicionar-Atendimento&client_id="+ajax[0]+"'><i class='fa fa-plus-circle'/> Novo Atendimento</a>");
                    },
                } );
                
                //Coloca o input pra busca no head de cada coluna
                $('#list_client tfoot th').each( function () {
                    var title = $('#list_client thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );

                // Aplica o filtro
                $("#list_client tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                var j=0;
                $('#list_client thead th').each( function () {
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