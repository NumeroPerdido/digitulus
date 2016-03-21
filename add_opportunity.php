<?php 
    $client=new Client();
    if(isset($_GET["client_id"])){
        $client->get_client($_GET["client_id"]);
    }
?>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adicionar Atendimento
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar atendimento</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Novo Atendimento para <?php echo $client->client_name." ".$client->client_surname;?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="client_form" method="POST" role="form" class="half-form" action="opportunity_information.php?page=add&client_id=<?php echo $_GET["client_id"];?>">
                             <!-- Box Com as Infomações do Cliente  -->
                            <div class="box box-danger collapsed-box" id="client-info">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!--Botão de minimizar div-->
                                        <label class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                        <a href='index.php?page=Editar-Cliente&client_id=<?php echo $client->client_id?>'><label class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimizar"><i class="fa fa-edit"></i>Editar</label></a>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-user"></i>

                                    <h3 class="box-title">Informações de <?php echo $client->client_name." ".$client->client_surname;?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding" style="display: none;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="pad">
                                                <div class="form-group">
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
                            <!-- Adicionando Atendimento (Oportunidade) -->
                            <label class="control-label" for="control-label"><h4>Dados do Atendimento</h4></label>
							<div class="form-group control-group">
								<label class="control-label" for="opportunity_title">Resumo (Informação Mínima Essencial do Atendimento)</label>
								<div class="controls">
									<input type="text" class="form-control" id="opportunity_title" name="opportunity_title" placeholder="Resumo (Informação Mínima Essencial do Atendimento)" onfocus="active_autocomplete({id: this.id, target_field: 'opportunity_title', search_field: 'opportunity_title', table: 'digitulus_opportunity'});" required />
								</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Detalhamento do Pedido do Cliente</label>                                
                                    <textarea class="form-control" name="opportunity_description" id="opportunity_description" rows="5" cols="82"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status do Atendimento</label>
                                    <select class="form-control status_opportunity" id="opportunity_status" name="opportunity_status" placeholder="Status do Atendimento" onchange="change_bg_select();">
                                        <option class="status_vendido" value="Vendido">Vendido</option>
                                        <option class="status_nao_vendido" value="Não Vendido">Não Vendido</option>
                                        <option class="status_aguardar" value="Aguardar" selected>Aguardar</option>
                                        <option class="status_contatar" value="Contatar">Contatar</option>
                                        <option class="status_venda_futura" value="Venda Futura">Venda Futura</option>
                                        <option class="status_transferido" value="Transferido">Transferido</option>
                                    </select>
                            </div>  
                            <!-- Adicionando nova Atividade -->
                            <div class="form-group control-group">
                                <label>Data</label>
                                <div class="controls">									 
                                    <input type="text" class="form-control" id="activity_date" name="activity_date" placeholder="Data"/>
                                </div>
                            </div>
                            <div class="form-group control-group">
                                <label>Proposta do Vendedor</label>
                                <div class="controls">									 
                                    <textarea class="form-control" name="activity_proposal" id="activity_proposal" rows="5" cols="82"></textarea>
                                </div>
                            </div>
                            <div class="form-group control-group">
                                <label>Resposta do Cliente</label>
                                <div class="controls">
                                    <textarea class="form-control" name="activity_answer" id="activity_answer" rows="5" cols="82"></textarea>
                                </div>
                            </div>	
							<div class="form-group control-group">
								<div class="controls">
									<button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
								</div>
                            </div>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div>				
            </div>
        </div>
    </section><!-- /.content -->
<script>
    //ativa o calandário
    $( "#activity_date" ).datepicker($.datepicker.regional[ "pt-BR" ]);

    //troca o bg do select para o bg da opção selecionada
    function change_bg_select(){
        var select_class;
        select_class= $("#opportunity_status option:selected").attr('class');
        $("#opportunity_status").removeClass();
        $("#opportunity_status").addClass("form-control status_opportunity "+select_class);
    }
    change_bg_select();
</script>