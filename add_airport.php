<script type="text/javascript">
	function Inserir_Aeroporto()
	{
		var airport_name_pt = document.getElementById('airport_name').value;
		document.getElementById('airport_name_pt').value = airport_name_pt;
	}
	function Inserir_Cidade_Aeroporto()
	{
		var airport_city_pt = document.getElementById('airport_city_en').value;
		document.getElementById('airport_city_pt').value = airport_city_pt;
	}
</script>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adição de aeroportos
            <small>Dados</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar aeroporto</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Aeroporto</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adicionando aeroporto</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="airport_form" method="POST" role="form" class="half-form" action="airport_list_information.php?page=add">	
						
							<div class="form-group control-group">
								<label class="control-label" for="airport_iata_code">Código IATA/FAA  do Aeroporto</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_iata_code" name="airport_iata_code" data-inputmask="'mask': '(AAA)|(AA9)|(A9A)|(9AA)|(A99)|(9A9)|(99A)|(999)'"  placeholder="Código IATA/FAA  do Aeroporto"/>
								</div>
                            </div>					
                            <div class="form-group control-group">
								<label class="control-label" for="airport_name">Nome do Aeroporto</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_name" name="airport_name" placeholder="Nome do Aeroporto" onchange="Inserir_Aeroporto();" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_name_pt">Nome do Aeroporto em Português  (Texto que será exibido na conversão)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="airport_name_pt" name="airport_name_pt" placeholder="Nome do Aeroporto em Português  (Texto que será exibido na conversão)" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_city_en">Cidade do Aeroporto em Inglês/Língua Original</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_city_en" name="airport_city_en" placeholder="Cidade do Aeroporto em Inglês/Língua Original" onchange="Inserir_Cidade_Aeroporto();"/>
								</div>
                            </div>							
							<div class="form-group control-group">
								<label class="control-label" for="airport_city_pt">Cidade do Aeroporto em Português/Língua Original</label>
								<div class="controls">
									<input type="text" class="form-control" id="airport_city_pt" name="airport_city_pt" placeholder="Cidade do Aeroporto em Português/Língua Original"/>
								</div>
                            </div>	
							<div class="form-group control-group">
								<label class="control-label" for="airport_country_en">País em Inglês</label>
								<div class="controls">	
									<input type="text" class="form-control" id="airport_country_en" name="airport_country_en" onfocus="active_autocomplete({id: this.id, target_field: 'country_en', search_field: 'country_en', table: 'digitulus_country_list', validate: 'true'});" placeholder="País em Inglês" />
								</div>
                            </div>		
                            <div class="form-group control-group">
								<label class="control-label" for="geopolitical_division">Estado/Província/Departamento/Região/Governorato/Distrito/Ilha/Prefeitura em Inglês/Língua Original</label>
								<div class="controls">	
									<input type="text" class="form-control" id="geopolitical_division" name="geopolitical_division" onfocus="active_autocomplete({id: this.id, target_field: 'geopolitical_division', search_field: 'geopolitical_division', table: 'digitulus_airport_list', validate: 'false'});" placeholder="Estado/Província/Departamento/Região/Governorato/Distrito/Ilha/Prefeitura em Inglês/Língua Original" />
								</div>
                            </div>	
							<div class="form-group control-group">
								<div class="controls">
									<button class="btn btn-primary" type="submit">Salvar</button>
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
		$("form#airport_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});
    </script>    