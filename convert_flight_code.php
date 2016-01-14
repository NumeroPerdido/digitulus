<?php 
	include_once "cambio.php";
	$cambio = new Cambio();
	include_once "db.class.php";
    $db = new DB();
    $sql = $db->row("Select issuance_fee FROM digitulus_settings");
	$issuance_fee = $sql['issuance_fee'];
    
?>
<script type="text/javascript">
	$(document).ready (function () {
		$("form#convert_flight_code :input").each(function(){
			var alias = $(this).attr("data-inputmask-alias");
			var id_input =  $(this).attr("id");
			$("#"+id_input).inputmask({ alias: alias});
		});
	});
	function doPost_flight(formName, actionName)
	{
		var valor = document.getElementById('flight_code').value;
	
		if (valor == "")
		{
			alert("O valor digitado no campo Converter Código é inválido");
			var hiddenControl = document.getElementById('botoes');
			var theForm = document.getElementById(formName);
	
			hiddenControl.value = "exit"
			theForm.submit();
		}		
		else
		{
            
	
			var hiddenControl = document.getElementById('botoes');
			var theForm = document.getElementById(formName);
	
			hiddenControl.value = actionName;
			theForm.submit();
		}	
	}
	function doPost_tax(formName, actionName)
	{
		var valor = document.getElementById('convert_taxa').value;
		if (valor == "")
		{
			alert("O valor digitado no campo converter taxa é inválido");
			var hiddenControl = document.getElementById('botoes');
			var theForm = document.getElementById(formName);
	
			hiddenControl.value = "exit";
			theForm.submit();
		
		}		
		else
		{
			var valor2 = document.getElementById('camb').value
			if (valor2 == "")
			{
				alert("O valor digitado no campo cambio  é inválido");
				var hiddenControl = document.getElementById('botoes');
				var theForm = document.getElementById(formName);
	
				hiddenControl.value = "exit";
				theForm.submit();
			}	
			else
			{
				var hiddenControl = document.getElementById('botoes');
				var theForm = document.getElementById(formName);
	
				hiddenControl.value = actionName;
				theForm.submit();
			}
	
		}
	}
	
