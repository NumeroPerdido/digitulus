

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adicionar Cliente com Atendimento
            <small></small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar Cliente com Atendimento</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adicionando Cliente com Atendimento</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="client_form" method="POST" role="form" class="half-form" action="COA_information.php?page=add">
                        	<div class="row">
                                <div class="col-xs-4">
                                    <label class="control-label" for="control-label"><h4>Dados do Cliente</h4></label>
                                    <div class="form-group">
                                        <label class="control-label"><h3 class="text-red"><b>Buscar Cliente</b></h3> <label onclick="clean_form('client');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações do Cliente"><i class="fa fa-eraser"></i>Limpar Dados do Cliente</label></label>
                                            <input type="text" class="form-control" id="client_search" name="client_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Cliente" />
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Nome</label>								 
        									<input type="text" class="form-control" id="client_name" name="client_name" placeholder="Nome do Cliente" required />
                                    </div>
                                    <div class="form-group">
        								<label class="control-label">Sobrenome</label>									 
        									 <input type="text" class="form-control" id="client_surname" name="client_surname" placeholder="Sobrenome do Cliente"  required />
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Telefone</label>
        									<input type="text" class="form-control" id="client_phone" name="client_phone" placeholder="Telefone do Cliente"  data-inputmask="'mask': '(99)9999-9999'" />
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Celular</label>	
        									<input type="text" class="form-control" id="client_mobile" name="client_mobile" placeholder="Celular do Cliente" data-inputmask="'mask': '(99)99999-9999'" />
                                    </div>                            
        							<div class="form-group">
        								<label class="control-label">E-mail</label>
        									<input type="text" class="form-control" id="client_email" name="client_email" placeholder="E-mail do Cliente" data-inputmask="'alias': 'email'" required  />
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Como chegou até o Artha</label>
        									<input type="text" class="form-control" id="client_how_to_reach_us" name="client_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'client_how_to_reach_us', search_field: 'client_how_to_reach_us', table: 'digitulus_client'});"/>
                                    </div>                       
                                    <!-- Adicionando Atendimento (Oportunidade) -->
                                    <label class="control-label"><h4>Dados do Atendimento</h4></label>
        							<div class="form-group">
        								<label class="control-label">Resumo (Informação Mínima Essencial do Atendimento)</label>
        									<input type="text" class="form-control" id="opportunity_title" name="opportunity_title" placeholder="Resumo (Informação Mínima Essencial do Atendimento)" onfocus="active_autocomplete({id: this.id, target_field: 'opportunity_title', search_field: 'opportunity_title', table: 'digitulus_opportunity'});" />
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
                                    <!-- Adicionando a primeira Atividade do Atendimento (Atividade) -->
                                    <label class="control-label"><h4>Dados da Atividade do Atendimento</h4></label>
        							<div class="form-group">
        								<label class="control-label">Data</label>								 
        									<input type="text" class="form-control" id="activity_date" name="activity_date" placeholder="Data"/>
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Proposta do Vendedor</label>								 
        									<textarea class="form-control" name="activity_proposal" id="activity_proposal" rows="5" cols="82"></textarea>
                                    </div>
        							<div class="form-group">
        								<label class="control-label">Resposta do Cliente</label>
        									<textarea class="form-control" name="activity_answer" id="activity_answer" rows="5" cols="82"></textarea>
                                    </div>					
        							<div class="form-group">
        									<button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <!-- Box Com as Infomações do Pai  -->
                                    <div class="box box-warning collapsed-box" id="client-info">
                                        <div class="box-header">
                                            <!-- tools box -->
                                            <div class="pull-right box-tools">
                                                <!--Botão de minimizar div-->
                                                <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                                <label onclick="clean_form('father');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações do Pai"><i class="fa fa-eraser"></i>Limpar Dados</label>
                                            </div><!-- /. tools -->
                                            <i class="fa fa-fw fa-user"></i>

                                            <h3 class="box-title">Informações do Pai</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding" style="display: none;">
                                            <div class="pad">
                                                <div class="form-group">
                                                    <label class="control-label"><h3 class="text-red"><b>Buscar Pai</b></h3></label>
                                                        <input type="text" class="form-control" id="father_search" name="father_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Pai" />
                                                </div>
                                                <div class="form-group" hidden="hidden">
                                                    <label class="control-label">Id do Pai</label>
                                                        <input type="text" class="form-control" id="father_id" name="father_id" placeholder="Id do Pai" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nome do Pai</label>
                                                        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Nome do Pai" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Sobrenome</label>                               
                                                         <input type="text" class="form-control" id="father_surname" name="father_surname" placeholder="Sobrenome do Pai"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                        <input type="text" class="form-control" id="father_phone" name="father_phone" placeholder="Telefone do Pai" data-inputmask="'mask': '(99)9999-9999'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Celular</label>
                                                        <input type="text" class="form-control" id="father_mobile"  name="father_mobile" placeholder="Celular do Pai"  data-inputmask="'mask': '(99)99999-9999'"/>
                                                </div>                            
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                        <input type="text" class="form-control" id="father_email" name="father_email" placeholder="E-mail do Pai" data-inputmask="'alias': 'email'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Como chegou até o Artha</label>
                                                        <input type="text" class="form-control" id="father_how_to_reach_us" name="father_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'father_how_to_reach_us', search_field: 'father_how_to_reach_us', table: 'digitulus_father'});" />
                                                </div>
                                            </div><!-- /.pad -->
                                        </div><!-- /.box-body -->
                                        <div class="box-footer" style="display: none;">
                                            <div class="row">
                                            </div><!-- /.row -->
                                        </div><!-- /.box-footer -->
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-xs-3">
                                    <!-- Box Com as Infomações da Mãe  -->
                                    <div class="box box-warning collapsed-box" id="client-info">
                                        <div class="box-header">
                                            <!-- tools box -->
                                            <div class="pull-right box-tools">
                                                <!--Botão de minimizar div-->
                                                <label class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Mostrar/Esconder"><i class="fa fa-eye"></i>Mostrar/Esconder</label>
                                                <label onclick="clean_form('mother');" class="btn btn-warning btn-sm" data-widget='collapse' data-toggle="tooltip" title="Limpar Informações da Mãe"><i class="fa fa-eraser"></i>Limpar Dados</label>
                                            </div><!-- /. tools -->
                                            <i class="fa fa-fw fa-user"></i>

                                            <h3 class="box-title">Informações da Mãe</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body no-padding" style="display: none;">
                                            <div class="pad">
                                                <div class="form-group">
                                                    <label class="control-label"><h3 class="text-red"><b>Buscar Mãe</b></h3></label>
                                                        <input type="text" class="form-control" id="mother_search" name="mother_search" onfocus="active_autocomplete({id: this.id, target_field: 'client_id,client_name,client_surname,client_phone,client_mobile,client_email', search_field: 'client_name', table: 'digitulus_client', validate: 'true'});" placeholder="Buscar Mãe" />
                                                </div>
                                                <div class="form-group" hidden="hidden">
                                                    <label class="control-label">Id da Mãe</label>
                                                        <input type="text" class="form-control" id="mother_id" name="mother_id" placeholder="Id da Mãe" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nome da Mãe</label>
                                                        <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Nome da Mãe" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Sobrenome</label>                               
                                                         <input type="text" class="form-control" id="mother_surname" name="mother_surname" placeholder="Sobrenome da Mãe"   />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Telefone</label>
                                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone" placeholder="Telefone doaMãe" data-inputmask="'mask': '(99)9999-9999'" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Celular</label>
                                                        <input type="text" class="form-control" id="mother_mobile"  name="mother_mobile" placeholder="Celular da Mãe"  data-inputmask="'mask': '(99)99999-9999'"/>
                                                </div>                            
                                                <div class="form-group">
                                                    <label class="control-label">E-mail</label>
                                                        <input type="text" class="form-control" id="mother_email" name="mother_email" placeholder="E-mail da Mãe" data-inputmask="'alias': 'email'"  />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Como chegou até o Artha</label>
                                                        <input type="text" class="form-control" id="mother_how_to_reach_us" name="mother_how_to_reach_us" placeholder="Como chegou até o Artha" onfocus="active_autocomplete({id: this.id, target_field: 'mother_how_to_reach_us', search_field: 'mother_how_to_reach_us', table: 'digitulus_mother'});" />
                                                </div>
                                            </div><!-- /.pad -->
                                        </div><!-- /.box-body -->
                                        <div class="box-footer" style="display: none;">
                                            <div class="row">
                                            </div><!-- /.row -->
                                        </div><!-- /.box-footer -->
                                    </div><!-- /.box -->
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
    
    $(document).ready (function () {
		$("form#client_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});

    //troca o bg do select para o bg da opção selecionada
    function change_bg_select(){
        var select_class;
        select_class= $("#opportunity_status option:selected").attr('class');
        $("#opportunity_status").removeClass();
        $("#opportunity_status").addClass("form-control status_opportunity "+select_class);
    }
    change_bg_select();
    //Busca do Pai, carrega no formulario todas as infromações recuperadas do pai 
$("#father_search").change(function() {
    var father_search=$("#father_search").val();
    father_search=father_search.split("|");
    father_id=father_search[0];
    var father=ajax_db_return({search_word: father_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#father_id").val(father["client_id"]);
    $("#father_name").val(father["client_name"]);
    $("#father_surname").val(father["client_surname"]);
    $("#father_phone").val(father["client_phone"]);
    $("#father_mobile").val(father["client_mobile"]);
    $("#father_email").val(father["client_email"]);
    $("#father_client_how_to_reach_us").val(father["client_how_to_reach_us"]);
    $("#father_date_of_birth").val(father["client_date_of_birth"]);
    $("#father_cep").val(father["client_cep"]);
    $("#father_address").val(father["client_address"]);
    $("#father_neighbourhood").val(father["client_neighbourhood"]);
    $("#father_city").val(father["client_city"]);
    $("#father_state").val(father["client_state"]);
    $("#father_gender").val(father["client_gender"]);
    $("#father_civil_status").val(father["client_civil_status"]);
    $("#father_profession").val(father["client_profession"]);
    $("#father_passport").val(father["client_passport"]);
    $("#father_cpf").val(father["client_cpf"]);
    $("#father_rg").val(father["client_rg"]);
    $("#father_passport_expire_date").val(father["client_passport_expire_date"]);
    $("#father_other_information").val(father["client_other_information"]);
    $("#father_contact_name").val(father["client_contact_name"]);
    $("#client_contact_relation").val(father["client_contact_relation"]);
    $("#father_contact_phone").val(father["client_contact_phone"]);
    $("#father_contact_email").val(father["client_contact_email"]);

});

//Busca da Mãe, carrega no formulario todas as infromações recuperadas da mãe
$("#mother_search").change(function() {
    var mother_search=$("#mother_search").val();
    mother_search=mother_search.split("|");
    mother_id=mother_search[0];
    var mother=ajax_db_return({search_word: mother_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#mother_id").val(mother["client_id"]);
    $("#mother_name").val(mother["client_name"]);
    $("#mother_surname").val(mother["client_surname"]);
    $("#mother_phone").val(mother["client_phone"]);
    $("#mother_mobile").val(mother["client_mobile"]);
    $("#mother_email").val(mother["client_email"]);
    $("#mother_client_how_to_reach_us").val(mother["client_how_to_reach_us"]);
    $("#mother_date_of_birth").val(mother["client_date_of_birth"]);
    $("#mother_cep").val(mother["client_cep"]);
    $("#mother_address").val(mother["client_address"]);
    $("#mother_neighbourhood").val(mother["client_neighbourhood"]);
    $("#mother_city").val(mother["client_city"]);
    $("#mother_state").val(mother["client_state"]);
    $("#mother_gender").val(mother["client_gender"]);
    $("#mother_civil_status").val(mother["client_civil_status"]);
    $("#mother_profession").val(mother["client_profession"]);
    $("#mother_passport").val(mother["client_passport"]);
    $("#mother_cpf").val(mother["client_cpf"]);
    $("#mother_rg").val(mother["client_rg"]);
    $("#mother_passport_expire_date").val(mother["client_passport_expire_date"]);
    $("#mother_other_information").val(mother["client_other_information"]);
    $("#mother_contact_name").val(mother["client_contact_name"]);
    $("#client_contact_relation").val(mother["client_contact_relation"]);
    $("#mother_contact_phone").val(mother["client_contact_phone"]);
    $("#mother_contact_email").val(mother["client_contact_email"]);

});

//Busca do Cliente, carrega no formulario todas as infromações recuperadas do cliente 
$("#client_search").change(function() {
    var client_search=$("#client_search").val();
    client_search=client_search.split("|");
    client_id=client_search[0];
    var client=ajax_db_return({search_word: client_id, target_field: "*", search_field: "client_id", table: "digitulus_client"});
    
    $("#client_id").val(client["client_id"]);
    $("#client_name").val(client["client_name"]);
    $("#client_surname").val(client["client_surname"]);
    $("#client_phone").val(client["client_phone"]);
    $("#client_mobile").val(client["client_mobile"]);
    $("#client_email").val(client["client_email"]);
    $("#client_client_how_to_reach_us").val(client["client_how_to_reach_us"]);
    $("#client_date_of_birth").val(client["client_date_of_birth"]);
    $("#client_cep").val(client["client_cep"]);
    $("#client_address").val(client["client_address"]);
    $("#client_neighbourhood").val(client["client_neighbourhood"]);
    $("#client_city").val(client["client_city"]);
    $("#client_state").val(client["client_state"]);
    $("#client_gender").val(client["client_gender"]);
    $("#client_civil_status").val(client["client_civil_status"]);
    $("#client_profession").val(client["client_profession"]);
    $("#client_passport").val(client["client_passport"]);
    $("#client_cpf").val(client["client_cpf"]);
    $("#client_rg").val(client["client_rg"]);
    $("#client_passport_expire_date").val(client["client_passport_expire_date"]);
    $("#client_other_information").val(client["client_other_information"]);
    $("#client_contact_name").val(client["client_contact_name"]);
    $("#client_contact_relation").val(client["client_contact_relation"]);
    $("#client_contact_phone").val(client["client_contact_phone"]);
    $("#client_contact_email").val(client["client_contact_email"]);

});

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
    function clean_form(form){
        $("#"+form+"_search").val("");
        $("#"+form+"_id").val("");
        $("#"+form+"_name").val("");
        $("#"+form+"_surname").val("");
        $("#"+form+"_phone").val("");
        $("#"+form+"_mobile").val("");
        $("#"+form+"_email").val("");
        $("#"+form+"_"+form+"_how_to_reach_us").val("");
        $("#"+form+"_date_of_birth").val("");
        $("#"+form+"_cep").val("");
        $("#"+form+"_address").val("");
        $("#"+form+"_neighbourhood").val("");
        $("#"+form+"_city").val("");
        $("#"+form+"_state").val("");
        $("#"+form+"_gender").val("");
        $("#"+form+"_civil_status").val("");
        $("#"+form+"_profession").val("");
        $("#"+form+"_passport").val("");
        $("#"+form+"_cpf").val("");
        $("#"+form+"_rg").val("");
        $("#"+form+"_passport_expire_date").val("");
        $("#"+form+"_other_information").val("");
        $("#"+form+"_contact_name").val("");
        $("#"+form+"_contact_relation").val("");
        $("#"+form+"_contact_phone").val("");
        $("#"+form+"_contact_email").val("");
    }
</script>	