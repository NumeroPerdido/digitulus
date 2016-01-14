<script type="text/javascript">

function create_flight_text()
	{
		var arrival_at = document.getElementById('arrival_at').value;
		var departure_from = document.getElementById('departure_from').value;
		var flight_dates = document.getElementById('flight_dates').value;
		var air_company = document.getElementById('air_company').value;

		document.getElementById('flight_text').value = "Voo pela companhia " + air_company + " válido unicamente para embarques realizados no dia" + flight_dates + ", saindo de " + departure_from + " e chegando em " + arrival_at;
	}
function create_flight_gross()
	{
		//flight_gross = flight_fare + airport_fee
		var flight_fare=Number($("#flight_fare").inputmask('unmaskedvalue'));		
		var airport_fee=Number($("#airport_fee").inputmask('unmaskedvalue'));
		
		document.getElementById('flight_gross').value = flight_fare + airport_fee;
	}
function create_total_flight_commission()
	{
		//total_flight_commission = flight_commission + flight_incentive
		var flight_commission=Number($("#flight_commission").inputmask('unmaskedvalue'));
		var flight_incentive=Number($("#flight_incentive").inputmask('unmaskedvalue'));

		document.getElementById('total_flight_commission').value = flight_incentive + flight_commission;
	}
function create_flight_net()
	{
		//flight_net = flight_fare * (1.0 - (flight_commission + flight_incentive)/100) + airport_fee
		var flight_fare=Number($("#flight_fare").inputmask('unmaskedvalue'));		
		var airport_fee=Number($("#airport_fee").inputmask('unmaskedvalue'));
		var flight_commission=Number($("#flight_commission").inputmask('unmaskedvalue'));
		var flight_incentive=Number($("#flight_incentive").inputmask('unmaskedvalue'));
		
		document.getElementById('flight_net').value = flight_fare * (1.0 - (flight_commission + flight_incentive)/100) + airport_fee;
	}
</script>

<?php
	if(isset($_GET["iata_arrival_at"])){
		$_SESSION["iata_arrival_ats"]=$_GET["iata_arrival_at"];
		$flight=new Flight();
		$flight->get_flight($_SESSION["iata_arrival_ats"]);
	}
?>

<?php
    $db= new DB();
    $airport_list_row=$db->query("SELECT airport_iata_code,airport_country_en,airport_city_pt FROM digitulus_airport_list");
    $country_list_row=$db->query("SELECT country_pt,country_en FROM digitulus_country_list");
