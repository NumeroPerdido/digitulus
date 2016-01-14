<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
session_start();

// DB table to use
$table = $_SESSION["table"];
$jointable="";

switch($table){
        
    case "digitulus_product":		$tb_col=array("sku","name","school","neighbourhood","city","country","course_duration","short_description","description","start_dates","holidays","accommodation_duration","accommodation_type","room","meals","registration_fee","material_fee","accommodation_fee","exam_fee","courier_fee","student_service_fee","banking_fees","airport_transfer","insurance","videoid","image_label","thumbnail","flight_conditions","flight_included","created_at","lessons_per_week","lesson_duration","meta_description","new","news_from_date","news_to_date","status","sale","visibility","requirements","whats_included","whats_not_included","url_key","language","status_digitulus","latitude","longitude","currency_code","course_duration_value","course_gross_per_week","course_promo_per_week","course_commission","accommodation_duration_value","accommodation_per_week","discount_accommodation","accommodation_commission","material_fee_value","registration_fee_value","accommodation_fee_value","exam_fee_value","student_service_fee_value","courier_fee_value","airport_transfer_value","discount_fees_value","required_insurance_value","default_factor_profit","factor_profit","iata_arrival_at","price","special_price","cost","special_from_date","special_to_date","sku","sku");
        $jointable="digitulus_budget";
        break;
        
    case "digitulus_user":
        $tb_col=array("user_id","username","email","user_id");
        break;
        
    case "digitulus_image":
        $tb_col=array("image_label","image_label","image_label","image_label","image_label",);
        break;
        
    case "digitulus_insurance":	$tb_col=array("insurance_duration","us_canada_extra_insurance_net_value","world_extra_insurance_net_value","extra_insurance_gross_value","ireland_insurance_value","oshc_insurance_value","insurance_duration","insurance_duration");
		break;
        
    case "digitulus_airport_list":	$tb_col=array("airport_iata_code","airport_name","airport_name_pt","airport_city_en","airport_city_pt","airport_country_en","geopolitical_division","airport_iata_code","airport_iata_code");
		break;
        
    case "digitulus_airline_list":
		$tb_col=array("airline_iata_code","airline_name","airline_country_en","airline_iata_code","airline_iata_code");
		break;
        
     case "digitulus_flight":		$tb_col=array("iata_arrival_at","arrival_at","country","departure_from","airport_fee","flight_gross","iata_arrival_at","iata_arrival_at");
        break;
        
    case "digitulus_duration":		$tb_col=array("standard_travel_duration","standard_travel_duration_name","australia_travel_duration","ireland_travel_duration","standard_travel_duration","standard_travel_duration");
		break;
    
    case "digitulus_client":
$tb_col=array("client_id","client_name","client_surname","client_phone","client_mobile","client_email","client_id","client_id");
        break;
        
    case "digitulus_opportunity":    $tb_col=array("opportunity_id","opportunity_title","opportunity_status","client_name","client_surname","client_phone","client_mobile","client_email","client_id","opportunity_user_id");
        $jointable="digitulus_client";
        break;
    case "digitulus_opportunity_complete":    $tb_col=array("opportunity_id","opportunity_title","client_name","client_surname","client_phone","client_email","opportunity_status","client_id","opportunity_user_id","opportunity_deal_date");
        $jointable="digitulus_client";
        $table="digitulus_opportunity";
        break;
    case "digitulus_activity":    
        $tb_col=array("activity_id","activity_date","activity_proposal","activity_answer","activity_opportunity_id");
        break;
}


// Table's primary key
$primaryKey = $tb_col[0];

//array com as colunas do bd que é retornado ao Datatables
//parametros bd é o nome da coluna no banco de dados, e a dt é o identificador da coluna no Datatables
for($i=0;$i<count($tb_col);$i++){
    $columns[]=array( 'db' => $tb_col[$i], 'dt' => $i );
}


// SQL server connection information
$settings=parse_ini_file("../settings.ini.php");
$sql_details = array(
	'user' => $settings["user"],
	'pass' => $settings["password"],
	'db'   => $settings["dbname"],
	'host' => $settings["host"]
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $jointable)
);



