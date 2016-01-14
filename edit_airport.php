<?php
	if(isset($_POST["airport_iata_code"]))
	{
		$airport_list = new Airport_list();
		$airport_list->airport_iata_code = $_GET["airport_iata_code"];
		$airport_list->airport_name= $_POST['airport_name'];
		$airport_list->airport_name_pt = $_POST['airport_name_pt'];
		$airport_list->airport_city_en = $_POST['airport_city_en'];
		$airport_list->airport_city_pt = $_POST['airport_city_pt'];
		$airport_list->airport_country_en = $_POST['airport_country_en'];
	}
?>
<?php
	if(isset($_GET["airport_iata_code"])){
		$_SESSION["airport_iata_faa_codes"]=$_GET["airport_iata_code"];
		$airport_list = new Airport_list();
		$airport_list->get_airport_list($_SESSION["airport_iata_faa_codes"]);
?>


<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição de aeroportos
            <small>Dados</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar aeroporto</li>
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
                        <h3 class="box-title">Editando aeroporto</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="airport_form" method="POST" role="form" class="half-form" action="airport_list_information.php?airport_iata_code=<?php echo $airport_list->airport_iata_code; ?>&page=edit">	
						
							<div class="form-group control-group">
								<label class="control-label" for="airport_iata_code">Código IATA/FAA  do Aeroporto</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_iata_code" name="airport_iata_code" placeholder="Código IATA/FAA  do Aeroporto" value="<?php echo $airport_list->airport_iata_code ?>" readonly />
								</div>
                            </div>					
                            <div class="form-group control-group">
								<label class="control-label" for="airport_name">Nome do Aeroporto</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_name" name="airport_name" placeholder="Nome do Aeroporto" value="<?php echo $airport_list->airport_name ?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_name_pt">Nome do Aeroporto em Português  (Texto que será exibido na conversão)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="airport_name_pt" name="airport_name_pt" placeholder="Nome do Aeroporto em Português  (Texto que será exibido na conversão)" value="<?php echo $airport_list->airport_name_pt ?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_city_en">Cidade do Aeroporto em Inglês/Língua Original</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airport_city_en" name="airport_city_en" placeholder="Cidade do Aeroporto em Inglês/Língua Original" value="<?php echo $airport_list->airport_city_en ?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_city_pt">Cidade do Aeroporto em Português/Língua Original</label>
								<div class="controls">
									<input type="text" class="form-control" id="airport_city_pt" name="airport_city_pt" placeholder="Cidade do Aeroporto em Português/Língua Original" value="<?php echo $airport_list->airport_city_pt?>"/>
								</div>
                            </div>	
							<div class="form-group control-group">
								<label class="control-label" for="airport_country_en">País em Inglês</label>
								<div class="controls">	
									<input type="text" class="form-control" id="airport_country_en" name="airport_country_en" onfocus="active_autocomplete({id: this.id, target_field: 'country_en', search_field: 'country_en', table: 'digitulus_country_list', validate: 'true'});" placeholder="País em Inglês" value="<?php echo $airport_list->airport_country_en?>"/>
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
<?php
}
?>
<script src="js/validate_airport.js"></script>