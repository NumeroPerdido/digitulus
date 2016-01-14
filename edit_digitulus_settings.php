<?php
    $digitulus_settings = new Digitulus_settings(); 
	$digitulus_settings->get_digitulus_settings(1);	
?>

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição das configurações
            <small>Valores padrões</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar as configurações</li>
        </ol>
    </section>
     <?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]=="add"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Adicionado com Sucesso.
                                    </div>";
                        }
                        if($_GET["success"]=="edit"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Atualizado com Sucesso.
                                    </div>";
                        }
                         if($_GET["success"]=="delete"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Deletado com Sucesso.
                                    </div>";
                        }
                    }
                ?>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Configurações</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando as configurações</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="digitulus_settings_form" method="POST" action="digitulus_settings_information.php?digitulus_settings_id=1" >
						<div class="form-group control-group">
							<label class="control-label" for="wire_fee_value">Valor líquido da taxa de transferência bancária (US$)</label>
							<div class="controls">									 
								<input type="text" class="form-control" id="wire_fee_value" name="wire_fee_value" placeholder="Valor líquido da taxa de transferência bancária (US$)" value="<?php echo $digitulus_settings->wire_fee_value ?>" data-inputmask-alias="USD" />
							</div>
                        </div>
							<div class="form-group control-group">
								<label class="control-label" for="iof_rate">Valor do IOF (%)</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="iof_rate" name="iof_rate" placeholder="Valor do IOF (%)" value="<?php echo $digitulus_settings->iof_rate ?>" data-inputmask-alias="percentage" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="phi">Valor do lucro padrão Phi (R$)</label>
								<div class="controls">	
									<input type="text" class="form-control" id="phi" name="phi" placeholder="Valor do lucro padrão Phi (R$)" value="<?php echo $digitulus_settings->phi ?>" data-inputmask-alias="BRL" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="exchange_margin">Valor da margem de aumento do câmbio (%)</label>
								<div class="controls">	
									<input type="text" class="form-control" id="exchange_margin" name="exchange_margin" placeholder="Valor da Margem de Aumento do Câmbio (%)" value="<?php echo $digitulus_settings->exchange_margin ?>" data-inputmask-alias="percentage" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="internet_transfer_fee">Taxa de intermediação de serviços por compra via internet (%)</label>
								<div class="controls">
									<input type="text" class="form-control" id="internet_transfer_fee" name="internet_transfer_fee" placeholder="Taxa de intermediação de serviços por compra via internet (%)" value="<?php echo $digitulus_settings->internet_transfer_fee ?>" data-inputmask-alias="percentage" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="us_canada_net_insurance_per_day">Valor líquido do seguro extra para Estados Unidos e Canadá por dia (US$)</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="us_canada_net_insurance_per_day" name="us_canada_net_insurance_per_day" placeholder="Valor líquido do seguro extra para Estados Unidos e Canadá por dia (US$)" value="<?php echo $digitulus_settings->us_canada_net_insurance_per_day ?>" data-inputmask-alias="USD" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="world_net_insurance_per_day">Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá) por dia (US$)</label>
								<div class="controls">
									<input type="text" class="form-control" id="world_net_insurance_per_day" name="world_net_insurance_per_day" placeholder="Valor líquido do seguro extra para o resto do mundo (exceto Estados Unidos e Canadá) por dia (US$)" value="<?php echo $digitulus_settings->world_net_insurance_per_day?>" data-inputmask-alias="USD" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="ireland_insurance_default">Valor padrão do seguro anual para a Irlanda (€)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="ireland_insurance_default" name="ireland_insurance_default" placeholder="Valor padrão do seguro anual para a Irlanda (€)" value="<?php echo $digitulus_settings->ireland_insurance_default ?>" data-inputmask-alias="EUR" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="oshc_per_month">Valor padrão do seguro OSHC (Austrália) por mês (AU$)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="oshc_per_month" name="oshc_per_month" placeholder="Valor padrão do seguro OSHC (Austrália) por mês (AU$)" value="<?php echo $digitulus_settings->oshc_per_month ?>" data-inputmask-alias="AUD" />
								</div>
                            </div>			
							<div class="form-group control-group">
								<label class="control-label" for="new_up_to">Valor em dias por quanto tempo o produto será considerado novo</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="new_up_to" name="new_up_to" placeholder="Valor em dias por quanto tempo o produto será considerado novo" value="<?php echo $digitulus_settings->new_up_to ?>" />
								</div>
                            </div>		
							<div class="form-group control-group">
								<label class="control-label" for="issuance_fee">Valor padrão da taxa de emissão (US$)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="issuance_fee" name="issuance_fee" placeholder="Valor padrão da taxa de emissão (US$)" value="<?php echo $digitulus_settings->issuance_fee ?>" data-inputmask-alias="USD" />
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
	<script>
     $(document).ready (function () {
		$("form#digitulus_settings_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
      
    });
	</script>