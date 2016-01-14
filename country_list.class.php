<?php
   include_once "db.class.php";
    class Country_list{
		var $iso_3166_1_numeric;
		var $iso_3166_1_alpha_2;
		var $iso_3166_1_alpha_3;
		var $country_en;
		var $country_fr;
		var $country_de;
		var $country_es;
		var $country_pt;
		var $country_ru;
		var $country_currency_code;
		var $country_exhibition_symbol;
		var $default_budget_currency_code;
		var $dialing_code;

		//construtor da classe
        function __construct(){		
				
        }
		//carrega as funções de país utilizando country_en
		function get_country_list_en($country_en)
		{
			$db = new DB();
			$sql=$db->row("SELECT * FROM digitulus_country_list WHERE country_en = :s", array("s" => $country_en));
			$this->iso_3166_1_numeric=$sql["iso_3166_1_numeric"];
			$this->iso_3166_1_alpha_2=$sql["iso_3166_1_alpha_2"];
			$this->iso_3166_1_alpha_3=$sql["iso_3166_1_alpha_3"];
			$this->country_en=$sql["country_en"];
			$this->country_fr=$sql["country_fr"];
			$this->country_de=$sql["country_de"];
			$this->country_es=$sql["country_es"];
			$this->country_pt=$sql["country_pt"];
			$this->country_ru=$sql["country_ru"];
			$this->country_currency_code=$sql["country_currency_code"];
			$this->country_exhibition_symbol=$sql["country_exhibition_symbol"];
			$this->default_budget_currency_code=$sql["default_budget_currency_code"];
			$this->dialing_code=$sql["dialing_code"];
            return($sql);
		}      
		
		//carrega as funções de país utilizando country_pt
		function get_country_list_pt($country_pt)
		{
			$db = new DB();
			$sql=$db->row("SELECT * FROM digitulus_country_list WHERE country_pt = :s", array("s" => $country_pt));
			$this->iso_3166_1_numeric=$sql["iso_3166_1_numeric"];
			$this->iso_3166_1_alpha_2=$sql["iso_3166_1_alpha_2"];
			$this->iso_3166_1_alpha_3=$sql["iso_3166_1_alpha_3"];
			$this->country_en=$sql["country_en"];
			$this->country_fr=$sql["country_fr"];
			$this->country_de=$sql["country_de"];
			$this->country_es=$sql["country_es"];
			$this->country_pt=$sql["country_pt"];
			$this->country_ru=$sql["country_ru"];
			$this->country_currency_code=$sql["country_currency_code"];
			$this->country_exhibition_symbol=$sql["country_exhibition_symbol"];
			$this->default_budget_currency_code=$sql["default_budget_currency_code"];
			$this->dialing_code=$sql["dialing_code"];			
            return($sql);
		}      
    }
?>