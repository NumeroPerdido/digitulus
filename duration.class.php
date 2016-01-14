<?php
   include_once "db.class.php";
    class Duration{
        var $standard_travel_duration;
        var $standard_travel_duration_name;
        var $australia_weeks_of_vacation;
        var $australia_travel_duration;
        var $australia_travel_duration_name;
        var $ireland_weeks_of_vacation;
        var $ireland_travel_duration;
        var $ireland_travel_duration_name;
        //construtor da classe
        function __construct(){		
				
        }
		  //função pegas todas as informações da duração dentro do BD a partir do standard_travel_duration
		function get_standard_travel_duration($standard_travel_duration)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_duration WHERE standard_travel_duration = :u", array("u" => $standard_travel_duration));
			$this->standard_travel_duration = $sql['standard_travel_duration'];
			$this->standard_travel_duration_name = $sql['standard_travel_duration_name'];
			$this->australia_weeks_of_vacation = $sql['australia_weeks_of_vacation'];
			$this->australia_travel_duration = $sql['australia_travel_duration'];
			$this->australia_travel_duration_name = $sql['australia_travel_duration_name'];
			$this->ireland_weeks_of_vacation = $sql['ireland_weeks_of_vacation'];
			$this->ireland_travel_duration = $sql['ireland_travel_duration'];
			$this->ireland_travel_duration_name = $sql['ireland_travel_duration_name'];
            return($sql);
		}
		//deleta a duração no banco de dados
		function delete_duration($standard_travel_duration)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_duration WHERE standard_travel_duration = :u", array("u" => $standard_travel_duration));
            return($sql);
		}
		//atualiza a duração no banco de dados
		function update_duration()
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_duration SET standard_travel_duration_name = :standard_travel_duration_name, australia_weeks_of_vacation = :australia_weeks_of_vacation, australia_travel_duration = :australia_travel_duration, australia_travel_duration_name = :australia_travel_duration_name, ireland_weeks_of_vacation = :ireland_weeks_of_vacation, ireland_travel_duration = :ireland_travel_duration, ireland_travel_duration_name = :ireland_travel_duration_name WHERE standard_travel_duration = :standard_travel_duration", array("standard_travel_duration"=>$this->standard_travel_duration, "standard_travel_duration_name"=>$this->standard_travel_duration_name,"australia_weeks_of_vacation"=>$this->australia_weeks_of_vacation,"australia_travel_duration"=>$this->australia_travel_duration,"australia_travel_duration_name"=>$this->australia_travel_duration_name,"ireland_weeks_of_vacation"=>$this->ireland_weeks_of_vacation,"ireland_travel_duration"=>$this->ireland_travel_duration,"ireland_travel_duration_name"=>$this->ireland_travel_duration_name));
		}       
    }
?>
