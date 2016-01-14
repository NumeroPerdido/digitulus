<?php
    $db= new DB();
    $currency_list_row=$db->query("SELECT * FROM digitulus_country_list");
?>

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Adição de valores de câmbio
            <small>Dados e Valores</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Adicionar valores de câmbio</li>
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
                        <h3 class="box-title">Adicionando valores de câmbio</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="currency_form" method="POST" role="form" class="half-form" action="currency_information.php?page=add">	
                            <!-- text input --> 
                            <div class="form-group">
                                <label  class="control-label" for="currency_code">Código ISO da moeda - Utilize IAT para dólar IATA</label>
								<input type="text" class="form-control" id="currency_code" name="currency_code" data-inputmask="'mask': 'AAA'" onfocus="active_autocomplete({id: this.id, target_field: 'country_currency_code', search_field: 'country_currency_code', table: 'digitulus_country_list', validate: 'true'});" onblur= "load_currency_info()" onchange = "apply_mask();" placeholder="Código ISO da moeda"/>
                            </div>
							<div class="form-group">
                                <label class="control-label" for="exhibition_symbol">Símbolo da moeda</label>
								<input type="text" class="form-control" id="exhibition_symbol" name="exhibition_symbol" placeholder="Símbolo da moeda" onchange="teste()" readonly/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="currency_name">Nome da moeda</label>
                                <input type="text" class="form-control" id="currency_name" name="currency_name" placeholder="Nome da moeda" />
                            </div>
							<div class="form-group">
                                <label  class="control-label" for="currency_factor">Valor do fator aplicado pelo banco à moeda</label>
                                <input type="text" class="form-control" id="currency_factor" name="currency_factor" placeholder="Valor do fator aplicado pelo banco à moeda"  data-inputmask-alias="currency4"/>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="exchange_value">Valor da taxa de câmbio</label>
                                <input type="text" class="form-control" id="exchange_value" name="exchange_value" placeholder="Valor da taxa de câmbio"  data-inputmask-alias="BRL4"/>
                            </div>
							<div class="form-group">
                                <label  class="control-label" for="banking_fee_value">Valor da taxa administrativa (taxa de transferência internacional)</label>
								<input type="text" class="form-control" id="banking_fee_value" name="banking_fee_value" placeholder="Valor da taxa administrativa (taxa de transferência internacional)"  />
                            </div>
							<button class="btn btn-primary" type="submit">Salvar</button>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div><!-- /.tab-pane -->				
            </div><!-- /.tab-content -->
			
        </div><!-- nav-tabs-custom -->
    </section><!-- /.content -->
     <script type="text/javascript">
         
     $(document).ready (function () {
		$("form#currency_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
      
    });
	
         
        function load_currency_info(){
        var i,currency_symbol,
            currency_code,
            currency_list_row;
        //pega o valor que o usuário digitou
      currency_code=document.getElementById("currency_code").value;
          
        //resultado das querys do aeroporto e do country
        currency_list_row = <?php echo json_encode($currency_list_row); ?>;

        //pega o país em  português com base no país em inglês
        for(i=0;i<currency_list_row.length;i++){
            if(currency_code==currency_list_row[i]["country_currency_code"]){
                currency_symbol=currency_list_row[i]["country_exhibition_symbol"];
            }
        }
        //joga os resultados nos campos
        document.getElementById("exhibition_symbol").value=currency_symbol;
       
    }  
        function apply_mask()
        {
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
         
         
         }

    </script>
