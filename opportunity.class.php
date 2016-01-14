<?php
   include_once "db.class.php";
    class Opportunity{
        var $opportunity_id;
        var $opportunity_user_id;
		var $opportunity_title; 
        var $opportunity_description;
		var $opportunity_status;  
		var $opportunity_client_id;
		var $opportunity_notes;
		var $opportunity_deal_date;
		var $opportunity_currency_code;
		var $opportunity_total_value;
		var $opportunity_total_inflow_date;
        
        function __construct(){

        }
		//função pegas todas as informações do atendimento dentro do BD a partir do opportunity_id
		function get_opportunity($opportunity_id)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_opportunity WHERE opportunity_id = :i", array("i" => $opportunity_id));
			$this->opportunity_id = $sql['opportunity_id'];
			$this->opportunity_user_id = $sql['opportunity_user_id'];	
			$this->opportunity_title = $sql['opportunity_title'];		
			$this->opportunity_description = $sql['opportunity_description'];	
			$this->opportunity_status = $sql['opportunity_status'];	
			$this->opportunity_client_id = $sql['opportunity_client_id'];
			$this->opportunity_notes = $sql['opportunity_notes'];
			$this->opportunity_deal_date = $sql['opportunity_deal_date'];
			$this->opportunity_currency_code = $sql['opportunity_currency_code'];
			$this->opportunity_total_value = $sql['opportunity_total_value'];
			$this->opportunity_total_inflow_date = $sql['opportunity_total_inflow_date'];									
            return($sql);
		}
		//deleta atendimento no banco de 
		function delete_opportunity($opportunity_id)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_opportunity WHERE opportunity_id = :i", array("i" => $opportunity_id));
            return($sql);
		}
		//atualiza o atendimento no banco de dados
		function update_opportunity($id_og)
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_opportunity SET opportunity_user_id = :opportunity_user_id, opportunity_title = :opportunity_title, opportunity_description = :opportunity_description, opportunity_status = :opportunity_status, opportunity_client_id = :opportunity_client_id, opportunity_notes = :opportunity_notes, opportunity_deal_date = :opportunity_deal_date, opportunity_currency_code = :opportunity_currency_code, opportunity_total_value = :opportunity_total_value, opportunity_total_inflow_date = :opportunity_total_inflow_date WHERE opportunity_id = :opportunity_id", array("opportunity_id"=>$id_og, "opportunity_user_id"=>$this->opportunity_user_id, "opportunity_title"=>$this->opportunity_title, "opportunity_description"=>$this->opportunity_description, "opportunity_status"=>$this->opportunity_status, "opportunity_client_id"=>$this->opportunity_client_id, "opportunity_notes"=>$this->opportunity_notes, "opportunity_deal_date"=>$this->opportunity_deal_date, "opportunity_currency_code"=>$this->opportunity_currency_code, "opportunity_total_value"=>$this->opportunity_total_value, "opportunity_total_inflow_date"=>$this->opportunity_total_inflow_date));
		}		
		//insere o atendimento no banco de dados
        function insert_opportunity(){
            $fields ="opportunity_title, opportunity_description, opportunity_status, opportunity_client_id, opportunity_user_id, opportunity_notes, opportunity_deal_date, opportunity_currency_code, opportunity_total_value, opportunity_total_inflow_date";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_opportunity(".$fields.") VALUES(:opportunity_title, :opportunity_description, :opportunity_status, :opportunity_client_id, :opportunity_user_id, :opportunity_notes, :opportunity_deal_date, :opportunity_currency_code, :opportunity_total_value, :opportunity_total_inflow_date)", array("opportunity_user_id"=>$this->opportunity_user_id, "opportunity_title"=>$this->opportunity_title, "opportunity_description"=>$this->opportunity_description, "opportunity_status"=>$this->opportunity_status, "opportunity_client_id"=>$this->opportunity_client_id, "opportunity_notes"=>$this->opportunity_notes, "opportunity_deal_date"=>$this->opportunity_deal_date, "opportunity_currency_code"=>$this->opportunity_currency_code, "opportunity_total_value"=>$this->opportunity_total_value, "opportunity_total_inflow_date"=>$this->opportunity_total_inflow_date));
            //pega o último id inserido
            $last_id=$db->query("SELECT LAST_INSERT_ID()");
            //retorna o último id inserido
            return $last_id;
        }
    }
?>