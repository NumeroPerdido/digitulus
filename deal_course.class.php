<?php
   include_once "db.class.php";
    class Deal_course{
    	var $deal_course_id;
		var $deal_course_opportunity_id;
		var $deal_course_user_id;
		var $country;
		var $school;
		var $city;
		var $neighbourhood;
		var $course_name;
		var $lessons_per_week;
		var $lesson_duration;
		var $start_date;
		var $duration;
		var $finish_date;
		var $currency_code;
		var $banking_fee_value;
		var $registration_fee_value;
		var $course_value;
		var $material_fee_value;
		var $others_value;
		var $accommodation_type;
		var $room;
		var $meals;
		var $accommodation_start_date;
		var $accommodation_duration;
		var $accommodation_finish_date;
		var $accommodation_fee_value;
		var $accommodation_value;
		var $required_insurance_value;
		var $airport_transfer_value;
		var $extra_nights;

        function __construct(){

        }
        
		//função pegas todas as informações do atendimento dentro do BD a partir do deal_course_id
		function get_deal_course($deal_course_id){
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_deal_course WHERE deal_course_id = :id", array("id" => $deal_course_id));
			$this->deal_course_id = $sql['deal_course_id'];
			$this->deal_course_opportunity_id = $sql['deal_course_opportunity_id'];
			$this->deal_course_user_id =$sql['deal_course_user_id'];
			$this->country = $sql['country'];
			$this->school = $sql['school'];
			$this->city = $sql['city'];
			$this->neighbourhood = $sql['neighbourhood'];
			$this->course_name = $sql['course_name'];
			$this->lessons_per_week = $sql['lessons_per_week'];
			$this->lesson_duration = $sql['lesson_duration'];
			$this->start_date = $sql['start_date'];
			$this->duration = $sql['duration'];
			$this->finish_date = $sql['finish_date'];
			$this->currency_code = $sql['currency_code'];
			$this->banking_fee_value = $sql['banking_fee_value'];
			$this->registration_fee_value = $sql['registration_fee_value'];
			$this->course_value = $sql['course_value'];
			$this->material_fee_value = $sql['material_fee_value'];
			$this->others_value = $sql['others_value'];
			$this->accommodation_type = $sql['accommodation_type'];
			$this->room = $sql['room'];
			$this->meals = $sql['meals'];
			$this->accommodation_start_date = $sql['accommodation_start_date'];
			$this->accommodation_duration = $sql['accommodation_duration'];
			$this->accommodation_finish_date = $sql['accommodation_finish_date'];
			$this->accommodation_fee_value = $sql['accommodation_fee_value'];
			$this->accommodation_value = $sql['accommodation_value'];
			$this->required_insurance_value = $sql['required_insurance_value'];
			$this->airport_transfer_value = $sql['airport_transfer_value'];
			$this->extra_nights = $sql['extra_nights'];							
            return($sql);
		}
        
        //função pegas todas as informações do atendimento dentro do BD a partir do deal_course_opportunity_id
        function get_deal_course_op($deal_course_opportunity_id){
			$db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_deal_course WHERE deal_course_opportunity_id = :id", array("id" => $deal_course_opportunity_id));
			$this->deal_course_id = $sql['deal_course_id'];
			$this->deal_course_opportunity_id = $sql['deal_course_opportunity_id'];
			$this->deal_course_user_id =$sql['deal_course_user_id'];
			$this->country = $sql['country'];
			$this->school = $sql['school'];
			$this->city = $sql['city'];
			$this->neighbourhood = $sql['neighbourhood'];
			$this->course_name = $sql['course_name'];
			$this->lessons_per_week = $sql['lessons_per_week'];
			$this->lesson_duration = $sql['lesson_duration'];
			$this->start_date = $sql['start_date'];
			$this->duration = $sql['duration'];
			$this->finish_date = $sql['finish_date'];
			$this->currency_code = $sql['currency_code'];
			$this->banking_fee_value = $sql['banking_fee_value'];
			$this->registration_fee_value = $sql['registration_fee_value'];
			$this->course_value = $sql['course_value'];
			$this->material_fee_value = $sql['material_fee_value'];
			$this->others_value = $sql['others_value'];
			$this->accommodation_type = $sql['accommodation_type'];
			$this->room = $sql['room'];
			$this->meals = $sql['meals'];
			$this->accommodation_start_date = $sql['accommodation_start_date'];
			$this->accommodation_duration = $sql['accommodation_duration'];
			$this->accommodation_finish_date = $sql['accommodation_finish_date'];
			$this->accommodation_fee_value = $sql['accommodation_fee_value'];
			$this->accommodation_value = $sql['accommodation_value'];
			$this->required_insurance_value = $sql['required_insurance_value'];
			$this->airport_transfer_value = $sql['airport_transfer_value'];
			$this->extra_nights = $sql['extra_nights'];							
            return($sql);
		}
        
		//deleta atendimento no banco de 
		function delete_deal_course($deal_course_id){
			$db = new DB();
            $sql=$db->row("DELETE FROM digitulus_deal_course WHERE deal_course_id = :i", array("i" => $deal_course_id));
            return($sql);
		}
		//atualiza o atendimento no banco de dados
		function update_deal_course($id_og){
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_deal_course SET deal_course_opportunity_id = :deal_course_opportunity_id,deal_course_user_id = :deal_course_user_id,country = :country,school = :school,city = :city,neighbourhood = :neighbourhood,course_name = :course_name,lessons_per_week = :lessons_per_week,lesson_duration = :lesson_duration,start_date = :start_date,duration = :duration,finish_date = :finish_date,currency_code = :currency_code,banking_fee_value = :banking_fee_value,registration_fee_value = :registration_fee_value,course_value = :course_value,material_fee_value = :material_fee_value,others_value = :others_value,accommodation_type = :accommodation_type,room = :room,meals = :meals,accommodation_start_date = :accommodation_start_date,accommodation_duration = :accommodation_duration,accommodation_finish_date = :accommodation_finish_date,accommodation_fee_value = :accommodation_fee_value,accommodation_value = :accommodation_value,required_insurance_value = :required_insurance_value,airport_transfer_value = :airport_transfer_value,extra_nights = :extra_nights WHERE deal_course_id = :deal_course_id", array("deal_course_id"=>$id_og, "deal_course_opportunity_id"=>$this->deal_course_opportunity_id, "deal_course_user_id"=>$this->deal_course_user_id, "country"=>$this->country, "school"=>$this->school, "city"=>$this->city, "neighbourhood"=>$this->neighbourhood, "course_name"=>$this->course_name, "lessons_per_week"=>$this->lessons_per_week, "lesson_duration"=>$this->lesson_duration, "start_date"=>$this->start_date, "duration"=>$this->duration, "finish_date"=>$this->finish_date, "currency_code"=>$this->currency_code, "banking_fee_value"=>$this->banking_fee_value, "registration_fee_value"=>$this->registration_fee_value, "course_value"=>$this->course_value, "material_fee_value"=>$this->material_fee_value, "others_value"=>$this->others_value, "accommodation_type"=>$this->accommodation_type, "room"=>$this->room, "meals"=>$this->meals, "accommodation_start_date"=>$this->accommodation_start_date, "accommodation_duration"=>$this->accommodation_duration, "accommodation_finish_date"=>$this->accommodation_finish_date, "accommodation_fee_value"=>$this->accommodation_fee_value, "accommodation_value"=>$this->accommodation_value, "required_insurance_value"=>$this->required_insurance_value, "airport_transfer_value"=>$this->airport_transfer_value, "extra_nights"=>$this->extra_nights));
		}		
		//insere o atendimento no banco de dados
        function insert_deal_course(){
            $fields ="deal_course_opportunity_id,deal_course_user_id,country,school,city,neighbourhood,course_name,lessons_per_week,lesson_duration,start_date,duration,finish_date,currency_code,banking_fee_value,registration_fee_value,course_value,material_fee_value,others_value,accommodation_type,room,meals,accommodation_start_date,accommodation_duration,accommodation_finish_date,accommodation_fee_value,accommodation_value,required_insurance_value,airport_transfer_value,extra_nights";
            $db= new DB();
            $insert=$db->query("INSERT INTO digitulus_deal_course(".$fields.") VALUES(:deal_course_opportunity_id, :deal_course_user_id, :country, :school, :city, :neighbourhood, :course_name, :lessons_per_week, :lesson_duration, :start_date, :duration, :finish_date, :currency_code, :banking_fee_value, :registration_fee_value, :course_value, :material_fee_value, :others_value, :accommodation_type, :room, :meals, :accommodation_start_date, :accommodation_duration, :accommodation_finish_date, :accommodation_fee_value, :accommodation_value, :required_insurance_value, :airport_transfer_value, :extra_nights)", array("deal_course_opportunity_id"=>$this->deal_course_opportunity_id, "deal_course_user_id"=>$this->deal_course_user_id, "country"=>$this->country, "school"=>$this->school, "city"=>$this->city, "neighbourhood"=>$this->neighbourhood, "course_name"=>$this->course_name, "lessons_per_week"=>$this->lessons_per_week, "lesson_duration"=>$this->lesson_duration, "start_date"=>$this->start_date, "duration"=>$this->duration, "finish_date"=>$this->finish_date, "currency_code"=>$this->currency_code, "banking_fee_value"=>$this->banking_fee_value, "registration_fee_value"=>$this->registration_fee_value, "course_value"=>$this->course_value, "material_fee_value"=>$this->material_fee_value, "others_value"=>$this->others_value, "accommodation_type"=>$this->accommodation_type, "room"=>$this->room, "meals"=>$this->meals, "accommodation_start_date"=>$this->accommodation_start_date, "accommodation_duration"=>$this->accommodation_duration, "accommodation_finish_date"=>$this->accommodation_finish_date, "accommodation_fee_value"=>$this->accommodation_fee_value, "accommodation_value"=>$this->accommodation_value, "required_insurance_value"=>$this->required_insurance_value, "airport_transfer_value"=>$this->airport_transfer_value, "extra_nights"=>$this->extra_nights));
            //pega o último id inserido
            $last_id=$db->query("SELECT LAST_INSERT_ID()");
            //retorna o último id inserido
            return $last_id;
        }
    }
?>