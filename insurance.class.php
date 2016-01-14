<?php
   include_once "db.class.php";
    class Insurance{
        var $insurance_duration;
        var $us_canada_extra_insurance_net_value;
        var $world_extra_insurance_net_value;
        var $extra_insurance_gross_value;
        var $ireland_insurance_value;
        var $oshc_insurance_value;
        
        function __construct(){

        }
		//função pegas todas as informações do seguro dentro do BD a partir do insurance_duration
		function get_insurance($insurance_duration)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_insurance WHERE insurance_duration = :i", array("i" => $insurance_duration));
			$this->insurance_duration = $sql['insurance_duration'];
			$this->us_canada_extra_insurance_net_value = $sql['us_canada_extra_insurance_net_value'];
			$this->world_extra_insurance_net_value = $sql['world_extra_insurance_net_value'];
			$this->extra_insurance_gross_value = $sql['extra_insurance_gross_value'];
			$this->ireland_insurance_value = $sql['ireland_insurance_value'];
			$this->oshc_insurance_value= $sql['oshc_insurance_value'];
            return($sql);
		}
		//atualiza dentro de settings as variáveis relacionadas ao seguro
		function update_settings_insurance($us_canada_net_insurance_per_day, $world_net_insurance_per_day, $ireland_insurance_default, $oshc_per_month)
		{
			$db = new DB();
			$sql=$db->query("SELECT * FROM digitulus_insurance");
			foreach($sql as $array)
			{
				$this->insurance_duration = $array['insurance_duration'];
				$this->us_canada_extra_insurance_net_value = $this->insurance_duration * 7 * $us_canada_net_insurance_per_day;
				$this->world_extra_insurance_net_value = $this->insurance_duration * 7 * $world_net_insurance_per_day;
				$this->extra_insurance_gross_value = $array['extra_insurance_gross_value'];
				$this->ireland_insurance_value = $ireland_insurance_default;
				$this->oshc_insurance_value= $oshc_per_month;
				$this->update_insurance();
			}
			
		}
		//deleta seguro no banco de dados
		function delete_insurance($insurance_duration)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_insurance WHERE insurance_duration = :i", array("i" => $insurance_duration));
            return($sql);
		}
		//atualiza o seguro no banco de dados
		function update_insurance()
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_insurance SET us_canada_extra_insurance_net_value = :us_canada_extra_insurance_net_value, world_extra_insurance_net_value = :world_extra_insurance_net_value, extra_insurance_gross_value = :extra_insurance_gross_value, ireland_insurance_value = :ireland_insurance_value, oshc_insurance_value = :oshc_insurance_value WHERE insurance_duration = :insurance_duration", array("insurance_duration"=>$this->insurance_duration,"us_canada_extra_insurance_net_value"=>$this->us_canada_extra_insurance_net_value,"world_extra_insurance_net_value"=>$this->world_extra_insurance_net_value,"extra_insurance_gross_value"=>$this->extra_insurance_gross_value,"ireland_insurance_value"=>$this->ireland_insurance_value,"oshc_insurance_value"=>$this->oshc_insurance_value));
		}		
		//insere o seguro no banco de dados
        function insert_insurance(){
            $fields ="insurance_duration, us_canada_extra_insurance_net_value, world_extra_insurance_net_value, extra_insurance_gross_value, ireland_insurance_value, oshc_insurance_value";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_insurance(".$fields.") VALUES(:insurance_duration,:us_canada_extra_insurance_net_value,:world_extra_insurance_net_value,:extra_insurance_gross_value,:ireland_insurance_value,:oshc_insurance_value)", array("insurance_duration"=>$this->insurance_duration,"us_canada_extra_insurance_net_value"=>$this->us_canada_extra_insurance_net_value,"world_extra_insurance_net_value"=>$this->world_extra_insurance_net_value,"extra_insurance_gross_value"=>$this->extra_insurance_gross_value,"ireland_insurance_value"=>$this->ireland_insurance_value,"oshc_insurance_value"=>$this->oshc_insurance_value));
        }
    }
?>