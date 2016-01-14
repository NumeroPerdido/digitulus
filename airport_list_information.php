<?php
	include_once "airport_list.class.php";
	$airport_list = new Airport_list();

if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                
               $airport_list->airport_iata_code= $_POST["airport_iata_code"];
		       $airport_list->airport_name= $_POST['airport_name'];
		       $airport_list->airport_name_pt = $_POST['airport_name_pt'];
		       $airport_list->airport_city_en = $_POST['airport_city_en'];
		       $airport_list->airport_city_pt = $_POST['airport_city_pt'];
		       $airport_list->airport_country_en = $_POST['airport_country_en'];
               $airport_list->geopolitical_division = $_POST['geopolitical_division'];
		       $airport_list->insert_airport_list();
                header('Location:index.php?page=Lista-de-Aeroportos&success=add');
            }
            elseif ($operation =="edit")
            {
          
                $airport_list->airport_iata_code= $_POST["airport_iata_code"];
		        $airport_list->airport_name= $_POST['airport_name'];
		        $airport_list->airport_name_pt = $_POST['airport_name_pt'];
		        $airport_list->airport_city_en = $_POST['airport_city_en'];
		        $airport_list->airport_city_pt = $_POST['airport_city_pt'];
		        $airport_list->airport_country_en = $_POST['airport_country_en'];
                $airport_list->geopolitical_division = $_POST['geopolitical_division'];
		        $airport_list->update_airport_list();
                header('Location:index.php?page=Lista-de-Aeroportos&success=edit');
            }
            elseif ($operation =="delete") 
            {
               $airport_list->airport_iata_code= $_GET["airport_iata_code"];
		       $airport_list->delete_airport_list($airport_list->airport_iata_code);
               header('Location:index.php?page=Lista-de-Aeroportos&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Aeroportos';
					</script>";
            }
    }








