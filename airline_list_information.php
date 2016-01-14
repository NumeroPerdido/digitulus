<?php
	include_once "airline_list.class.php";
	$airline_list = new Airline_list();


if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                
                $airline_list->airline_iata_code = $_POST['airline_iata_code'];
                $airline_list->airline_name= $_POST['airline_name'];
		        $airline_list->airline_country_en = $_POST['airline_country_en'];
                $airline_list->insert_airline_list();
                header('Location:index.php?page=Lista-de-Companhias-Aereas&success=add');
            }
            elseif ($operation =="edit")
            {
          
         
		        $airline_list->airline_iata_code = $_POST['airline_iata_code'];
                $airline_list->airline_name= $_POST['airline_name'];
		        $airline_list->airline_country_en = $_POST['airline_country_en'];
                $airline_list->update_airline_list();
               
                header('Location:index.php?page=Lista-de-Companhias-Aereas&success=edit');
            }
            elseif ($operation =="delete") 
            {
              
                $airline_iata_code = $_GET["airline_iata_code"];
		        $airline_list->delete_airline_list($airline_iata_code);
                header('Location:index.php?page=Lista-de-Companhias-Aereas&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Companhias-Aereas';
					</script>";
            }
    }