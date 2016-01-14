<?php
	include_once "client.class.php";
	$client= new Client();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                $client->client_surname = $_POST['client_surname'];
                $client->client_name = $_POST['client_name'];
                $client->client_phone = $_POST['client_phone'];
                $client->client_mobile = $_POST['client_mobile'];                
                $client->client_email = $_POST['client_email'];
                $client->client_how_to_reach_us = $_POST['client_how_to_reach_us'];                
                $client->client_date_of_birth = $_POST['client_date_of_birth'];
                $client->client_address = $_POST['client_address'];
                $client->client_neighbourhood = $_POST['client_neighbourhood'];
                $client->client_city = $_POST['client_city'];
                $client->client_state = $_POST['client_state'];
                $client->client_cep = $_POST['client_cep'];
                $client->client_gender = $_POST['client_gender']; 
                $client->client_civil_status = $_POST['client_civil_status'];                 
                $client->client_profession = $_POST['client_profession'];                               
                $client->client_passport = $_POST['client_passport'];
                $client->client_passport_expire_date = $_POST['client_passport_expire_date'];
                $client->client_cpf = $_POST['client_cpf'];
                $client->client_rg = $_POST['client_rg'];
                $client->client_other_information = $_POST['client_other_information'];                
                $client->client_contact_name = $_POST['client_contact_name'];
                $client->client_contact_relation = $_POST['client_contact_relation'];
                $client->client_contact_phone = $_POST['client_contact_phone'];
                $client->client_future_opportunities = $_POST['client_future_opportunities'];
			    $client->insert_client();
                header('Location:index.php?page=Lista-de-Clientes&success=add');
            }
            elseif ($operation =="edit")
            {
                $client->get_client($_GET["client_id"]);
                $client->client_surname = $_POST['client_surname'];
                $client->client_name = $_POST['client_name'];
                $client->client_phone = $_POST['client_phone'];
                $client->client_mobile = $_POST['client_mobile'];                
                $client->client_email = $_POST['client_email'];
                $client->client_how_to_reach_us = $_POST['client_how_to_reach_us'];                
                $client->client_date_of_birth = $_POST['client_date_of_birth'];
                $client->client_address = $_POST['client_address'];
                $client->client_neighbourhood = $_POST['client_neighbourhood'];
                $client->client_city = $_POST['client_city'];
                $client->client_state = $_POST['client_state'];
                $client->client_cep = $_POST['client_cep'];
                $client->client_gender = $_POST['client_gender']; 
                $client->client_civil_status = $_POST['client_civil_status']; 
                $client->client_profession = $_POST['client_profession'];                               
                $client->client_passport = $_POST['client_passport'];
                $client->client_passport_expire_date = $_POST['client_passport_expire_date'];
                $client->client_cpf = $_POST['client_cpf'];
                $client->client_rg = $_POST['client_rg'];
                $client->client_other_information = $_POST['client_other_information'];                
                $client->client_contact_name = $_POST['client_contact_name'];
                $client->client_contact_relation = $_POST['client_contact_relation'];
                $client->client_contact_phone = $_POST['client_contact_phone'];
                $client->client_future_opportunities = $_POST['client_future_opportunities'];
			    $client->update_client();
              
                header('Location:index.php?page=Lista-de-Clientes&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $client->client_id = $_GET["client_id"];
                $client->delete_client($client->client_id);
                header('Location:index.php?page=Lista-de-Clientes&success=delete'); 
            } 
            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Clientes';
					</script>";
            }
    }






	