</script>
<?php
	
	
	
	
?>
<aside class="right-side" >     
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Conversão de códigos da reserva/emissão
			<small>Rota e Orçamento</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Converter códigos da reserva/emissão</li>
        </ol>
    </section>
	<section class="content">
                <div class="nav-tabs-custom">    
            
            <ul class="nav nav-tabs">
             <!-- header da tab original-->
                <li class="active"><a href="#tab_1" data-toggle="tab">Códigos</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

					<div class="box-header">
                        <h3 class="box-title">Convertendo códigos da reserva/emissão</h3>
                    </div><!-- /.box-header -->
					<div class="box-body">
						<form id="convert_flight_code" name = "convert_flight_code" method="POST" role="form" class="half-form" action="">
						<div class="form-group control-group">
							<label class="control-label" for="iata_arrival_at">Converter Código da Rota da Reserva/Emissão</label>
						
							<div class="controls">									 			
								<textarea name="convert_flight_code" id="flight_code" rows="10" cols="82"><?php  if (isset($_POST ['convert_flight_code'])){echo $_POST ['convert_flight_code'];}else{ echo "";}?> </textarea>
							</div>
								
							<br>
                            <div class="controls">
                            <INPUT TYPE="checkbox" id ="airport" NAME="airport" VALUE="airport" checked> Mostrar Aeroporto</INPUT>
                            </div>
                            <div class="controls">
                            <INPUT TYPE="RADIO" NAME="state" VALUE="state" checked> Mostrar Estado/Província/Departamento/Região/Governorato/Distrito/Ilha/Prefeitura, ... de Antígua e Barbuda, Ilhas Virgens Britânicas, Canadá, Estados Unidos, Austrália</INPUT>
                            <br>
                            
                            <INPUT TYPE="RADIO" NAME="state" VALUE="state_full">Mostrar Estado/Província/Departamento/Região/Governorato/Distrito/Ilha/Prefeitura, ... de todos os países cadastrados</INPUT>
                            </div>
                            <div class="controls">
                            <INPUT TYPE="checkbox" NAME="country" VALUE="country"> Mostrar Paises</INPUT>
                            </div>
                            <br>
							<div class="controls">
								<button class="btn btn-primary" type="submit" onclick="javascript:doPost_flight('convert_flight_code', 'convert_flight_code');">Converter Código da Rota</button>
							</div>
						</div>
						<div class="form-group control-group">
							<div class="controls">									 			
								<input type="hidden" id="botoes" name="botoes"  value ="exit"/>
							</div>
							<br>
							<label class="control-label" for="iata_arrival_at">Converter Código do Orçamento da Reserva/Emissão</label>
							<div class="controls">	
								<input type="text" name="convert_tax" id="convert_taxa" value="<?php if (isset($_POST ['convert_tax'])){echo $_POST ['convert_tax'];}else{ echo "";}?>" size=85 />
							</div>
							<label class="control-label" for="iata_arrival_at">Taxa de Emissão</label>
							<div class="controls">	
								<input type="text" name="tx_emis" id="tx_emis" size=85 value="<?php  if (isset($_POST ['tx_emis'])){echo $_POST ['tx_emis'];}else{ echo $issuance_fee;}?>" data-inputmask-alias="USD" />
							</div>
							<label class="control-label" for="iata_arrival_at">Câmbio do Dólar IATA</label>
							<div class="controls">	
								<input type="text" name="cambio" id= "camb" value=<?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1,"Dólar Iata");?> size=85 data-inputmask-alias="BRL4"  />
							</div>
							<br>
							<div class="controls">
								<button class="btn btn-primary" type="submit" onclick="javascript:doPost_tax('convert_flight_code', 'convert_tax');">Converter Código do Orçamento</button>
							</div>
						</div>
					</form>	
				</div>	
				
			</div>
		</div>
		
<?php
error_reporting(0);
function retorna_indice($mes)
	{
		$indice = 0;
		switch ($mes)
		{
			
			Case 'JAN':
				
				$indice = '01';
			break;
			Case 'FEB':
				
				$indice = '02';
			break;
			Case 'MAR':
				
				$indice = '03';
			break;
			Case "APR":
				
				$indice = '04';
			break;
			Case 'MAY':
				
				$indice = '05';
			break;
			Case 'JUN':
				
				$indice = '06';
			break;
			Case 'JUL':
				
				$indice = '07';
			break;
			Case 'AUG':
				
				$indice = '08';
			break;
			Case 'SEP':
				
				$indice = '09';
			break;
			Case 'OCT':
				
				$indice = '10';
			break;
			Case 'NOV':
				
				$indice = '11';
			break;
			Case 'DEC':
				
				$indice = '12';
			break;
			default:
				$indice = 0;
			
			break;
			
			
		}
		
		return  $indice;
	
		
	}	
	
	
function retorna_mes($mes)
	{
		$indice = 0;
		//verifica a variável mês 
		switch (trim($mes))
		{
			Case 'JAN':
				$mes_volta = 'JAN';
				$indice = 01;
			break;
			Case 'FEB':
				$mes_volta = 'FEV';
				$indice = 02;
			break;
			Case 'MAR':
				$mes_volta = 'MAR';
				$indice = 03;
			break;
			Case "APR":
				$mes_volta = "ABR";
				$indice = 04;
			break;
			Case 'MAY':
				$mes_volta = "MAI";
				$indice = 05;
			break;
			Case 'JUN':
				$mes_volta = "JUN";
				$indice = 06;
			break;
			Case 'JUL':
				$mes_volta = "JUL";
				$indice = 07;
			break;
			Case 'AUG':
				$mes_volta = "AGO";
				$indice = 08;
			break;
			Case 'SEP':
				$mes_volta = "SET";
				$indice = 09;
			break;
			Case 'OCT':
				$mes_volta = "OUT";
				$indice = 10;
			break;
			Case 'NOV':
				$mes_volta = "NOV";
				$indice = 11;
			break;
			Case 'DEC':
				$mes_volta = "DEZ";
				$indice = 12;
			break;
			default:
				$mes_volta = "Mês Inválido";
			break;
			
			
		}
		
		return  $mes_volta;
	
		
	}		
