<?php 
include_once "db.class.php";

class Cambio
{	
	var $dia_ini;
	var $data;
	var $i;
	var $moeda;
	var $exchange_margin;
	var $codigo_moeda;
    var $currency_factor;
    
	function margin() 
	{
		$db = new DB();
		$sql=$db->row("SELECT * FROM digitulus_settings");	
		$this->exchange_margin=$sql["exchange_margin"];
		return $this->exchange_margin;
		}
    function currency_factor($code) 
	{
		$db = new DB();
		$sql=$db->row("SELECT currency_factor FROM digitulus_currency where currency_code='$code' ");	
		$this->currency_factor=$sql["currency_factor"];
		return $this->currency_factor;
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
	 Function cotacao($dia_ini,$i, $moeda)
	{
	
			
			error_reporting(0);
			$di = substr($dia_ini,4,4) .  "-" . substr($dia_ini,2,2) .  "-" . substr($dia_ini,0,2) ;
			
		
		if ($i == 10)
		{
			return 0;
		}
		//verificando se está no fim de semana
		
		
		$data = substr($dia_ini,4,4). substr($dia_ini, 2,2) . substr($dia_ini,0,2);
		
	
		//concatenando o dia para poder gerar o csv	
		$arquivo =  "http://www4.bcb.gov.br/Download/fechamento/" . $data . ".csv";
		//abrindo o csv
		if (fopen($arquivo,"r") == null)
		{
			
			$i++;
			$dia_ini =   date('dmY', strtotime("-" .$i. " days"));
			
			return $this->cotacao($dia_ini,$i, $moeda);
			
		}
		if(!$fp=fopen($arquivo,"r" )) 
		{
		//caso o csv nao seja encontrado retorna 0	
			
			return 0;
			
		}
		
		$conteudo = '';
		while(!feof($fp)) 
		{ 
			// leia o conteúdo do csv
			$conteudo[] =fgetcsv ($fp, 1000, ";");
		} 
        //encerrando o arquivo  
		fclose($fp);
		//verifica se tem algum valor atribuído, caso não tenha, transforma a função em recursiva
		if (isset($conteudo[2][0]))
		{
			for ($k=0; $k<sizeof($conteudo);$k++)
			{
				for ($l=0; $l<sizeof($conteudo[0]);$l++)
				{
					$conteudo[$k][$l] = str_replace(",",".",$conteudo[$k][$l]);
				}
			}
			switch ($moeda)
			{
				Case 'Dólar':
					$usd_exchange_rate = number_format($conteudo[47][5] * (1+($this->margin())/100)*$this->currency_factor("USD"),4, ",",".");
					return $usd_exchange_rate;  
				break;
				Case 'Libra':
					 $gbp_exchange_rate = number_format($conteudo[83][5] * (1+($this->margin())/100)*$this->currency_factor("GBP"),4, ",",".");
					 return $gbp_exchange_rate;
				break;
				Case 'Euro':
					$eur_exchange_rate = number_format($conteudo[153][5] * (1+($this->margin())/100)*$this->currency_factor("EUR"),4, ",",".");
					return $eur_exchange_rate;
				break;
				Case 'Dólar Canadense':
					$cad_exchange_rate = number_format($conteudo[34][5] * (1+($this->margin())/100)*$this->currency_factor("CAD"),4, ",",".");
					return $cad_exchange_rate;
				break;
				Case 'Dólar Australiano':
					$aud_exchange_rate = number_format($conteudo[31][5] * (1+($this->margin())/100)*$this->currency_factor("AUD"),4, ",",".");
					return $aud_exchange_rate;
				break;
				Case 'Dólar  Neozelandês':
					$nzd_exchange_rate =number_format($conteudo[50][5] * (1+($this->margin())/100)*$this->currency_factor("NZD"),4, ",",".");
					return $nzd_exchange_rate;
				break;
				Case 'Franco Suíço':
					
					$chf_exchange_rate = number_format($conteudo[69][5] * (1+($this->margin())/100)*$this->currency_factor("CHF"),4, ",",".");
					return $chf_exchange_rate;
				break;
				Case 'Rande':
					$zar_exchange_rate = number_format($conteudo[118][5] * (1+($this->margin())/100)*$this->currency_factor("ZAR"),4, ",",".");
					return $zar_exchange_rate;
				break;
				Case 'Iene':
					$jpy_exchange_rate = number_format($conteudo[73][5] * (1+($this->margin())/100)*$this->currency_factor("JPY"),4, ",",".");
					return $jpy_exchange_rate;
				break;
				Case 'Dólar Iata':
					$usdiata_exchange_rate = number_format($conteudo[47][5]*$this->currency_factor("IAT"),4, ",",".");
					return $usdiata_exchange_rate;
				break;
				default: 
					return "Moeda não encontrada";
				break;	
			}
			return 0;	
		}
		else
		{
			
			//decrementando os dias até chegar em um arquivo válido	
			$i++;
			$dia_ini =   date('dmY', strtotime("'-" .$i. " days'"));
			$dia_ini =   date('dmY', strtotime("-" .$i. " days"));
		}	
		
			
	}
	function cod_cambio($moeda)
	{
		if ((int)(date('H') < 10 ))
		{
			return "Câmbio de abertura somente as 10:00";
		}
		elseif($this->diasemana(date('Y-m-d'))=="Sábado" or $this->diasemana(date('Y-m-d'))=="Domingo")
		{
			return "O câmbio de abertura não pode ser obtido";
		}
		
		
		switch ($moeda)
			{
				Case 'Dólar':
					$this->codigo_moeda=61;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$usd_exchange_rate = $this->cambio_abertura();
					return $usd_exchange_rate;  
				break;
				Case 'Libra':
					 $this->codigo_moeda=115;
					 if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					 $gbp_exchange_rate =$this->cambio_abertura();
					 return $gbp_exchange_rate;
				break;
				Case 'Euro':
					$this->codigo_moeda=222;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$eur_exchange_rate = $this->cambio_abertura();
					return $eur_exchange_rate;
				break;
				Case 'Dólar Canadense':
					$this->codigo_moeda=48;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$cad_exchange_rate = $this->cambio_abertura();
					return $cad_exchange_rate;
				break;
				Case 'Dólar Australiano':
					$this->codigo_moeda=45;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$aud_exchange_rate =$this->cambio_abertura();
					return $aud_exchange_rate;
				break;
				Case 'Dólar Neozelandês':
					$this->codigo_moeda = 66;
					$nzd_exchange_rate =$this->cambio_abertura();
					if ($nzd_exchange_rate == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$nzd_exchange_rate =$this->cambio_abertura();
					return $nzd_exchange_rate;
				break;
				Case 'Franco Suíço':
					$this->codigo_moeda=97;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$chf_exchange_rate = $this->cambio_abertura();
					return $chf_exchange_rate;
				break;
				Case 'Rande':
					$this->codigo_moeda=176;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$zar_exchange_rate = $this->cambio_abertura();
					return $zar_exchange_rate;
				break;
				Case 'Iene':
					$this->codigo_moeda=101;
					if ($this->cambio_abertura() == "erro")
					{	
						
						return "O cambio ainda não está disponível!";
					}
					$jpy_exchange_rate = $this->cambio_abertura();
					return $jpy_exchange_rate;
				break;
				Case 'Dólar Iata':
					$this->codigo_moeda=61;
					if ($this->cambio_abertura() == "erro")
					{
						return "O cambio ainda não está disponível!";
					}
					$usd_iata_exchange_rate = $this->cambio_abertura();
					return $usd_iata_exchange_rate;
				break;
				default: 
					return 0;
				break;	
			}
		
		
	
	}
	function cambio_abertura ()
	{
		error_reporting (15);
		

		
		$dataini = date('d/m/Y');
		
		$arquivo ="https://ptax.bcb.gov.br/ptax_internet/consultaBoletim.do?method=consultarBoletim&ChkMoeda=$this->codigo_moeda&DATAINI=$dataini&RadOpcao=3" ;
		if(!$fp=fopen($arquivo ,"r" ))
		{
			echo "Erro ao abrir a página de cotação" ;
    		exit ;
		}
     
    	$conteudo = '';
    	while(!feof($fp))
		{ // leia o conteúdo da página
			$conteudo .= fgets($fp,1024);
    	}
    	fclose($fp);
     	$aux = explode("<td>",$conteudo);
    	
		
		
		if (sizeof($aux) < 5)
		{
			return "erro";
		}
		
		return substr($aux[4],0,6);
		
	
		
	
	
	
	}
}	
?>	