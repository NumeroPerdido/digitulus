<?php
   include_once "db.class.php";
    class Activity{
        var $activity_id;
		var $activity_opportunity_id;
		var $activity_date;
		var $activity_proposal;
		var $activity_answer;
        
        function __construct(){

        }
		//função pegas todas as informações da atividade de atendimento dentro do BD a partir do activity_id
		function get_activity($activity_id)
		{
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_activity WHERE activity_id = :i", array("i" => $activity_id));
			$this->activity_id = $sql['activity_id'];
			$this->activity_opportunity_id = $sql['activity_opportunity_id'];
			$this->activity_date = $sql['activity_date'];
			$this->activity_proposal = $sql['activity_proposal'];
			$this->activity_answer = $sql['activity_answer'];
            return($sql);
		}
		//deleta atividade de atendimento no banco de dados
		function delete_activity($activity_id)
		{
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_activity WHERE activity_id = :i", array("i" => $activity_id));
            return($sql);
		}
		//atualiza a atividade de atendimento no banco de dados
		function update_activity($id_og)
		{
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_activity SET activity_opportunity_id = :activity_opportunity_id, activity_date = :activity_date, activity_proposal = :activity_proposal, activity_answer = :activity_answer WHERE activity_id = :activity_id", array("activity_id"=>$id_og, "activity_opportunity_id"=>$this->activity_opportunity_id, "activity_date"=>$this->activity_date, "activity_proposal"=>$this->activity_proposal, "activity_answer"=>$this->activity_answer));
		}		
		//insere a atividade de atendimento no banco de dados
        function insert_activity(){
            $fields ="activity_id, activity_opportunity_id, activity_date, activity_proposal, activity_answer";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_activity(".$fields.") VALUES(:activity_id, :activity_opportunity_id, :activity_date, :activity_proposal, :activity_answer)", array("activity_id"=>$this->activity_id, "activity_opportunity_id"=>$this->activity_opportunity_id, "activity_date"=>$this->activity_date, "activity_proposal"=>$this->activity_proposal, "activity_answer"=>$this->activity_answer));
        }
    }
?>