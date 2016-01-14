

	<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adição de companhias aéreas
            <small>Dados</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar companhia aérea</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Companhia Aérea</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adicionando companhia aérea</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="airline_form" method="POST" role="form" class="half-form" action="airline_list_information.php?page=add">	
						
							<div class="form-group control-group">
								<label class="control-label" for="airline_iata_code">Código IATA da Companhia Aérea</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airline_iata_code" name="airline_iata_code" data-inputmask="'mask': '(AA)|(A9)|(9A)|(99)'" placeholder="Código IATA da Companhia Aérea"/>
								</div>
                            </div>					
                            <div class="form-group control-group">
								<label class="control-label" for="airline_name">Nome da Companhia Aérea</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airline_name" name="airline_name" placeholder="Nome da Companhia Aérea" onchange="Inserir_Companhia_Aerea();"/>
								</div>
                            </div>
							
                            
							<div class="form-group control-group">
								<label class="control-label" for="airline_country_en">País em Inglês</label>
								<div class="controls">	
									<input type="text" class="form-control" id="airline_country_en" name="airline_country_en"  onfocus="active_autocomplete({id: this.id, target_field: 'country_en', search_field: 'country_en', table: 'digitulus_country_list', validate: 'true'});" placeholder="País em Inglês"/>
								</div>
                            </div>												
							<div class="form-group control-group">
								<div class="controls">
									<button class="btn btn-primary" id= "submit_form" type="submit">Salvar</button>
								</div>
                            </div>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div><!-- /.tab-pane -->				
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </section><!-- /.content -->
        <script type="text/javascript">
	
    // aplicas as máscaras aos campos do formulário de acordo com o data-inputmask-alias
    $(document).ready (function () {
		$("form#airline_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});
        </script>