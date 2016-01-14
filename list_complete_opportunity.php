
<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_opportunity";
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
                    "searchCols":[null,null,null,null,null,null,null,null,null,null],
                    //recebe o json desse página para ser aplicado na tabela
                    "ajax": {
                        "url":"pagination/pagination_serverside.php",
                        "type": "POST"
                    },
                    //quando a tabela acaba de carregar as cores das linhas das tabelas são mudadas de acordo com o status do oppotunity
                    "initComplete": function () {
                        $('#list_opportunity tbody tr').each( function () {
                            //pega o nome da classa do tr
                            var classe =$(this).attr('class');
                            //pega o conteúdo do dentro da terceira coluna da respectiva linha
                            var status=$(this).find('td:eq(2)').text();
                            switch(status){
                                //Cores para o Atendimento Fechado (Vendido)  
                                case "Vendido":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#ccffcc"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ccffcc");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#99ff99"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#99ff99");
                                        });
                                    }
                                    break;
                                //Cores para o Status Atendimento Não Fechado (Não Vendido)   
                                case "Não Vendido":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#ffcc99"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffcc99");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#ff9966"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ff9966");
                                        });
                                    }
                                    break;
                                //Cores para o Status Atendimento em Negociação que é preciso aguardar contato do cliente   
                                case "Aguardar":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#ffffff"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffffff");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#f2f2f2"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#f2f2f2");
                                        });
                                    }
                                    break;
                                //Cores para o Status Atendimento em Negociação que é preciso contatar o cliente   
                                case "Contatar":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#ffe5ff"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffe5ff");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#ffccff"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffccff");
                                        });
                                    }
                                    break;
                                //Cores para o Status Atendimento com possibilidade de Retorno    
                                case "Venda Futura":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#ffffcc"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffffcc");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#ffff99"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#ffff99");
                                        });
                                    }
                                    break;
                                //Cores para o Status Atendimento Trasferido    
                                case "Transferido":
                                    //muda a cor da linha caso seja uma linha par
                                    if(classe=="even"){
                                        //cor inicial
                                        $(this).css({"background-color": "#eafbfb"});
                                        //cor do hover(parar o mouse em cima)
                                        $(this).hover(function(){
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#eafbfb");
                                        });
                                    }
                                    //muda a cor da linha caso a linha seja ímpar
                                    else{
                                        //cor inicial
                                        $(this).css({"background-color": "#d4f7f7"});
                                        $(this).hover(function(){
                                            //cor de hover(para o mouse em cima)
                                            $(this).css("background-color", "#B6B7B8");
                                            }, function(){
                                            //cor ao tirar o mouse
                                            $(this).css("background-color", "#d4f7f7");
                                        });
                                    }
                                    break;
                                    
                            }
                            
                        } );
                        
                    },
                    "fnCreatedRow": function( nRow, ajax, iDataIndex ) {
                         // nRow - this is the HTML element of the row
                         // aData - array of the data in the columns. Get column 4 data: aData[3]
                         // iDataIndex - row index in the table
                         // Append to the first column
                         //Gera o link para edição na última coluna
                         $('td:eq(8)', nRow).html("<a href='index.php?page=Editar-Atendimento&opportunity_id="+ajax[0]+"&client_id="+ajax[7]+"''><i class='fa fa-edit'/>Continuar Atendimento</a>");
                         $('td:eq(9)', nRow).html("<a href='index.php?page=Concluir-Venda&opportunity_id="+ajax[0]+"&client_id="+ajax[7]+"''><i class='fa fa-check-square-o'/>Concluir Venda</a>");
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
                        .search( this.value )
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