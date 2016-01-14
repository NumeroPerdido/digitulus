<?php
	include_once "budget.class.php";
	$budget= new Budget();
	$budget->sku = $_POST['sku'];
	$budget->currency_id = $_POST['currency_id'];
	$budget->course_duration_value = $_POST['course_duration_value'];
	$budget->course_gross_per_week = $_POST['course_gross_per_week'];
	$budget->course_promo_per_week = $_POST['course_promo_per_week'];
	$budget->course_commission = $_POST['course_commission'];
	$budget->accommodation_duration_value = $_POST['accommodation_duration_value'];
	$budget->accommodation_per_week = $_POST['accommodation_per_week'];
	$budget->discount_accommodation = $_POST['discount_accommodation'];
	$budget->accommodation_commission = $_POST['accommodation_commission'];
	$budget->material_fee_value = $_POST['material_fee_value'];
	$budget->registration_fee_value = $_POST['registration_fee_value'];
	$budget->accommodation_fee_value = $_POST['accommodation_fee_value'];
	$budget->exam_fee_value = $_POST['exam_fee_value'];
	$budget->student_service_fee_value = $_POST['student_service_fee_value'];
	$budget->courier_fee_value = $_POST['courier_fee_value'];
	$budget->airport_transfer_value = $_POST['airport_transfer_value'];
	$budget->discount_fees_value = $_POST['discount_fees_value'];
	$budget->required_insurance_real = $_POST['required_insurance_real'];
	$budget->factor_profit = $_POST['factor_profit'];
	$budget->iata_arrival_at = $_POST['iata_arrival_at'];
	$budget->price = $_POST['price'];
	$budget->special_price = $_POST['special_price'];
	$budget->cost = $_POST['cost'];
	$budget->special_from_date = $_POST['special_from_date'];
	$budget->special_to_date = $_POST['special_to_date'];
	if(isset($_GET["sku"]))
	{
		$budget->update_budget();
		echo "<script language=\"JavaScript\">;
					alert(\"Orçamento atualizado com sucesso!\");
					document.location.href = 'index.php?page=Lista-de-Orcamentos';
					</script>";
	}
	else
	{		
		$budget->insert_budget();
		echo "<script language=\"JavaScript\">;
					alert(\"Orçamento cadastrado com sucesso!\");
					document.location.href = 'index.php?page=Adicionar-Orcamento';
					</script>";
	}