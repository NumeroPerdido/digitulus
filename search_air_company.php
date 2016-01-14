<?php
include_once "db.class.php";
$text = $_GET['term'];
$tabela = $_GET['tabela'];
$campo = $_GET['campo'];

$db = new DB();
$sql = "SELECT DISTINCT air_company FROM digitulus_flight WHERE air_company LIKE '%$text%' ORDER BY air_company ASC";
$json = '[';
$first = true; 

foreach ($db->query($sql) as $row) 
 {
	if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row['air_company'].'"}';
        
        
   }

$json .= ']';

echo $json;
