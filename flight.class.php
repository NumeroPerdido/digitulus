<?php
   include_once "db.class.php";
    class Flight{
        var $arrival_at;
        var $iata_arrival_at;
        var $country;
        var $flight_gross;
		var $departure_from;
        var $flight_fare;
        var $airport_fee;
        var $flight_commission;
        var $flight_incentive;
        var $total_flight_commission;
        var $flight_dates;
        var $air_company;
        var $flight_net;
        var $flight_text;
        //construtor da classe
        function __construct(){		
				
        }
		  //funчуo pega todas as informaчѕes do voo dentro do BD a partir do iata_arrival_at
		function get_flight($iata_arrival_at)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_flight WHERE iata_arrival_at = :i", array("i" => $iata_arrival_at));
            $this->arrival_at=$sql["arrival_at"];
            $this->iata_arrival_at=$sql["iata_arrival_at"];
            $this->country=$sql["country"];			
			$this->departure_from=$sql["departure_from"];
			$this->flight_fare=$sql["flight_fare"];			            
            $this->airport_fee=$sql["airport_fee"];
            $this->flight_gross=$sql["flight_gross"];
            $this->flight_commission=$sql["flight_commission"];
            $this->flight_incentive=$sql["flight_incentive"];
            $this->total_flight_commission=$sql["total_flight_commission"];
            $this->flight_dates=$sql["flight_dates"];
            $this->air_company=$sql["air_company"];
            $this->flight_net=$sql["flight_net"];
            $this->flight_text=$sql["flight_text"];
			
            return($sql);
		}
		//deleta voo no banco de dados
		function delete_flight($iata_arrival_at)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_flight WHERE iata_arrival_at = :i", array("i" => $iata_arrival_at));		
            return($sql);
		}
		//atualiza voo no banco de dados
		function update_flight($iata_arrival_ato)
		{
			$db = new DB();
			$update= $db->query("UPDATE digitulus_flight SET iata_arrival_at='". $this->iata_arrival_at ."',arrival_at ='". $this->arrival_at ."', country='". $this->country ."',departure_from='" . $this->departure_from ."',flight_fare='" . $this->flight_fare ."', airport_fee ='" . $this->airport_fee . "',flight_gross='" . $this->flight_gross . "', flight_commission='" .$this->flight_commission."',flight_incentive='" .$this->flight_incentive."',total_flight_commission=".$this->total_flight_commission .",flight_dates='".$this->flight_dates."',air_company='".$this->air_company ."',flight_net='" .$this->flight_net."',flight_text ='" .$this->flight_text ."' WHERE iata_arrival_at ='". $iata_arrival_ato."'");

			}
		
		//insere novo voo no banco de dados		
        function insert_flight(){
            $fields ="arrival_at, iata_arrival_at, country, flight_gross, departure_from, flight_fare, airport_fee, flight_commission, flight_incentive, total_flight_commission, flight_dates, air_company, flight_net, flight_text";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_flight(".$fields.") VALUES(:arrival_at,:iata_arrival_at,:country,:flight_gross,:departure_from,:flight_fare,:airport_fee,:flight_commission,:flight_incentive,:total_flight_commission,:flight_dates,:air_company,:flight_net,:flight_text)", array("arrival_at"=>$this->arrival_at,"iata_arrival_at"=>$this->iata_arrival_at,"country"=>$this->country,"flight_gross"=>$this->flight_gross,"departure_from"=>$this->departure_from,"flight_fare"=>$this->flight_fare,"airport_fee"=>$this->airport_fee,"flight_commission"=>$this->flight_commission,"flight_incentive"=>$this->flight_incentive,"total_flight_commission"=>$this->total_flight_commission,"flight_dates"=>$this->flight_dates,"air_company"=>$this->air_company,"flight_net"=>$this->flight_net,"flight_text"=>$this->flight_text));
        }        
    }
?>