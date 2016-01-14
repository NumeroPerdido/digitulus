<?php
   include_once "db.class.php";
    class Budget{
		var $sku_budget;
		var $currency_code;
		var $course_duration_value;
		var $course_gross_per_week;
		var $course_promo_per_week;
		var $course_commission;
		var $accommodation_duration_value;
		var $accommodation_per_week;
		var $discount_accommodation;
		var $accommodation_commission;
		var $material_fee_value;
		var $registration_fee_value;
		var $accommodation_fee_value;
		var $exam_fee_value;
		var $student_service_fee_value;
		var $courier_fee_value;
		var $airport_transfer_value;
		var $discount_fees_value;
		var $required_insurance_value;
		var $factor_profit;
		var $iata_arrival_at;
		var $price;
		var $special_price;
		var $cost;
		var $special_from_date;
		var $special_to_date;

        //construtor da classe
        function __construct(){		
				
        }
        //função apara carregar dados do banco
       function get_budget($sku_budget){
            $db = new DB();
            $sql=$db->row("SELECT * FROM digitulus_budget WHERE sku_budget= :s", array("s" => $sku_budget));            
			$this->sku_budget=$sql["sku_budget"];
			$this->currency_code=$sql["currency_code"];
			$this->course_duration_value=$sql["course_duration_value"];
			$this->course_gross_per_week=$sql["course_gross_per_week"];
			$this->course_promo_per_week=$sql["course_promo_per_week"];
			$this->course_commission=$sql["course_commission"];
			$this->accommodation_duration_value=$sql["accommodation_duration_value"];
			$this->accommodation_per_week=$sql["accommodation_per_week"];
			$this->discount_accommodation=$sql["discount_accommodation"];
			$this->accommodation_commission=$sql["accommodation_commission"];
			$this->material_fee_value=$sql["material_fee_value"];
			$this->registration_fee_value=$sql["registration_fee_value"];
			$this->accommodation_fee_value=$sql["accommodation_fee_value"];
			$this->exam_fee_value=$sql["exam_fee_value"];
			$this->student_service_fee_value=$sql["student_service_fee_value"];
			$this->courier_fee_value=$sql["courier_fee_value"];
			$this->airport_transfer_value=$sql["airport_transfer_value"];
			$this->discount_fees_value=$sql["discount_fees_value"];
			$this->required_insurance_value=$sql["required_insurance_value"];
			$this->factor_profit=$sql["factor_profit"];
			$this->iata_arrival_at=$sql["iata_arrival_at"];
			$this->price=$sql["price"];
			$this->special_price=$sql["special_price"];
			$this->cost=$sql["cost"];
			$this->special_from_date=$sql["special_from_date"];			
			$this->special_to_date=$sql["special_to_date"];
            return($sql);
        }
		function analisar()
		{
			$db= new DB();
			$sql=$db->row("SELECT * FROM digitulus_budget WHERE sku_budget ='" . $this->sku_budget . "'");
			if (sizeof($sql) > 1)
				{
					$this->update_budget();
				}
				else 
				{
					$this->insert_budget();
				}	
			
		}
		//atualiza budget no banco de dados
		function update_budget(){
			$db = new DB();
            $sql=$db->query("UPDATE digitulus_budget SET currency_code = :currency_code, course_duration_value = :course_duration_value, course_gross_per_week = :course_gross_per_week, course_promo_per_week = :course_promo_per_week, course_commission = :course_commission, accommodation_duration_value = :accommodation_duration_value, accommodation_per_week = :accommodation_per_week, discount_accommodation = :discount_accommodation, accommodation_commission = :accommodation_commission, material_fee_value = :material_fee_value, registration_fee_value = :registration_fee_value, accommodation_fee_value = :accommodation_fee_value, exam_fee_value = :exam_fee_value, student_service_fee_value = :student_service_fee_value, courier_fee_value = :courier_fee_value, airport_transfer_value = :airport_transfer_value, discount_fees_value = :discount_fees_value, required_insurance_value = :required_insurance_value, factor_profit = :factor_profit, iata_arrival_at = :iata_arrival_at, price = :price, special_price = :special_price, cost = :cost, special_from_date = :special_from_date, special_to_date = :special_to_date WHERE sku_budget = :sku_budget", array("sku_budget"=>$this->sku_budget, "currency_code"=>$this->currency_code, "course_duration_value"=>$this->course_duration_value, "course_gross_per_week"=>$this->course_gross_per_week, "course_promo_per_week"=>$this->course_promo_per_week, "course_commission"=>$this->course_commission, "accommodation_duration_value"=>$this->accommodation_duration_value, "accommodation_per_week"=>$this->accommodation_per_week, "discount_accommodation"=>$this->discount_accommodation, "accommodation_commission"=>$this->accommodation_commission, "material_fee_value"=>$this->material_fee_value, "registration_fee_value"=>$this->registration_fee_value, "accommodation_fee_value"=>$this->accommodation_fee_value, "exam_fee_value"=>$this->exam_fee_value, "student_service_fee_value"=>$this->student_service_fee_value, "courier_fee_value"=>$this->courier_fee_value, "airport_transfer_value"=>$this->airport_transfer_value, "discount_fees_value"=>$this->discount_fees_value, "required_insurance_value"=>$this->required_insurance_value, "factor_profit"=>$this->factor_profit, "iata_arrival_at"=>$this->iata_arrival_at, "price"=>$this->price, "special_price"=>$this->special_price, "cost"=>$this->cost, "special_from_date"=>$this->special_from_date, "special_to_date"=>$this->special_to_date));
		}	
		//insere novo orçamento no banco de dados		
        function insert_budget(){
            $fields ="sku_budget, currency_code, course_duration_value, course_gross_per_week, course_promo_per_week, course_commission, accommodation_duration_value, accommodation_per_week, discount_accommodation, accommodation_commission, material_fee_value, registration_fee_value, accommodation_fee_value, exam_fee_value, student_service_fee_value, courier_fee_value, airport_transfer_value, discount_fees_value, required_insurance_value, factor_profit, iata_arrival_at, price, special_price, cost, special_from_date, special_to_date";
            $db= new DB();
			$insert=$db->query("INSERT INTO digitulus_budget(".$fields.") VALUES(:sku_budget, :currency_code, :course_duration_value, :course_gross_per_week, :course_promo_per_week, :course_commission, :accommodation_duration_value, :accommodation_per_week, :discount_accommodation, :accommodation_commission, :material_fee_value, :registration_fee_value, :accommodation_fee_value, :exam_fee_value, :student_service_fee_value, :courier_fee_value, :airport_transfer_value, :discount_fees_value, :required_insurance_value, :factor_profit, :iata_arrival_at, :price, :special_price, :cost, :special_from_date, :special_to_date)", array("sku_budget"=>$this->sku_budget, "currency_code"=>$this->currency_code, "course_duration_value"=>$this->course_duration_value, "course_gross_per_week"=>$this->course_gross_per_week, "course_promo_per_week"=>$this->course_promo_per_week, "course_commission"=>$this->course_commission, "accommodation_duration_value"=>$this->accommodation_duration_value, "accommodation_per_week"=>$this->accommodation_per_week, "discount_accommodation"=>$this->discount_accommodation, "accommodation_commission"=>$this->accommodation_commission, "material_fee_value"=>$this->material_fee_value, "registration_fee_value"=>$this->registration_fee_value, "accommodation_fee_value"=>$this->accommodation_fee_value, "exam_fee_value"=>$this->exam_fee_value, "student_service_fee_value"=>$this->student_service_fee_value, "courier_fee_value"=>$this->courier_fee_value, "airport_transfer_value"=>$this->airport_transfer_value, "discount_fees_value"=>$this->discount_fees_value, "required_insurance_value"=>$this->required_insurance_value, "factor_profit"=>$this->factor_profit, "iata_arrival_at"=>$this->iata_arrival_at, "price"=>$this->price, "special_price"=>$this->special_price, "cost"=>$this->cost, "special_from_date"=>$this->special_from_date, "special_to_date"=>$this->special_to_date));
        }
    }
?>