<?php
include_once "currency.class.php";



	if(isset($_POST["currency_code"]))
	{
		$currency= new Currency();
		$currency->exhibition_symbol = $_POST['exhibition_symbol'];
		$currency->currency_code = $_POST['currency_code'];
		$currency->currency_name = $_POST['currency_name'];
		$currency->currency_factor = $_POST['currency_factor'];
		$currency->exchange_value = $_POST['exchange_value'];
		$currency->banking_fee_value = $_POST['banking_fee_value'];	
	}
?>
<?php
	if(isset($_GET["currency_code"])){
		$_SESSION["currency_codes"]=$_GET["currency_code"];
		$currency=new Currency();
		$currency->get_currency($_SESSION["currency_codes"]);
?>
<?php
    $db= new DB();
    $currency_list_row=$db->query("SELECT * FROM digitulus_country_list");
?>

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição de valores de câmbio
            <small>Dados e Valores</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar valores de câmbio</li>
        </ol>
    </section>
    <!-- Main content -->  
                          
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Câmbio</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando valores de câmbio</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
					<form id="currency_form" role="form" class="half-form" method="post" action="currency_information.php?currency_code=<?php echo $currency->currency_code; ?>&page=edit">						
                            <!-- text input --> 
                            <div class="form-group">
                                <label>Código ISO da moeda</label>
                                <input type="text" class="form-control" value="<?php echo $currency->currency_code; ?>" id="currency_code" name="currency_code" data-inputmask="'mask': 'AAA'" placeholder="Código ISO da moeda" readonly />
							</div>
							<div class="form-group">
                                <label>Símbolo da moeda</label>
								<input type="text" class="form-control" value="<?php echo $currency->exhibition_symbol; ?>" id="exhibition_symbol" name="exhibition_symbol" placeholder="Símbolo da moeda" readonly />
                            </div>
							<div class="form-group">
                                <label>Nome da moeda</label>
                                <input type="text" class="form-control" value="<?php echo $currency->currency_name; ?>" id="currency_name" name="currency_name" placeholder="Nome da moeda" readonly />
                            </div>
							<div class="form-group control-group">
                                <label class="control-label" for="exchange_value">Valor da taxa de câmbio</label>
								<input type="text" class="form-control" value="<?php echo $currency->exchange_value; ?>" id="exchange_value" name="exchange_value" placeholder="Valor da taxa de câmbio"  data-inputmask-alias="BRL4" />
                            </div>
							<div class="form-group">
                                <label  class="control-label" for="currency_factor">Valor do fator aplicado pelo banco à moeda</label>
                                <input type="text" class="form-control" id="currency_factor" name="currency_factor" placeholder="Valor do fator aplicado pelo banco à moeda"  data-inputmask-alias="currency4"/>
                            </div>
							<div class="form-group control-group">
                                <label class="control-label" for="banking_fee_value">Valor da taxa administrativa (taxa de transferência internacional)</label>
								<input type="text" class="form-control" value="<?php echo $currency->banking_fee_value; ?>" id="banking_fee_value" name="banking_fee_value" placeholder="Valor da taxa administrativa (taxa de transferência internacional)" onfocus="correct_exhibition(this.id, 2)" />
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
    <script src="js/validate_currency.js"></script>
         <script type="text/javascript">
     $(document).ready (function () {
       
            var i,currency_symbol;
            var currency_list_row;
            var alias;    
            var currency_code = $("#currency_code").val();
            
            currency_list_row = <?php echo json_encode($currency_list_row); ?>;
             if (currency_code != null)
             {
                for(i=0;i<currency_list_row.length;i++)
                {
                     
                    if(currency_code==currency_list_row[i]["country_currency_code"])
                    {
                        alias=currency_list_row[i]["default_budget_currency_code"];
                        currency_symbol=currency_list_row[i]["country_exhibition_symbol"];
                    }
                }
                $("#banking_fee_value").inputmask({
                prefix: currency_symbol + " ",
                groupSeparator: "",
                alias: "numeric",
                placeholder: "0",
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                clearMaskOnLostFocus: false,
                removeMaskOnSubmit: true,
            });
             }
         
         $("form#currency_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
         
        
     });
    </script>