function diasemana($data) 
{
	
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana)
	{
		case"0": 
			$diasemana = "Domingo";       
		break;
		case"1": 
			$diasemana = "Segunda-feira"; 
		break;
		case"2": 
			$diasemana = "Terça-feira";   
		break;
		case"3": 
			$diasemana = "Quarta-feira"; 
		break;
		case"4": 
			$diasemana = "Quinta-feira";  
		break;
		case"5": 
			$diasemana = "Sexta-feira"; 
		break;
		case"6": 
			$diasemana = "Sábado";       
		break;
		default:
			$diasemana= "Data inválida";
			break;
	}

	return $diasemana;
}
function gerar_tabela($aux)
{
    $db = new DB();
	$i = 0;
	if (sizeof($aux)<=1)
	{
		//sai da função caso não seja valor válido
		return 0;
	}
	
	//encontrando primeiro registro com valor
	
	
	//verifica se é a segunda linha da string, caso esta não ocupe apenas uma linha
	if (substr($aux[$i],0,1)== "/")
	{
		return 0;
	}
	//verifica novamente se existe espaço
	
	//recebe trecho
	$trecho = trim($aux[$i]);
	if (is_numeric($trecho) ==false)
	{
		return 0;
	}
	//recebendo dados da companhia aérea
	$i++;
	if ($aux[$i] == "TPOPENL")
	{
		$cia = substr($aux[$i],0,2);
		$voo = "Aberto";
		$dataf = "-";
		$dia_semana_ida = "-";
		$data_ida ="-";
		$horario_ida = "-";
		$horario_volta= "-";
		$dia_semana_volta = "-";
		$data_volta = "-";
		$i++;
		$cia_ida= substr($aux[$i],0,3);
		$cia_volta= substr($aux[$i],3,3);
		
	}	
	else
	{	//verifica se tem somente companhia aérea
		if ( strlen($aux[$i])==2)
		{
			
				$cia = $aux[$i];
				$i++;
				
					
				//incrementa até encontrar o voo
				
				
				
				
				
				//retorna o voo
				$voo = substr(trim($aux[$i]),0,sizeof($aux[$i])-2);
				$i++;
				
					
				$dia_ida =substr($aux[$i],0,2);
				$mes_ida = substr($aux[$i],2,3);
				//aqui encontrou o campo que não usamos
				$i++;
				
				$i++;
					//agora recebemos a companhia
				
				$cia_ida=substr($aux[$i],0,3);
				$cia_volta= substr($aux[$i],3,3);
				
				//verificação e incrementos para encontrar a hora
				
					
				
				$i = $i+2;

				$hora_ida = $aux[$i];
				$i++;
				$hora_volta = $aux[$i];	
				$i++;
				
				
				
				//operações para receber dia de volta
				if ((retorna_mes(substr($aux[$i],2,3))) == "Mês Inválido")
				{
					$cont = 0;
					if (substr($aux[$i],0,1)== "/")
					{
						$dia_volta = $dia_ida;
						$mes_volta = $mes_ida;
					}
					
					else
					{	
						while (retorna_mes(substr($aux[$i],2,3)) == "Mês Inválido")
						{
						
							if ($cont == 3)
							{
								break;
							}
							$i++;
							$cont++;
						}
						if ($cont == 3)
						{
							$dia_volta = $dia_ida;
							$mes_volta = $mes_ida;
						
						}
						else
						{
						
							$dia_volta = ltrim(substr($aux[$i],0,2));
							$mes_volta = ltrim(substr($aux[$i],2,3));
						}	
					}
				}
			
			else
				{
						
						$dia_volta = ltrim(substr($aux[$i],0,2));
						$mes_volta = ltrim(substr($aux[$i],2,3));
						
				}
			
			
				
		
		}
		//caso esteja junto
		
		elseif (strlen($aux[$i])== 7 )
		{
			
			//recebendo a companhia aérea
			
			$cia = substr($aux[$i],0,2);
			
			$voo = substr($aux[$i],2,sizeof($aux[$i])-2);
			// percorrendo até encontrar a posição adequada
			$i++;
			
			$dia_ida =substr($aux[$i],0,2);
			$mes_ida = substr($aux[$i],2,3);
			$i++;
			//aqui encontrou o campo que não usamos
			$i++;
			
			//agora recebemos a companhia aérea
			
			$cia_ida=substr($aux[$i],0,3);
			$cia_volta= substr($aux[$i],3,3);
			
			
			
				$i = $i+2;
			
				
				
				
			
			
			$hora_ida = $aux[$i];
			$i++;
			
			$hora_volta = $aux[$i];	
			$i++;
		
			if ((retorna_mes(substr($aux[$i],2,3))) == "Mês Inválido")
			{
				
				$cont = 0;
				if (substr($aux[$i],0,1)=="/")
				{
					$dia_volta = $dia_ida;
					$mes_volta = $mes_ida;
				}
				else
				{
					while (retorna_mes(substr($aux[$i],2,3)) == "Mês Inválido")
					{
						if (substr($aux[$i],0,1)=="/")
						{
							$dia_volta = $dia_ida;
							$mes_volta = $mes_ida;
						}
						if ($cont == 3)
						{
							break;
						}
						$i++;
						$cont++;
					}
					if ($cont == 3)
					{
						$dia_volta = $dia_ida;
						$mes_volta = $mes_ida;
					
					}
					else
					{
					
						$dia_volta = ltrim(substr($aux[$i],0,2));
						$mes_volta = ltrim(substr($aux[$i],2,3));
					}	
				}
			}
			else
			{
					
					$dia_volta = ltrim(substr($aux[$i],0,2));
					$mes_volta = ltrim(substr($aux[$i],2,3));
					
			}
				
			
			
		}
		else
		{
			return 0;
		}
		if (retorna_indice($mes_ida)< date("m"))
		{
			$ano_ida = date("Y") + 1;
		}
		else
		{
			$ano_ida =  date("Y");
		}
		$data_ida =  $ano_ida ."-". retorna_indice($mes_ida)."-". $dia_ida;
			
		$ano_volta=$ano_ida;
			
		if (retorna_indice($mes_volta)< retorna_indice($mes_ida))
		{
			$ano_volta = $ano_ida++;
		}
			
		
		$dataf = $ano_volta ."-" .retorna_indice($mes_volta)."-". $dia_volta;
		$dia_semana_ida = diasemana($data_ida);
		$data_ida =$dia_ida . " ". retorna_mes($mes_ida) . " " . $ano_ida;
		$horario_ida = substr($hora_ida,0,2) . ":". substr($hora_ida,2,2);
		$horario_volta= substr($hora_volta,0,2) . ":". substr($hora_volta,2,2);
		$data_volta = $dia_volta . " ". retorna_mes($mes_volta) ." ". $ano_volta;
	
	}
	$cia_nome= "Favor cadastrar a companhia aérea de código IATA: " . $cia;
	$aero_ida_nome ="Favor cadastrar o aeroporto de código IATA: " . $cia_ida;
	$aero_volta_nome = "Favor cadastrar o aeroporto  de código IATA: " . $cia_volta;
	$city_ida = "";
	$city_volta = "";
	//conexao com o banco de dados
	 

	//recebendo o nome da companhia aérea, aeroporto, cidade
	
   
	$sql = $db->row("Select  airline_name FROM digitulus_airline_list where airline_iata_code = '". trim($cia) . "'");
	$cia_nome = $sql['airline_name'];
	$sql = $db->row("Select airport_name_pt FROM digitulus_airport_list where airport_iata_code  = '". $cia_ida . "'");		
	$aero_ida_nome = $sql['airport_name_pt'];
	$sql= $db->row("Select airport_city_pt FROM digitulus_airport_list where airport_iata_code = '". $cia_ida . "'");	
	$city_ida = $sql['airport_city_pt'];
	//retornando nome de aeroporto de volta e cidade do aeroporto de volta
	$sql = $db->row("Select airport_name_pt FROM digitulus_airport_list where airport_iata_code = '". $cia_volta . "'");
	$aero_volta_nome = $sql['airport_name_pt'];
	$sql =  $db->row("Select airport_city_pt FROM digitulus_airport_list where airport_iata_code = '". $cia_volta . "'");
	$city_volta = $sql['airport_city_pt'];
   
    $sql =  $db->row("Select airport_country_en FROM digitulus_airport_list where airport_iata_code = '". $cia_ida . "'");
	$country_en_ida = $sql['airport_country_en'];
    
     $sql =  $db->row("Select airport_country_en FROM digitulus_airport_list where airport_iata_code = '". $cia_volta . "'");
	$country_en_volta = $sql['airport_country_en'];
    
     $sql =  $db->row("Select country_pt FROM digitulus_country_list where country_en = '". $country_en_ida . "'");
	$country_pt_ida = $sql['country_pt'];
    
     $sql =  $db->row("Select country_pt FROM digitulus_country_list where country_en = '". $country_en_volta . "'");
	$country_pt_volta = $sql['country_pt'];
    
     $sql =  $db->row("Select geopolitical_division FROM digitulus_airport_list where airport_iata_code = '". $cia_ida . "'");
	$geopolitical_division_ida= $sql['geopolitical_division'];
    
     $sql =  $db->row("Select geopolitical_division FROM digitulus_airport_list where airport_iata_code = '". $cia_volta . "'");
	$geopolitical_division_volta = $sql['geopolitical_division'];
    
	//validação do nome
	if ($aero_ida_nome != $city_ida)
	{
		$aero_ida_nome = " (" . $aero_ida_nome . ")";
	}
	else
	{
		$city_ida = "";
	}
	if ($aero_volta_nome != $city_volta)
	{
		$aero_volta_nome = " (" . $aero_volta_nome . ")";
	}
	else
	{
		$city_volta = "";
	}
	if (empty($cia_nome) )
	{
		
		$cia_nome= "Favor cadastrar a companhia aérea de código IATA: " . $cia;
		$hoje = date("d-m-Y_H-i-s");
		$file =fopen('logs//digutulus.log', 'a+');
		rewind($file);
		
		
		fwrite($file, $cia_nome .  "\r\n");
		fclose($file);
		
 

	}
	if (empty($aero_volta_nome))
	{
		$aero_volta_nome = "Favor cadastrar o aeroporto  de código IATA: " . $cia_volta;
		$hoje = date("d-m-Y_H-i-s");
		$file =fopen('logs//digitulus.log', 'a+');
		rewind($file);
		$aero_volta_nome = $aero_volta_nome .  "\r\n" ;
		fwrite($file, $aero_volta_nome  );
		fclose($file);
	}
	if (empty($aero_ida_nome))
	{
		$aero_ida_nome = "Favor cadastrar o aeroporto  de código IATA: " . $cia_ida;
		$hoje = date("d-m-Y_H-i-s");
		$file =fopen('logs//digitulus.log', 'a+');
		rewind($file);
		$aero_ida_nome = $aero_ida_nome .  "\r\n";
		fwrite($file, $aero_ida_nome);
		fclose($file);
	}
    if ($data_volta == "-")
    {
        $dia_semana_volta = "-";
    }
    else
    {
        $dia_semana_volta = diasemana($dataf);   
    }
 
	?>
	<tr align = "center">
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $trecho;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cia_nome;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $voo;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $data_ida ;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $dia_semana_ida; ?></td>
<?php
    if(isset($_POST['airport']))
    {
    }
    else
    {
       $aero_ida_nome = "";
       $aero_volta_nome = ""; 
    }
   
    if(isset($_POST['state']) && $_POST['state'] == "state_full")
    {
        
        $geopolitical_division_ida = ", " . $geopolitical_division_ida;
        $geopolitical_division_volta = ", " . $geopolitical_division_volta;
    }
    else
    {
        if ($country_pt_ida == "Estados Unidos" || $country_pt_ida == "Canadá" || $country_pt_ida == "Austrália" || $country_pt_ida == "Ilhas Virgens Britânicas" || $country_pt_ida == "Antígua e Barbuda")
        {
            $geopolitical_division_ida = ", " . $geopolitical_division_ida;
            if ($country_pt_volta == "Estados Unidos" || $country_pt_volta == "Canadá" || $country_pt_volta == "Austrália" || $country_pt_volta == "Ilhas Virgens Britânicas" || $country_pt_volta == "Antígua e Barbuda")  
            {
                $geopolitical_division_volta = ", " . $geopolitical_division_volta;     
            }
            else
            { 
                $geopolitical_division_volta = "";
            }
        }
        else
        {
            $geopolitical_division_ida = "";
            if ($country_pt_volta == "Estados Unidos" || $country_pt_volta == "Canadá" || $country_pt_volta == "Austrália" || $country_pt_volta == "Ilhas Virgens Britânicas" || $country_pt_volta == "Antígua e Barbuda")  
            {
                $geopolitical_division_volta = ", " . $geopolitical_division_volta;     
            }
            else
            { 
                $geopolitical_division_volta = "";
            }
        }
        
    }
    if(isset($_POST['country']))
    {
       $country_pt_ida = ", ".$country_pt_ida;
       $country_pt_volta = ", ".$country_pt_volta; 
    }
    else
    {
       $country_pt_ida = "";
       $country_pt_volta = "";
    }
    
    if ($geopolitical_division_ida == ", ")
    {
        $geopolitical_division_ida = "";
    }
    if ($geopolitical_division_volta == ", ")
    {
        $geopolitical_division_volta = "";
    }
?>
         <td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo  $city_ida . $aero_ida_nome.  $geopolitical_division_ida. $country_pt_ida; ?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $city_volta . $aero_volta_nome .  $geopolitical_division_volta .$country_pt_volta; ?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $horario_ida;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $horario_volta?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $data_volta;?></td>
		<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $dia_semana_volta?></td>
	</tr>	
<?php
}
?>
<?php
function convert_flight_code()
	{
		?>
<table style="border-collapse: collapse; font-family: Verdana;
		font-size: 8pt;" border="1" width="100%" cellpadding="2"
		cellspacing="0">
  <tbody>
    <tr align="center" bgcolor="#cccccc">
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Trecho</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Companhia


          Aérea</b><b><br>
        </b> </td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Voo</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Data


          de Saída</b><b><br>
        </b> </td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Dia
          de Saída</b><b><br>
        </b> </td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>De</b><b><br>
        </b> </td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Para</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Hora


          de Saída</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Hora


          de Chegada</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Data


          Chegada</b></td>
      <td style="border: 1px solid #888888; border-spacing: 0px;"><b>Dia
          de Chegada</b></td>
    </tr>
	<?php
		
		//verifica se o campo possui algum valor
		if(isset($_POST['convert_flight_code']))
		{

			//atribui valor do campo na variavel
			$code_flight = $_POST["convert_flight_code"];
			//remoção do excesso de espaços e troca de asterisco por espaço
			$code_flight = str_replace("*", " ", $code_flight);
			$code_flight = str_replace("  ", " ", $code_flight);
			//separação da strings por linha	
			$aux2 = explode("\n",($code_flight));
			//varredura do vetor ate seu ultimo registro 
			for ($k=0; $k<sizeof($aux2); $k++)
			{
				$aux3 = $aux2[$k];
				//separação da string por espaços
				$aux3 = trim(preg_replace('/\s+/', ' ', $aux3));
				$aux4 = explode(" ", $aux3);
				$contador = $k;
				gerar_tabela($aux4);
			}

?>
	
	</tbody>
	</table>
	<br>
<?php	
		}
	}	
