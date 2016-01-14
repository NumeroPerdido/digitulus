<?php

//$var = mysql_real_escape_string($_GET['var']);
//
//$mysqli = new mysqli('localhost', 'root', '', 'digitulus');
//
////connection to the database
//$dbhandle = mysql_connect('localhost', 'root', '')
//  or die("Unable to connect to MySQL");
//
////select a database to work with
//$selected = mysql_select_db("digitulus",$dbhandle)
//  or die("Could not select digitulus");
//
////execute the SQL query and return records
//$result = mysql_query("SELECT airport_city_pt FROM digitulus_airport_list WHERE airport_iata_code='$var'");
////fetch tha data from the database
//
////echo $result;
//echo "entrei auqi";
////close the connection
//mysql_close($dbhandle);
if(isset($_GET["iata_arrival_at"])){
 $iata_arrival_at= $_GET["iata_arrival_at"];  
}
include "airport_list.class.php";
$airport= new Airport_list();
$airport->get_airport_list_country_pt($iata_arrival_at);
echo json_encode($airport);

?>