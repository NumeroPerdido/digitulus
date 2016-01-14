<?php
   include_once "db.class.php";
    class Airline_list{
		var $airline_name;
		var $airline_iata_code;
		var $airline_country_en;

        //construtor da classe
        function __construct(){		
				
        }
		 //função que pega todas as informações da linha aérea dentro do BD a partir do airline_iata_code
		function get_airline_list($airline_iata_code)
		{
			$db = new DB();
			$sql=$db->row("SELECT * FROM digitulus_airline_list WHERE airline_iata_code = :s", array("s" => $airline_iata_code));
			$this->airline_iata_code = $sql["airline_iata_code"];
			$this->airline_name=$sql["airline_name"];
			$this->airline_country_en=$sql["airline_country_en"];
            return($sql);
		}
		//deleta a linha aérea no banco de dados
		function delete_airline_list($airline_iata_code)
		{
			$db = new DB();
			$sql=$db->row("DELETE FROM digitulus_airline_list WHERE airline_iata_code = :s", array("s" => $airline_iata_code));
            return($sql);
		}
		//atualiza a linha aérea no banco de dados
		function update_airline_list()
		{
			$db = new DB();
			$sql=$db->query("UPDATE digitulus_airline_list SET airline_name = :airline_name,  airline_country_en = :airline_country_en WHERE airline_iata_code = :airline_iata_code", array("airline_name"=>$this->airline_name,  "airline_iata_code"=>$this->airline_iata_code, "airline_country_en"=>$this->airline_country_en));
		}      
		//insere a linha aérea no banco de dados
        function insert_airline_list(){
            $fields ="airline_name, airline_iata_code, airline_country_en";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_airline_list(".$fields.") VALUES(:airline_name, :airline_iata_code, :airline_country_en)", array("airline_name"=>$this->airline_name,"airline_iata_code"=>$this->airline_iata_code,"airline_country_en"=>$this->airline_country_en));
        }  		
    }
?>