?>

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edição de detalhes aéreos
            <small>Valores e Condições</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Editar detalhes aéreos</li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Voo</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Editando detalhes aéreos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="flight_form" method="POST" action="flight_information.php?iata_arrival_at=<?php echo $flight->iata_arrival_at; ?>&page=edit&iata_arrival_ats=<?php echo $_SESSION["iata_arrival_ats"] ?>">
							<div class="form-group control-group">
								<label class="control-label" for="iata_arrival_at">Código IATA do aeroporto de chegada</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="iata_arrival_at" data-inputmask="'mask': '(AAA)|(AA9)|(A9A)|(9AA)|(A99)|(9A9)|(99A)|(999)'" onfocus="active_autocomplete({id: this.id, target_field: 'airport_iata_code', search_field: 'airport_iata_code', table: 'digitulus_airport_list', validate: 'true'});" name="iata_arrival_at" placeholder="Código IATA do aeroporto de chegada"  value = "<?php echo $flight->iata_arrival_at; ?>" onblur="load_airport_info();		create_flight_text();" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="arrival_at">Cidade de desembarque</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="arrival_at" name="arrival_at" placeholder="Cidade de desembarque" onfocus="this.form.departure_from.focus()" value = "<?php echo $flight->arrival_at; ?>" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="country">País de destino</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="country" name="country" placeholder="País de destino" onfocus="this.form.departure_from.focus()" value = "<?php echo $flight->country; ?>" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="departure_from">Cidades de embarque</label>
								<div class="controls">	
									<input type="text" class="form-control" id="departure_from" name="departure_from" placeholder="Cidades de embarque" onfocus="active_autocomplete({id: this.id, target_field: 'departure_from', search_field: 'departure_from', table: 'digitulus_flight'});"  value = "<?php echo $flight->departure_from; ?>" onchange="create_flight_text()" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_fare">Tarifa aérea (US$)</label>
								<div class="controls">
									<input type="text" class="form-control" id="flight_fare" name="flight_fare" placeholder="Tarifa aérea (US$)" value = "<?php echo $flight->flight_fare; ?>" onchange="create_flight_gross(); create_flight_net()" data-inputmask-alias="USD" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="airport_fee">Taxa de embarque (US$)</label>
								<div class="controls">
									<input type="text" class="form-control" id="airport_fee" name="airport_fee" placeholder="Taxa de embarque (US$)" value = "<?php echo $flight->airport_fee; ?>" onchange="create_flight_gross(); create_flight_net()" data-inputmask-alias="USD" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_gross">Total bruto da parte aérea (US$)</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="flight_gross" name="flight_gross" placeholder="Total bruto da parte aérea (US$)" data-inputmask-alias="USD" value = "<?php echo $flight->flight_gross; ?>" onfocus="this.form.flight_commission.focus()" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_commission">Comissão (%)</label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="flight_commission" name="flight_commission" placeholder="Comissão (%)" value = "<?php echo $flight->flight_commission; ?>" onchange="create_total_flight_commission(); create_flight_net()" data-inputmask-alias="percentage" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_incentive">Incentivo (%)</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="flight_incentive" name="flight_incentive" placeholder="Incentivo (%)" value = "<?php echo $flight->flight_incentive; ?>" onchange="create_total_flight_commission(); create_flight_net()" data-inputmask-alias="percentage" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="total_flight_commission">Total da comissão = Comissão + Incentivo (%)</label>
								<div class="controls">	
									<input type="text" class="form-control" id="total_flight_commission" name="total_flight_commission" placeholder="Total da comissão = Comissão + Incentivo (%)" data-inputmask-alias="percentage" value = "<?php echo $flight->total_flight_commission; ?>" onfocus="this.form.flight_dates.focus()" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_dates">Datas de validade da parte aérea</label>
								<div class="controls">
									<input type="text" class="form-control" id="flight_dates" name="flight_dates" placeholder="Datas de validade da parte aérea" value = "<?php echo $flight->flight_dates; ?>" onchange="create_flight_text()" onfocus="active_autocomplete({id: this.id, target_field: 'flight_dates', search_field: 'flight_dates', table: 'digitulus_flight'});" required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label>Companhia aérea</label>
									<input type="text" class="form-control" id="air_company" name="air_company" placeholder="Companhia aérea" value = "<?php echo $flight->air_company; ?>"  onchange="create_flight_text()" onfocus="active_autocomplete({id: this.id, target_field: 'airline_name', search_field: 'airline_name', table: 'digitulus_airline_list', validate: 'true'});" required />
                            </div>	
							<div class="form-group control-group">
								<label class="control-label" for="flight_net">Total líquido da parte aérea (US$)</label>
								<div class="controls">
									<input type="text" class="form-control" id="flight_net" name="flight_net" placeholder="Total líquido da parte aérea (US$)" data-inputmask-alias="USD" value = "<?php echo $flight->flight_net; ?>" onfocus="this.form.submit_form.focus()" readonly required />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="flight_text">Texto das condições da parte aérea</label>
								<div class="controls">
									<input type="text" class="form-control" id="flight_text" name="flight_text" placeholder="Texto das condições da parte aérea" value = "<?php echo $flight->flight_text; ?>" onfocus="this.form.submit_form.focus()" readonly required />
								</div>
                            </div>							
							<div class="form-group control-group">
								<div class="controls">
									<button class="btn btn-primary" id="submit_form" type="submit">Salvar</button>
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
		$("form#flight_form :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});
   
    //função que carrega as informações do aeroporto(cidade e país)
    function load_airport_info(){
        var i,country_en,country_pt,city_pt,
            iata_arrival_at,
            airport_list_row,
            country_list_row;
        //pega o valor que o usuário digitou
        iata_arrival_at=document.getElementById("iata_arrival_at").value;
        //resultado das querys do aeroporto e do country
        airport_list_row = <?php echo json_encode($airport_list_row); ?>;
        country_list_row = <?php echo json_encode($country_list_row); ?>;
        //percorre os resultados da query para paegar o país em ingles e a cidade em português a partir do código iata
        for(i=0;i<airport_list_row.length;i++){
            if(iata_arrival_at==airport_list_row[i]["airport_iata_code"]){
                country_en=airport_list_row[i]["airport_country_en"];
                city_pt=airport_list_row[i]["airport_city_pt"];
            }
        }
        //pega o país em  português com base no país em inglês
        for(i=0;i<country_list_row.length;i++){
            if(country_en==country_list_row[i]["country_en"]){
                country_pt=country_list_row[i]["country_pt"];
            }
        }
        //joga os resultados nos campos
        document.getElementById("arrival_at").value=city_pt;
        document.getElementById("country").value=country_pt;
    }	

</script>
   