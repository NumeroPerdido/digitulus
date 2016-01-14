<?php
	include_once "flight.class.php";
	$flight= new Flight();
 
           
	if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                
                $flight->arrival_at = $_POST['arrival_at'];
                $flight->iata_arrival_at = $_POST['iata_arrival_at'];
                $flight->country = $_POST['country'];
                $flight->flight_gross = $_POST['flight_gross'];
                $flight->departure_from = $_POST['departure_from'];
                $flight->flight_fare = $_POST['flight_fare'];
                $flight->airport_fee = $_POST['airport_fee'];
                $flight->flight_commission = $_POST['flight_commission'];
                $flight->flight_incentive = $_POST['flight_incentive'];
                $flight->total_flight_commission = $_POST['total_flight_commission'];
                $flight->flight_dates = $_POST['flight_dates'];
                $flight->air_company = $_POST['air_company'];
                $flight->flight_net = $_POST['flight_net'];
                $flight->flight_text = $_POST['flight_text'];
                $flight->insert_flight();
                header('Location:index.php?page=Lista-de-Voos&success=add');
            }
            elseif ($operation =="edit")
            {
                $flight->arrival_at = $_POST['arrival_at'];
                $flight->iata_arrival_at = $_POST['iata_arrival_at'];
                $flight->country = $_POST['country'];
                $flight->flight_gross = $_POST['flight_gross'];
                $flight->departure_from = $_POST['departure_from'];
                $flight->flight_fare = $_POST['flight_fare'];
                $flight->airport_fee = $_POST['airport_fee'];
                $flight->flight_commission = $_POST['flight_commission'];
                $flight->flight_incentive = $_POST['flight_incentive'];
                $flight->total_flight_commission = $_POST['total_flight_commission'];
                $flight->flight_dates = $_POST['flight_dates'];
                $flight->air_company = $_POST['air_company'];
                $flight->flight_net = $_POST['flight_net'];
                $flight->flight_text = $_POST['flight_text'];
                $iata_arrival_ats = $_GET['iata_arrival_ats'];
                
                $flight->update_flight($iata_arrival_ats);
                header('Location:index.php?page=Lista-de-Voos&success=edit');
            }
            elseif ($operation =="delete") 
            {
                
                   $iata_arrival_at = $_GET["iata_arrival_at"];
		           $flight->delete_flight($iata_arrival_at);
                   header('Location:index.php?page=Lista-de-Voos&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Voos';
					</script>";
            }
    }
?>