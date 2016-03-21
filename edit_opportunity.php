<?php
    //se os gets não foram setados mostra mensagem de erro
    //caso contrário continua com o código de editar atividade
    if(!isset($_GET["opportunity_id"]) || !isset($_GET["client_id"])){
        echo "<aside class='right-side'>Erro no Engano";   
    }
    else{
        $_SESSION["table"]="digitulus_activity";
        $opportunity= new Opportunity();
        $opportunity->get_opportunity($_GET["opportunity_id"]);
        $client= new Client();
        $father= new Client();
        $mother= new Client();
        $client->get_client($_GET["client_id"]);
        $father->get_client($client->get_father_id());
        $mother->get_client($client->get_mother_id());
        $deal_course= new Deal_course();
        $deal_course->get_deal_course_op($opportunity->opportunity_id);
?>

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Atendimento
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar Atendimento</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando Atendimento: <?php echo $opportunity->opportunity_title;?> - id:<?php echo $opportunity->opportunity_id;?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="client_form" method="POST" role="form" class="half-form" action="COA_information.php?page=edit&opportunity_id=<?php echo $opportunity->opportunity_id;?>&client_id=<?php echo $client->client_id; ?>">
                            
                            <!-- Box Com as Infomações do Cliente  -->
                            <div class="box box-warning collapsed-box" id="client-info">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!--Botão de minimizar div-->
                                        <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                        <a href='index.php?page=Editar-Cliente&client_id=<?php echo $client->client_id?>'><label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimizar"><i class="fa fa-edit"></i>Editar</label></a>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-user"></i>

                                    <h3 class="box-title">Informações do <?php echo $client->client_name." ".$client->client_surname;?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding" style="display: none;">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="pad">
                                                <div class="form-group col-xs-4">
                                                    <h4>
                                                        <label>Nome:</label> <?php echo $client->client_name." ".$client->client_surname; ?><br/>
                                                        <label>Telefone:</label> <?php echo $client->client_phone; ?><br/>
                                                        <label>Celular:</label> <?php echo $client->client_mobile; ?><br/>
                                                        <label>Email:</label> <?php echo $client->client_email; ?><br/>
                                                        <label>Como Chegou Aqui:</label> <?php echo $client->client_how_to_reach_us; ?><br/>
                                                        <label>Data de Nascimento:</label> <?php echo $client->client_date_of_birth; ?><br/>
                                                        <label>Endereço:</label> <?php echo $client->client_address; ?><br/>
                                                        <label>Bairro:</label> <?php echo $client->client_neighbourhood; ?><br/>
                                                        <label>Cidade:</label> <?php echo $client->client_city; ?><br/>
                                                        <label>Estado:</label> <?php echo $client->client_state; ?><br/>
                                                        <label>CEP:</label> <?php echo $client->client_cep; ?><br/>
                                                        <label>Sexo:</label> <?php echo $client->client_gender; ?><br/>
                                                        <label>Estado Civil:</label> <?php echo $client->client_civil_status; ?><br/>
                                                        <label>Profissão:</label> <?php echo $client->client_profession; ?><br/>
                                                        <label>Passaport:</label> <?php echo $client->client_passport; ?><br/>
                                                        <label>Validade Passaporte:</label> <?php echo $client->client_passport_expire_date; ?><br/>
                                                        <label>CPF:</label> <?php echo $client->client_cpf; ?><br/>
                                                        <label>RG:</label> <?php echo $client->client_rg; ?><br/>
                                                        <label>Informações Extras:</label> <?php echo $client->client_other_information; ?><br/>
                                                        <label>Nome de Contato:</label> <?php echo $client->client_contact_name; ?><br/>
                                                        <label>Relação Contado:</label> <?php echo $client->client_contact_relation; ?><br/>
                                                        <label>Telefone Contato:</label> <?php echo $client->client_contact_phone; ?><br/>
                                                        <label>Futuros Atendimentos:</label> <?php echo $client->client_future_opportunities; ?><br/>
                                                    </h4>
                                                </div>
                                                <div class="form-group col-xs-3" <?php if($father->client_id==""){ echo "hidden='hidden'"; }?>>
                                                    <h4>
                                                        <label>Nome do PAI:</label> <?php echo $father->client_name." ".$father->client_surname; ?><br/>
                                                        <label>Telefone:</label> <?php echo $father->client_phone; ?><br/>
                                                        <label>Celular:</label> <?php echo $father->client_mobile; ?><br/>
                                                        <label>Email:</label> <?php echo $father->client_email; ?><br/>
                                                        <label>Como Chegou Aqui:</label> <?php echo $father->client_how_to_reach_us; ?><br/>
                                                        <label>Data de Nascimento:</label> <?php echo $father->client_date_of_birth; ?><br/>
                                                        <label>Endereço:</label> <?php echo $father->client_address; ?><br/>
                                                        <label>Bairro:</label> <?php echo $father->client_neighbourhood; ?><br/>
                                                        <label>Cidade:</label> <?php echo $father->client_city; ?><br/>
                                                        <label>Estado:</label> <?php echo $father->client_state; ?><br/>
                                                        <label>CEP:</label> <?php echo $father->client_cep; ?><br/>
                                                        <label>Sexo:</label> <?php echo $father->client_gender; ?><br/>
                                                        <label>Estado Civil:</label> <?php echo $father->client_civil_status; ?><br/>
                                                        <label>Profissão:</label> <?php echo $father->client_profession; ?><br/>
                                                        <label>Passaport:</label> <?php echo $father->client_passport; ?><br/>
                                                        <label>Validade Passaporte:</label> <?php echo $father->client_passport_expire_date; ?><br/>
                                                        <label>CPF:</label> <?php echo $father->client_cpf; ?><br/>
                                                        <label>RG:</label> <?php echo $father->client_rg; ?><br/>
                                                        <label>Informações Extras:</label> <?php echo $father->client_other_information; ?><br/>
                                                        <label>Nome de Contato:</label> <?php echo $father->client_contact_name; ?><br/>
                                                        <label>Relação Contado:</label> <?php echo $father->client_contact_relation; ?><br/>
                                                        <label>Telefone Contato:</label> <?php echo $father->client_contact_phone; ?><br/>
                                                        <label>Futuros Atendimentos:</label> <?php echo $father->client_future_opportunities; ?><br/>
                                                    </h4>
                                                </div>
                                                <div class="form-group col-xs-3"<?php if($mother->client_id==""){ echo "hidden='hidden'"; }?>>
                                                    <h4>
                                                        <label>Nome da MÂE:</label> <?php echo $mother->client_name." ".$mother->client_surname; ?><br/>
                                                        <label>Telefone:</label> <?php echo $mother->client_phone; ?><br/>
                                                        <label>Celular:</label> <?php echo $mother->client_mobile; ?><br/>
                                                        <label>Email:</label> <?php echo $mother->client_email; ?><br/>
                                                        <label>Como Chegou Aqui:</label> <?php echo $mother->client_how_to_reach_us; ?><br/>
                                                        <label>Data de Nascimento:</label> <?php echo $mother->client_date_of_birth; ?><br/>
                                                        <label>Endereço:</label> <?php echo $mother->client_address; ?><br/>
                                                        <label>Bairro:</label> <?php echo $mother->client_neighbourhood; ?><br/>
                                                        <label>Cidade:</label> <?php echo $mother->client_city; ?><br/>
                                                        <label>Estado:</label> <?php echo $mother->client_state; ?><br/>
                                                        <label>CEP:</label> <?php echo $mother->client_cep; ?><br/>
                                                        <label>Sexo:</label> <?php echo $mother->client_gender; ?><br/>
                                                        <label>Estado Civil:</label> <?php echo $mother->client_civil_status; ?><br/>
                                                        <label>Profissão:</label> <?php echo $mother->client_profession; ?><br/>
                                                        <label>Passaport:</label> <?php echo $mother->client_passport; ?><br/>
                                                        <label>Validade Passaporte:</label> <?php echo $mother->client_passport_expire_date; ?><br/>
                                                        <label>CPF:</label> <?php echo $mother->client_cpf; ?><br/>
                                                        <label>RG:</label> <?php echo $mother->client_rg; ?><br/>
                                                        <label>Informações Extras:</label> <?php echo $mother->client_other_information; ?><br/>
                                                        <label>Nome de Contato:</label> <?php echo $mother->client_contact_name; ?><br/>
                                                        <label>Relação Contado:</label> <?php echo $mother->client_contact_relation; ?><br/>
                                                        <label>Telefone Contato:</label> <?php echo $mother->client_contact_phone; ?><br/>
                                                        <label>Futuros Atendimentos:</label> <?php echo $mother->client_future_opportunities; ?><br/>
                                                    </h4>
                                                </div>
                                            </div><!-- /.pad -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row - inside box -->
                                </div><!-- /.box-body -->
                                <div class="box-footer" style="display: none;">
                                    <div class="row">
                                    </div><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                            <!--Final Box da Informações do Usuário-->
                            
                            <!-- Box Adicionar nova atividade  -->
                            <div class="box box-warning collapsed-box" id="add-activity">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!--Botão de minimizar div-->
                                        <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-comment"></i>

                                    <h3 class="box-title">Adicionar Nova Atividade</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding" style="display: none;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="pad">
                                                <!-- Adicionando nova Atividade -->
                                                <div class="form-group control-group">
                                                    <label>Data</label>
                                                    <div class="controls">									 
                                                        <input type="text" class="form-control" id="new_activity_date" name="new_activity_date" placeholder="Data"/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Proposta do Vendedor</label>
                                                    <div class="controls">									 
                                                        <textarea class="form-control" name="new_activity_proposal" id="new_activity_proposal" rows="5" cols="82"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Resposta do Cliente</label>
                                                    <div class="controls">
                                                        <textarea class="form-control" name="new_activity_answer" id="new_activity_answer" rows="5" cols="82"></textarea>
                                                    </div>
                                                </div>	          
                                            </div><!-- /.pad -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row - inside box -->
                                </div><!-- /.box-body -->
                                <div class="box-footer" style="display: none;">
                                    <div class="row">
                                    </div><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                            <!--Final Box da Add Atividade-->
                            <!--Botão de adicionar orçamento-->
                            <!-- <a href="index.php?page=Adicionar-Orcamento&opportunity_id=<?php echo $opportunity->opportunity_id;?>"><label class="btn btn-warning btn-block">Adicionar Orçamento</label></a> -->
                            
                            <!--Botão de gerar contrato-->
                            <!-- <a href="PHPWord/generate_contract.php?opportunity_id=<?php echo $opportunity->opportunity_id;?>&deal_course_id=<?php echo $deal_course->deal_course_id;?>"><label class="btn btn-warning btn-block">Gerar Contrato</label></a> -->
                            
                            <!-- Editando Atendimento (Oportunidade) -->
                            <label class="control-label" ><h4>Dados do Atendimento</h4></label>
							<div class="form-group">
								<label class="control-label" for="opportunity_title">Resumo (Informação Mínima Essencial do Atendimento)</label>
									<input type="text" class="form-control" id="opportunity_title" name="opportunity_title" placeholder="Resumo (Informação Mínima Essencial do Atendimento)" value="<?php echo $opportunity->opportunity_title;?>" onfocus="active_autocomplete({id: this.id, target_field: 'opportunity_title', search_field: 'opportunity_title', table: 'digitulus_opportunity'});"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Detalhamento do Pedido do Cliente</label>                                
                                    <textarea class="form-control" name="opportunity_description" id="opportunity_description" rows="5" cols="82"><?php echo $opportunity->opportunity_description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status do Atendimento</label>
                                    <select class="form-control status_opportunity" id="opportunity_status" name="opportunity_status" placeholder="Status do Atendimento" onchange="change_bg_select();">
                                        <option class="status_vendido" value="Vendido" <?php if($opportunity->opportunity_status=="Vendido") echo "selected"; ?>>Vendido</option>
                                        <option class="status_nao_vendido" value="Não Vendido" <?php if($opportunity->opportunity_status=="Não Vendido") echo "selected"; ?>>Não Vendido</option>
                                        <option class="status_aguardar" value="Aguardar" <?php if($opportunity->opportunity_status=="Aguardar") echo "selected"; ?>>Aguardar</option>
                                        <option class="status_contatar" value="Contatar" <?php if($opportunity->opportunity_status=="Contatar") echo "selected"; ?>>Contatar</option>
                                        <option class="status_venda_futura" value="Venda Futura" <?php if($opportunity->opportunity_status=="Venda Futura") echo "selected"; ?>>Venda Futura</option>
                                        <option class="status_transferido" value="Transferido" <?php if($opportunity->opportunity_status=="Transferido") echo "selected"; ?>>Transferido</option>
                                    </select>
                            </div>                               
                            
                            <!-- Editando nova Atividade -->
                            <div hidden="hidden" class="form-group" id="div_activity">
                                <label class="control-label" ><h4>Editar Atendimento</h4></label>
                                <div class="form-group control-group">
                                    <label>ID</label>
                                    <div class="controls">									 
                                        <input type="text" class="form-control" id="edit_activity_id" name="edit_activity_id" placeholder="Data" readonly/>
                                    </div>
                                </div>
                                <div class="form-group control-group">
                                    <label>Data</label>
                                    <div class="controls">									 
                                        <input type="text" class="form-control" id="edit_activity_date" name="edit_activity_date" placeholder="Data"/>
                                    </div>
                                </div>
                                <div class="form-group control-group">
                                    <label>Proposta do Vendedor</label>
                                    <div class="controls">									 
                                        <textarea class="form-control" name="edit_activity_proposal" id="edit_activity_proposal" rows="5" cols="82"></textarea>
                                    </div>
                                </div>
                                <div class="form-group control-group">
                                    <label>Resposta do Cliente</label>
                                    <div class="controls">
                                        <textarea class="form-control" name="edit_activity_answer" id="edit_activity_answer" rows="5" cols="82"></textarea>
                                    </div>
                                </div>	  
                            </div>			
							<div class="form-group">
									<button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
                            </div>   
                        </form>
                        <!--Tabela de Atividades-->
                        <div class="box-body table-responsive">
                            <table id="list_activity" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Data</th>
                                        <th>Proposta</th>
                                        <th>Resposta</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Data</th>
                                        <th>Proposta</th>
                                        <th>Resposta</th>
                                        <th>Editar</th>               
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
					<!--FINAL DO FORM-->
                </div><!-- /.box box-primary -->				
            </div><!-- /.col-xs-12 -->
        </div><!-- row -->
    </section><!-- /.content -->
<script type="text/javascript">
            //script para carregar o conteúdo da tabela
            $(document).ready(function() {
                var cbx;
                var table = $('#list_activity').DataTable( {
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
                    "searchCols":[null,null,null,null,{ "search": "<?php echo $opportunity->opportunity_id; ?>" }],
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
                         $('td:eq(4)', nRow).html("<a href='#div_activity' onclick='edit_activity("+ajax[0]+");'><i class='fa fa-edit'/>Editar</a>");
                    },
                } );
                
                //Coloca o input pra busca no head de cada coluna
                $('#list_activity tfoot th').each( function () {
                    var title = $('#list_activity thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );

                // Aplica o filtro
                $("#list_activity tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                var j=0;
                $('#list_activity thead th').each( function () {
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
    
    //ativa o calandário
    $( "#edit_activity_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    $( "#new_activity_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);
    
    //pega as informarções da atividade via ajax
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
        return result;
    }
    //recupera via ajax os danos do atividade para edição e coloca nos respectivos inputs
    function edit_activity(id_activity){
        $("#div_activity").toggle(true);
        var activity="";
        activity=ajax_db_return({search_word: id_activity, target_field: "*", search_field: "activity_id", table: "digitulus_activity"});
        $("#edit_activity_id").val(activity["activity_id"]);
        $("#edit_activity_date").val(activity["activity_date"]);
        $("#edit_activity_proposal").val(activity["activity_proposal"]);
        $("#edit_activity_answer").val(activity["activity_answer"]);
    }

    //troca o bg do select para o bg da opção selecionada
    function change_bg_select(){
        var select_class;
        select_class= $("#opportunity_status option:selected").attr('class');
        $("#opportunity_status").removeClass();
        $("#opportunity_status").addClass("form-control status_opportunity "+select_class);
    }
    change_bg_select();
</script>
<?php
    }//final do else
?>
