<?php
	include_once "db.class.php";
	
	$db = new DB();
	$sql=$db->row("SELECT * FROM digitulus_country_list WHERE country_en = :ce", array("ce" => $_POST['airport_country_en']));
	$key = "false";
	
	if($sql!=""){
        $key = "true";
    }
   
	echo $key;
    
?>