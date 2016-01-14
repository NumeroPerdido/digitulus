<?php
    include_once "country_list.class.php";
	$country_en = new Country_list();
if(isset($_POST["airline_country_en"])){
    $country=$_POST["airline_country_en"];
}
if(isset($_POST["airport_country_en"])){
    $country=$_POST["airport_country_en"];
}
	$sql=$country_en->get_country_list_en($country);
	$country_exists = "false";
	
	//Caso a busca retorne resultado, significa que o país existe no banco.
	if($sql!=""){
        $country_exists = "true";
    }
	echo $country_exists;
    
?>