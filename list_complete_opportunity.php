<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_opportunity_complete";
?> 

<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de Atendimentos ADMIN
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
                                    <h3 class="box-title">Atendimentos ADMIN</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="list_opportunity_complete" class="table table-bordered ">
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
                                                <th>Vendedor</th>
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
                                                <th>Vendedor</th>
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
                var table = $('#list_opportunity_complete').DataTable( {
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
                    "searchCols":[null,null,null,null,null,null,null,null,null,null],
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
                        var usr_name,deal_course_id;
                        var img_path="img/profile/default.png";
                        //verifica se existe a imagem do usuário, caso exista ela é mostrada. caso não exista é mostrada a imagem default.png
                        $.get("img/profile/"+ajax[8]+".jpg")
                            .done(function() { 
                                img_path= "img/profile/"+ajax[8]+".jpg";
                            }).fail(function() { 
                                img_path= "img/profile/default.png";
                            })
                        //pega o nome do usario atraves de uma resposta ajax
                        usr_name=ajax_db_return({id: "usr_name", search_word: ajax[8], target_field: "username", search_field: "user_id", table: "digitulus_user"});
                        //exibe o nome e a imagem do usuário
                        $('td:eq(8)', nRow).html(usr_name+"<img src='"+img_path+"' class='img-circle' width='50' height='50' alt='User Image' />");
                        $('td:eq(9)', nRow).html("<a href='index.php?page=Editar-Atendimento&opportunity_id="+ajax[0]+"&client_id="+ajax[9]+"''><i class='fa fa-edit'/>Continuar Atendimento</a>");
                        $('td:eq(10)', nRow).html("<a href='index.php?page=Concluir-Venda&opportunity_id="+ajax[0]+"&client_id="+ajax[9]+"''><i class='fa fa-check-square-o'/>Concluir Venda</a>");
                        
                        //função para colorir a tabela de acordo com o status
                        //nRow é o elemento HTML da linha, iDataIndex é o número da linha, e ajax[2]/status é o status do atendimento
                        color_row(nRow,iDataIndex,ajax[2]);
                    },
                } );
                
                //Coloca o input pra busca no head de cada coluna
                $('#list_opportunity_complete tfoot th').each( function () {
                    var title = $('#list_opportunity_complete thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );

                // Aplica o filtro
                $("#list_opportunity_complete tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                var j=0;
                $('#list_opportunity_complete thead th').each( function () {
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
function ajax_db_return(){
        //search_word= o que foi digitado no input
        //target_field= o campo que será retornado na busca no bd
        //search_field= o campo no bd em que o search_word será pesquisado
        //table= tabela que sera pesquisada
        //validate= bool para validar o campo apenas para aceitar os valores da lista
        //extra_field=campo da clausula extra
        //extra_clause=valor que será pesquisado na clausula extra  
        var id=arguments[0]["id"],
        search_word=arguments[0]["search_word"],
        target_field=arguments[0]["target_field"],
        search_field=arguments[0]["search_field"],
        table=arguments[0]["table"],
        validate=arguments[0]["validate"],
        extra_clause=arguments[0]["extra_clause"],
        extra_field=arguments[0]["extra_field"],
        result;
        $.ajax({
            url:"ajax_db_return.php",
            dataType: "json",
            //faz com que a resposta do ajax seja sincrona
            async: false,
            data: {
                search_word: search_word,
                target_field: target_field,
                search_field: search_field,  
                table: table,
                extra_clause: extra_clause,
                extra_field: extra_field
            },
                success: function(data){
                    result=data[0]
                }
        });
        $('#'+id).val(result);
        return result;
    }
        </script>