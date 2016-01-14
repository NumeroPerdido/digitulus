<?php
	if(isset($_POST["airline_iata_code"]))
	{
		$airline_list = new Airline_list();
		$airline_list->airline_iata_code = $_POST['airline_iata_code'];
		$airline_list->airline_name= $_POST['airline_name'];
		$airline_list->airline_country_en = $_POST['airline_country_en'];
	}
?>
<?php
	if(isset($_GET["airline_iata_code"])){
		$_SESSION["airline_iata_codes"]=$_GET["airline_iata_code"];
		$airline_list= new Airline_list();
		$airline_list->get_airline_list($_SESSION["airline_iata_codes"]);
?>


<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição de companhias aéreas
            <small>Dados</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar companhia aérea</li>
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
                        <h3 class="box-title">Editando companhia aérea</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="airline_form" method="POST" role="form" class="half-form" action="airline_list_information.php?airline_iata_code=<?php echo $airline_list->airline_iata_code; ?>&page=edit">	
						
							<div class="form-group control-group">
								<label class="control-label" for="airline_iata_code">Código IATA da Companhia Aérea</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airline_iata_code" name="airline_iata_code" placeholder="Código IATA da Companhia Aérea" value="<?php echo $airline_list->airline_iata_code; ?>" readonly />
								</div>
                            </div>					
                            <div class="form-group control-group">
								<label class="control-label" for="airline_name">Nome da Companhia Aérea</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="airline_name" name="airline_name" placeholder="Nome da Companhia Aérea" value="<?php echo $airline_list->airline_name; ?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airline_country_en">País em Inglês</label>
								<div class="controls">	
									<input type="text" class="form-control" id="airline_country_en" name="airline_country_en" placeholder="País em Inglês" value="<?php echo $airline_list->airline_country_en; ?>" onfocus="active_autocomplete({id: this.id, target_field: 'country_en', search_field: 'country_en', table: 'digitulus_country_list', validate: 'true'});"/>
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
    <script src="js/validate_airline.js"></script>