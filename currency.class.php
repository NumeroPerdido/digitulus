<?php
   include_once "db.class.php";
    class Currency{
        var $exhibition_symbol;
		var $currency_code;
		var $currency_name;
		var $currency_factor;
        var $exchange_value;
        var $banking_fee_value;
		var $last_updated;

        //construtor da classe
        function __construct(){		
				
        }
        //função apara carregar dados do banco
       function get_currency($coluna){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_currency WHERE currency_code= :c", array("c" => $coluna));            
            $this->exhibition_symbol=$sql["exhibition_symbol"];           
			$this->currency_code=$sql["currency_code"];			
			$this->currency_name=$sql["currency_name"];
			$this->currency_factor=$sql["currency_factor"];
            $this->exchange_value=$sql["exchange_value"];
            $this->banking_fee_value=$sql["banking_fee_value"];
            $this->last_updated=$sql["last_updated"];
            return($sql);
        }
        //função apara carregar dados do banco
       function get_currency_by_name($name){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_currency WHERE currency_name= :c", array("c" => $name));            
            $this->exhibition_symbol=$sql["exhibition_symbol"];           
            $this->currency_code=$sql["currency_code"];         
            $this->currency_name=$sql["currency_name"];
            $this->currency_factor=$sql["currency_factor"];
            $this->exchange_value=$sql["exchange_value"];
            $this->banking_fee_value=$sql["banking_fee_value"];
            $this->last_updated=$sql["last_updated"];
            return($sql);
        }
		//deleta o cambio no banco de dados
		function delete_currency($currency_code){
            $db = new DB();
            $sql=$db->row("DELETE FROM digitulus_currency WHERE currency_code= :c", array("c" => $currency_code)); 
            return($sql);
        }
		//atualiza câmbio no banco de dados
		function update_currency()
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_currency SET exhibition_symbol = :exhibition_symbol, currency_name = :currency_name, currency_factor = :currency_factor, exchange_value = :exchange_value, banking_fee_value = :banking_fee_value, last_updated = :last_updated WHERE currency_code = :currency_code", array("exhibition_symbol"=>$this->exhibition_symbol,"currency_code"=>$this->currency_code,"currency_name"=>$this->currency_name,"currency_factor"=>$this->currency_factor,"exchange_value"=>$this->exchange_value,"banking_fee_value"=>$this->banking_fee_value,"last_updated"=>$this->last_updated));
		}	
		//insere novo câmbio no banco de dados		
        function insert_currency(){
            $fields ="exhibition_symbol, currency_code, currency_name, currency_factor, exchange_value, banking_fee_value, last_updated";
            $db= new DB();
			$insert=$db->query("INSERT INTO digitulus_currency(".$fields.") VALUES(:exhibition_symbol,:currency_code,:currency_name,:currency_factor,:exchange_value,:banking_fee_value,:last_updated)", array("exhibition_symbol"=>$this->exhibition_symbol,"currency_code"=>$this->currency_code,"currency_name"=>$this->currency_name,"currency_factor"=>$this->currency_factor,"exchange_value"=>$this->exchange_value,"banking_fee_value"=>$this->banking_fee_value,"last_updated"=>$this->last_updated));
        }
		function update_table($id, $novoConteudo, $simbolo)
		{
			$db = new DB();
			$last_updated = date('Y-m-d');
			$sql=$db->query("UPDATE digitulus_currency SET ".$id."= :id, last_updated= :last_updated WHERE exhibition_symbol = :exhibition_symbol", array("id"=>$novoConteudo, "last_updated"=>$last_updated, "exhibition_symbol"=>$simbolo));
			echo "Dados atualizados com sucesso!";
		}
    }
?>