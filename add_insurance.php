<?php
	$settings = new Digitulus_settings();
	$settings->get_digitulus_settings(1);	
?>

<script type="text/javascript">
	function calcula_valor()
	{
		var us_canada_net_insurance_per_day = "<?php echo $settings->us_canada_net_insurance_per_day;?>";
		var world_net_insurance_per_day  = "<?php echo $settings->world_net_insurance_per_day;?>";
		var ireland_insurance_default  = "<?php echo $settings->ireland_insurance_default;?>";
		var oshc_per_month   = "<?php echo $settings->oshc_per_month;?>";
		var seguro = document.getElementById('insurance_duration').value;
		
		//calcula seguro do canada/eua e do resto do mundo e coloca como value do input
		document.getElementById('us_canada_extra_insurance_net_value').value = (seguro * 7 * us_canada_net_insurance_per_day).toFixed(2);
		document.getElementById('world_extra_insurance_net_value').value = (seguro * 7 * world_net_insurance_per_day).toFixed(2);
		//calcula seguro da Irlanda
		if(document.getElementById('insurance_duration').value >= 24) document.getElementById('ireland_insurance_value').value = parseFloat(ireland_insurance_default).toFixed(2);
		else document.getElementById('ireland_insurance_value').value = (0).toFixed(2);
		//calcula seguro da Australia
		if(document.getElementById('insurance_duration').value >= 13) document.getElementById('oshc_insurance_value').value = parseFloat(Math.ceil((seguro/4)) * oshc_per_month).toFixed(2);
		else document.getElementById('oshc_insurance_value').value = (0).toFixed(2);
		
	}
</script>
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adição de valores de seguro
            <small>Valores</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar valores de seguro</li>
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
                        <h3 class="box-title">Adicionando valores de seguro</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<form id="insurance_form" method="POST" role="form" class="half-form" action="insurance_information.php?page=add">
                            <!-- text input --> 
							<div class="form-group control-group">
								<label class="control-label" for="insurance_duration">Duração do seguro em semanas</label>
								<div class="controls">									 
									<input type="text" class="form-control" onchange="calcula_valor()" id="insurance_duration" name="insurance_duration" placeholder="Duração do seguro em semanas" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="us_canada_extra_insurance_net_value">Valor líquido do seguro extra para Estados Unidos e Canadá</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="us_canada_extra_insurance_net_value" name="us_canada_extra_insurance_net_value" placeholder="Valor líquido do seguro extra para Estados Unidos e Canadá" data-inputmask-alias="USD"readonly />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="world_extra_insurance_net_value">Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá)</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="world_extra_insurance_net_value" name="world_extra_insurance_net_value" placeholder="Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá)" data-inputmask-alias="USD" readonly />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="extra_insurance_gross_value">Valor bruto do seguro extra</label>
								<div class="controls">	
									<input type="text" class="form-control" id="extra_insurance_gross_value" name="extra_insurance_gross_value" placeholder="Valor bruto do seguro extra" data-inputmask-alias="USD" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="ireland_insurance_value">Valor do seguro obrigatório para a Irlanda</label>
								<div class="controls">
									<input type="text" class="form-control" id="ireland_insurance_value" name="ireland_insurance_value" placeholder="Valor do seguro obrigatório para a Irlanda" data-inputmask-alias="EUR" readonly />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="oshc_insurance_value">Valor do seguro OSHC (Austrália)</label>
								<div class="controls">
									<input type="text" class="form-control" id="oshc_insurance_value" name="oshc_insurance_value" placeholder="Valor do seguro OSHC (Austrália)" data-inputmask-alias="AUD" readonly />
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
         
     $(document).ready (function () {
		$("form#insurance_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
      
    });
    </script>