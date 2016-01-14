<?php
$mysqli = new mysqli('localhost', 'root', '', 'digitulus');
$text = $mysqli->real_escape_string($_GET['term']);

$query = "SELECT DISTINCT country_pt FROM digitulus_country_list WHERE country_pt LIKE '%$text%' ORDER BY country_pt ASC";
$result = $mysqli->query($query);
$json = '[';
$first = true;
while($row = $result->fetch_assoc())
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row['country_pt'].'"}';
}
$json .= ']';
echo $json;

