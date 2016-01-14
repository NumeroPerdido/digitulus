<?php
   include_once "db.class.php";
    class Airport_list{
		var $airport_name;
		var $airport_name_pt;
		var $airport_city_en;
		var $airport_city_pt;
		var $airport_country_en;
		var $airport_iata_code;
		var $geopolitical_division;
        //usado apenas no natural join com a tabela country_list
        var $airport_country_pt;
        //construtor da classe
        function __construct(){		
				
        }
		//carrega as funções de aeroporto utilizando airport_iata_code
		function get_airport_list($airport_iata_code)
		{
			$db = new DB();
			$sql=$db->row("SELECT * FROM digitulus_airport_list WHERE airport_iata_code = :s", array("s" => $airport_iata_code));
			$this->airport_iata_code=$sql["airport_iata_code"];
			$this->airport_name=$sql["airport_name"];
			$this->airport_name_pt=$sql["airport_name_pt"];
			$this->airport_city_en=$sql["airport_city_en"];
			$this->airport_city_pt=$sql["airport_city_pt"];
			$this->airport_country_en=$sql["airport_country_en"];
			$this->geopolitical_division=$sql["geopolitical_division"];
            return($sql);
		}
        //carrega as funções de aeroporto utilizando airport_iata_code + o nome do pais em português da tabela country_list
		function get_airport_list_country_pt($airport_iata_code)
		{
			$db = new DB();
            //SELECT * FROM digitulus_airport_list JOIN country_list ON airport_list.airport_country_en = country_list.country_en
			$sql=$db->row("SELECT * FROM digitulus_airport_list JOIN country_list ON airport_list.airport_country_en = country_list.country_en WHERE airport_iata_code = :s", array("s" => $airport_iata_code));
			$this->airport_iata_code=$sql["airport_iata_code"];
			$this->airport_name=$sql["airport_name"];
			$this->airport_name_pt=$sql["airport_name_pt"];
			$this->airport_city_en=$sql["airport_city_en"];
			$this->airport_city_pt=$sql["airport_city_pt"];
			$this->airport_country_en=$sql["airport_country_en"];
			$this->geopolitical_division=$sql["geopolitical_division"];
            $this->airport_country_pt=$sql["country_pt"];
            return($sql);
		
		}
		//deleta o aeroporto no banco de dados
		function delete_airport_list($airport_iata_code)
		{
			$db = new DB();
			$sql=$db->row("DELETE FROM digitulus_airport_list WHERE airport_iata_code = :s", array("s" => $airport_iata_code));
            return($sql);
		}
		//atualiza aeroporto no banco de dados
		function update_airport_list()
		{
			$db = new DB();
			$sql=$db->query("UPDATE digitulus_airport_list SET airport_name = :airport_name, airport_name_pt = :airport_name_pt, airport_city_en = :airport_city_en, airport_city_pt = :airport_city_pt, airport_country_en = :airport_country_en, geopolitical_division = :geopolitical_division WHERE airport_iata_code = :airport_iata_code", array("airport_name"=>$this->airport_name, "airport_name_pt"=>$this->airport_name_pt, "airport_city_en"=>$this->airport_city_en, "airport_city_pt"=>$this->airport_city_pt,"airport_country_en"=>$this->airport_country_en, "geopolitical_division"=>$this->geopolitical_division, "airport_iata_code"=>$this->airport_iata_code));
		}
		//insere aeroporto no banco de dados
        function insert_airport_list(){
            $fields ="airport_name, airport_name_pt, airport_city_en, airport_city_pt, airport_iata_code, airport_country_en, geopolitical_division";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_airport_list(".$fields.") VALUES(:airport_name, :airport_name_pt, :airport_city_en, :airport_city_pt, :airport_country_en, :geopolitical_division, :airport_iata_code)", array("airport_name"=>$this->airport_name,"airport_name_pt"=>$this->airport_name_pt,"airport_city_en"=>$this->airport_city_en,"airport_city_pt"=>$this->airport_city_pt,"airport_country_en"=>$this->airport_country_en,"geopolitical_division"=>$this->geopolitical_division,"airport_iata_code"=>$this->airport_iata_code));
        }         
    }
?>