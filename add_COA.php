

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
                        	<label class="control-label"><h4>Dados do Cliente</h4></label>
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
                                    <select class="form-control" id="opportunity_status" name="opportunity_status" placeholder="Status do Atendimento">
                                        <option value="Vendido">Vendido</option>
                                        <option value="Não Vendido">Não Vendido</option>
                                        <option value="Aguardar">Aguardar</option>
                                        <option value="Contatar" selected>Contatar</option>
                                        <option value="Venda Futura">Venda Futura</option>
                                        <option value="Transferido">Transferido</option>
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
</script>	