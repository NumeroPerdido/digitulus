<?php
$_SESSION["table"]="digitulus_airport_list";
       
?>  
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de aeroportos
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
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Aeroportos</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                      
                                    <table id="list_airport" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código IATA</th>
												<th visibility="false">Nome do Aeroporto</th>
												<th >Nome do Aeroporto em Português</th>
												<th visibility="false">Nome da Cidade em Inglês</th>
												<th>Nome da Cidade em Português</th>
                                                <th>Nome do País em Inglês</th>
                                                <th visibility="false">Estado/Província</th>
                                                <th>Editar</th> 
												<th>Remover</th>												
                                            </tr>
                                        </thead>
                            
                                        <tfoot>
                                            <tr>
                                                <th>Código IATA</th>
												<th>Nome do Aeroporto</th>
												<th>Nome do Aeroporto em Português</th>
												<th>Nome da Cidade em Inglês</th>
												<th>Nome da Cidade em Português</th>
                                                <th>Nome do País em Inglês</th>
                                                <th visibility="false">Estado/Província</th>                                            
                                                <th>Editar</th> 
												<th>Remover</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
    
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 
          
         <script type="text/javascript">
       
            $(document).ready(function() {
   
                //Coloca o input pra busca no head de cada coluna
                $('#list_airport tfoot th').each( function () {
                    var title = $('#list_airport thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );
                
                var cbx;
                var table = $('#list_airport').DataTable( {
                    dom: 'Bfrtip',
//                    dom: 'C<"clear">lfrtip',
                    colReorder: true,
                    buttons: [
                        'colvis'
                    ],
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
                         //esse if else foi criado para salvar o status do checkbox, se um check box foi marcado, ele continuara marcado
                         //mesmo se mudar de página do datatabes, os status só será alterado se o usuário desmarcar o checkbox
                         
                         
                         var qt_col=$('#list_airport thead th').length;
                         qt_col = qt_col -2;
                         //Gera o link para edição na última coluna
						$('td:eq('+qt_col+')', nRow).html("<a href='index.php?page=Editar-Aeroporto&airport_iata_code="+ajax[0]+"'><i class='fa fa-edit'/> Editar</a>");
						 qt_col ++;
                        $('td:eq('+qt_col+')', nRow).html("<a href='airport_list_information.php?airport_iata_code="+ajax[0]+"&page=delete'     onclick ='return confirm(\"Deseja excluir o registro?\");'><i class='fa fa-times-circle' /> Remover Aeroporto</a>");
					},
                    
                } );
                // Aplica o filtro
                $("#list_airport tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                var j=0;
                $('#list_airport thead th').each( function () {
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