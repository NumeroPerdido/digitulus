<?php
	$settings = new Digitulus_settings();
	$settings->get_digitulus_settings(1);	
?>
<?php
	if(isset($_POST["insurance_duration"]))
	{
		$insurance= new Insurance();
		$insurance->insurance_duration = $_POST['insurance_duration'];
		$insurance->us_canada_extra_insurance_net_value = $_POST['us_canada_extra_insurance_net_value'];
		$insurance->world_extra_insurance_net_value = $_POST['world_extra_insurance_net_value'];
		$insurance->extra_insurance_gross_value = $_POST['extra_insurance_gross_value'];
		$insurance->ireland_insurance_value = $_POST['ireland_insurance_value'];
		$insurance->oshc_insurance_value= $_POST['oshc_insurance_value'];
	}
?>
<?php
	if(isset($_GET["insurance_duration"])){
		$_SESSION["insurance_durations"]=$_GET["insurance_duration"];
		$insurance=new Insurance();
		$insurance->get_insurance($_SESSION["insurance_durations"]);
?>


<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editação de valores de seguro
            <small>Valores</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar valores de seguro</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Seguro</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando valores de seguro</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="insurance_form" role="form" class="add_user" method="POST" action="insurance_information.php?insurance_duration=<?php echo $insurance->insurance_duration; ?>&page=edit">
						
                            <!-- text input --> 
                            <div class="form-group">
                                <label>Duração do seguro em semanas</label>
                                <input type="text" class="form-control" value="<?php echo $insurance->insurance_duration; ?>" id="insurance_duration" name="insurance_duration" placeholder="Duração do seguro em semanas" readonly />
							</div>
                            <div class="form-group">
                                <label class="control-label" for="us_canada_extra_insurance_net_value">Valor líquido do seguro extra para Estados Unidos e Canadá</label>
                                <input type="text" class="form-control" value="<?php echo $insurance->us_canada_extra_insurance_net_value; ?>" id="us_canada_extra_insurance_net_value" name="us_canada_extra_insurance_net_value" placeholder="Valor do Seguro Extra Líquido para Estados Unidos e Canadá" data-inputmask-alias="USD" readonly />
                            </div>
							<div class="form-group">
                                <label class="control-label" for="world_extra_insurance_net_value">Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá)</label>
								<input type="text" class="form-control" value="<?php echo $insurance->world_extra_insurance_net_value; ?>" id="world_extra_insurance_net_value" name="world_extra_insurance_net_value" placeholder="Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá)" data-inputmask-alias="USD" readonly />
                            </div>
							<div class="form-group">
                                <label class="control-label" for="extra_insurance_gross_value">Valor bruto do seguro extra</label>
								<input type="text" class="form-control" value="<?php echo $insurance->extra_insurance_gross_value; ?>" id="extra_insurance_gross_value" name="extra_insurance_gross_value" placeholder="Valor bruto do seguro extra" data-inputmask-alias="USD" />
                            </div>
							<div class="form-group">
                                <label class="control-label" for="ireland_insurance_value">Valor do seguro obrigatório para a Irlanda</label>
								<input type="text" class="form-control" value="<?php echo $insurance->ireland_insurance_value; ?>" id="ireland_insurance_value" name="ireland_insurance_value" placeholder="Valor do seguro obrigatório para a Irlanda" data-inputmask-alias="EUR" />
                            </div>
							<div class="form-group">
                                <label class="control-label" for="oshc_insurance_value">Valor do seguro OSHC (Austrália)</label>
								<input type="text" class="form-control" value="<?php echo $insurance->oshc_insurance_value; ?>" id="oshc_insurance_value" name="oshc_insurance_value" placeholder="Valor do seguro OSHC (Austrália)" data-inputmask-alias="AUD" />
                            </div>
							<button class="btn btn-primary" type="submit">Enviar</button>
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
<script src="js/validate_insurance.js"></script>
        <script type="text/javascript">
         
     $(document).ready (function () {
		$("form#insurance_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
      
    });
    </script>