<?php
	if(isset($_POST["standard_travel_duration"]))
	{
		$duration->standard_travel_duration = $_POST["standard_travel_duration"];
		$duration->standard_travel_duration_name = $_POST['standard_travel_duration_name'];
		$duration->australia_weeks_of_vacation = $_POST['australia_weeks_of_vacation'];
		$duration->australia_travel_duration = $_POST['australia_travel_duration'];
		$duration->australia_travel_duration_name = $_POST['australia_travel_duration_name'];
		$duration->ireland_weeks_of_vacation = $_POST['ireland_weeks_of_vacation'];
		$duration->ireland_travel_duration = $_POST['ireland_travel_duration'];
		$duration->ireland_travel_duration_name = $_POST['ireland_travel_duration_name'];	
	}
?>
<?php
	if(isset($_GET["standard_travel_duration"])){
		$_SESSION["standard_travel_durations"]=$_GET["standard_travel_duration"];
		$duration=new Duration();
		$duration->get_standard_travel_duration($_SESSION["standard_travel_durations"]);
?>


<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição de duração de permanência no país e validade do seguro extra
            <small>Dados e Valores</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar Duração</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Duração</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando duração de permanência no país e validade do seguro extra</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="duration_form" method="POST" action="duration_information.php?standard_travel_duration=<?php echo $duration->standard_travel_duration; ?>&page=edit">
						<div class="form-group control-group">
								<label class="control-label" for="standard_travel_duration">Duração de Curso e Permanência Padrões em Semanas</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="standard_travel_duration" name="standard_travel_duration" placeholder="Duração de Curso e Permanência Padrões em Semanas" value="<?php echo $duration->standard_travel_duration ?>" readonly />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="standard_travel_duration_name">Duração de Curso e Permanência Padrões - Texto</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="standard_travel_duration_name" name="standard_travel_duration_name" placeholder="Duração de Curso e Permanência Padrões - Texto" value="<?php echo $duration->standard_travel_duration_name ?>" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="australia_weeks_of_vacation">Duração de Férias na Austrália em Semanas</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="australia_weeks_of_vacation" name="australia_weeks_of_vacation" placeholder="Duração de Férias na Austrália em Semanas" value="<?php echo $duration->australia_weeks_of_vacation ?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="australia_travel_duration">Duração de Permanência na Austrália em Semanas</label>
								<div class="controls">	
									<input type="text" class="form-control" id="australia_travel_duration" name="australia_travel_duration" placeholder="Duração de Permanência na Austrália em Semanas" value="<?php echo $duration->australia_travel_duration ?>" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="australia_travel_duration_name">Duração de Permanência na Austrália - Texto</label>
								<div class="controls">
									<input type="text" class="form-control" id="australia_travel_duration_name" name="australia_travel_duration_name" placeholder="Duração de Permanência na Austrália - Texto" value="<?php echo $duration->australia_travel_duration_name ?>" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="ireland_weeks_of_vacation">Duração de Férias na Irlanda em Semanas</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="ireland_weeks_of_vacation" name="ireland_weeks_of_vacation" placeholder="Duração de Férias na Irlanda em Semanas" value="<?php echo $duration->ireland_weeks_of_vacation ?>" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="ireland_travel_duration ">Duração de Permanência na Irlanda em Semanas</label>
								<div class="controls">
									<input type="text" class="form-control" id="ireland_travel_duration" name="ireland_travel_duration" placeholder="Duração de Permanência na Irlanda em Semanas" value="<?php echo $duration->ireland_travel_duration?>"/>
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="ireland_travel_duration_name">Duração de Permanência na Irlanda - Texto</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="ireland_travel_duration_name" name="ireland_travel_duration_name" placeholder="Duração de Permanência na Irlanda - Texto" value="<?php echo $duration->ireland_travel_duration_name ?>"/>
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
<script src="js/validate_duration.js"></script>