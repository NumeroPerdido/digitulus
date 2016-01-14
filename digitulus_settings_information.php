<?php
	include_once "digitulus_settings.class.php";
	include_once "insurance.class.php";
	$digitulus_settings = new Digitulus_settings();
	$digitulus_settings_insurance = new Insurance();
	$digitulus_settings->digitulus_settings_id = $_GET['digitulus_settings_id'];
	$digitulus_settings->wire_fee_value = $_POST['wire_fee_value'];
	$digitulus_settings->iof_rate = $_POST['iof_rate'];
	$digitulus_settings->phi = $_POST['phi'];
	$digitulus_settings->exchange_margin = $_POST['exchange_margin'];
	$digitulus_settings->internet_transfer_fee = $_POST['internet_transfer_fee'];
	$digitulus_settings->us_canada_net_insurance_per_day = $_POST['us_canada_net_insurance_per_day'];
	$digitulus_settings->world_net_insurance_per_day = $_POST['world_net_insurance_per_day'];
	$digitulus_settings->ireland_insurance_default = $_POST['ireland_insurance_default'];
	$digitulus_settings->oshc_per_month = $_POST['oshc_per_month'];
	$digitulus_settings->new_up_to = $_POST['new_up_to'];
	$digitulus_settings->issuance_fee = $_POST['issuance_fee'];	
	$digitulus_settings->update_digitulus_settings();
	$digitulus_settings_insurance->update_settings_insurance($digitulus_settings->us_canada_net_insurance_per_day, $digitulus_settings->world_net_insurance_per_day, $digitulus_settings->ireland_insurance_default, $digitulus_settings->oshc_per_month);
    header('Location:index.php?page=Editar-Configuracoes&success=edit');
		
	