?>
<?php
function convert_tax()
{
			
		//verificação se existe valor atribuído
		if(isset($_POST['convert_tax']) and isset($_POST['cambio']) )
		{	
			//pegando valores dos campos
			$taxa = $_POST['convert_tax'];
			$cambio = $_POST['cambio'];
			$tx_emis = $_POST['tx_emis'];
			//separando a string por espaços
			$taxa = trim(preg_replace('/\s+/', ' ', $taxa));
			$converter = explode(" ",trim($taxa));
			//remoção de espaços
			if (substr($converter[2],0,3) == "BRL")
			{
				echo "Favor inserir o valor em dólares americanos";
			}
			else
			{	
				$i = 0;
		
				//pulando o primeiro registro
				$i++;
				//procurando o próximo valor 
				//pegando o primeiro índice da tabela
			
			
				$fare= "US$ " . substr($converter[$i],3) ;
			 
				$i++;
			 
			
				$tax = number_format(floatval(substr($converter[$i],0,strlen($converter[$i])-2)) + floatval($tx_emis),2,".",".");
				$tax = "US$ " . $tax; 
				
				
				$i++;
			 
			
				$total = number_format(floatval(substr($converter[$i],3,strlen($converter[$i])-4) + $tx_emis),2,".","");
				
				$cambio = str_replace(",",".",$cambio);
				$total_real = number_format(floatval((substr($converter[$i],3,strlen($converter[$i])-4) + $tx_emis) * $cambio),2,",",".");
				//conversão e cálculo do total em português
				$total = "US$ " . $total;
				
?>
	<table style="border-collapse: collapse; font-family: Verdana;
	font-size: 8pt;" border="1" width="100%" cellpadding="2"
	cellspacing="0">
	<tbody>
	<tr align="center" bgcolor="#cccccc">
	<td style="border: 1px solid #888888; border-spacing: 0px;"> Tarifa por pessoa</td>
	<td style="border: 1px solid #888888; border-spacing: 0px;"> Taxas por pessoa</td>
	<td style="border: 1px solid #888888; border-spacing: 0px;"> Total (Tarifa + Taxas) em US$ por pessoa</td>
	<td style="border: 1px solid #888888; border-spacing: 0px;"> Total (Tarifa + Taxas) em R$ por pessoa</td>
	</tr>	
	<tr align="center">
	<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo  $fare ;?></td>
	<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo  $tax ;?></td>
	<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo  $total ;?></td>
			<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo  "R$ " . $total_real ;}?></td>
	</tr>	
	</tbody>
	</table>
	<br>
	<br>
<?php
	}
	
}	

?>
<?php

	
	//error_reporting(0);	
	//pegando o valor armazenado no hidden para saber qual função será executada
	//$funcao = $_REQUEST['botoes'];
	
	//verifica se a variável está com algum valor
	if (isset($_REQUEST['botoes']))
	{	
		$funcao = $_REQUEST['botoes'];
		if ($funcao == "exit")
		{
			
			return 0;
		}
		else
		{
			
			//chamada da função
			$funcao();	
			
		}
	}
	return 0;		
?>	

		</div>
	</section>
