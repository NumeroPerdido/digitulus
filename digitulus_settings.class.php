<?php
   include_once "db.class.php";
    class Digitulus_settings{
		var $digitulus_settings_id;
		var $wire_fee_value;
		var $iof_rate;
		var $phi;
		var $exchange_margin;
		var $internet_transfer_fee;
		var $us_canada_net_insurance_per_day;
		var $world_net_insurance_per_day;
		var $ireland_insurance_default;
		var $oshc_per_month;
		var $new_up_to;
		var $issuance_fee;

        //construtor da classe
        function __construct(){		
				
        }
		//função que carrega os dados do banco de dados
		function get_digitulus_settings($digitulus_settings_id)
		{
			$db = new DB();
			$sql=$db->row("SELECT * FROM digitulus_settings WHERE digitulus_settings_id	= :s", array("s" => $digitulus_settings_id));
			$this->wire_fee_value=$sql["wire_fee_value"];
			$this->iof_rate=$sql["iof_rate"];
			$this->phi=$sql["phi"];
			$this->exchange_margin=$sql["exchange_margin"];
			$this->internet_transfer_fee=$sql["internet_transfer_fee"];
			$this->us_canada_net_insurance_per_day=$sql["us_canada_net_insurance_per_day"];
			$this->world_net_insurance_per_day=$sql["world_net_insurance_per_day"];
			$this->ireland_insurance_default=$sql["ireland_insurance_default"];
			$this->oshc_per_month=$sql["oshc_per_month"];
			$this->new_up_to=$sql["new_up_to"];
			$this->issuance_fee=$sql["issuance_fee"];
            return($sql);
		}
		//atualiza no banco de dados
		function update_digitulus_settings()
		{
			$db = new DB();
			$sql=$db->query("UPDATE digitulus_settings SET wire_fee_value = :wire_fee_value, iof_rate = :iof_rate, phi = :phi, exchange_margin = :exchange_margin, internet_transfer_fee = :internet_transfer_fee, us_canada_net_insurance_per_day = :us_canada_net_insurance_per_day, world_net_insurance_per_day = :world_net_insurance_per_day, ireland_insurance_default = :ireland_insurance_default, oshc_per_month = :oshc_per_month, new_up_to = :new_up_to, issuance_fee = :issuance_fee WHERE digitulus_settings_id = :digitulus_settings_id", array("digitulus_settings_id"=>$this->digitulus_settings_id, "wire_fee_value"=>$this->wire_fee_value, "iof_rate"=>$this->iof_rate, "phi"=>$this->phi, "exchange_margin"=>$this->exchange_margin,"internet_transfer_fee"=>$this->internet_transfer_fee, "us_canada_net_insurance_per_day"=>$this->us_canada_net_insurance_per_day, "world_net_insurance_per_day"=>$this->world_net_insurance_per_day, "ireland_insurance_default"=>$this->ireland_insurance_default, "oshc_per_month"=>$this->oshc_per_month, "new_up_to"=>$this->new_up_to, "issuance_fee"=>$this->issuance_fee));
		}        
    }
?>