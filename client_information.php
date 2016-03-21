<?php
	include_once "client.class.php";
    $client= new Client();
    $mother= new Client();
	$father= new Client();
    //se o $_POST["client_id"] está vazio, quer dizer que o usuario esta adicionando o  novo cliente
    if ($_POST['client_id'] == ""){
        //Insere cliente
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
        $client->client_contact_email = $_POST['client_contact_email'];
        $client->client_future_opportunities = $_POST['client_future_opportunities'];
        $client->insert_client();
        //Se o Id do pai foi setado, ás informções do pai são editadas, Caso contrario um novo registro é criado e o pai é inserido
        if($_POST["father_id"]!=""){
            $father->get_client($_POST["father_id"]);
            $father->client_surname = $_POST['father_surname'];
            $father->client_name = $_POST['father_name'];
            $father->client_phone = $_POST['father_phone'];
            $father->client_mobile = $_POST['father_mobile'];                
            $father->client_email = $_POST['father_email'];
            $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
            $father->client_date_of_birth = $_POST['father_date_of_birth'];
            $father->client_address = $_POST['father_address'];
            $father->client_neighbourhood = $_POST['father_neighbourhood'];
            $father->client_city = $_POST['father_city'];
            $father->client_state = $_POST['father_state'];
            $father->client_cep = $_POST['father_cep'];
            $father->client_gender = $_POST['father_gender']; 
            $father->client_civil_status = $_POST['father_civil_status'];                 
            $father->client_profession = $_POST['father_profession'];                               
            $father->client_passport = $_POST['father_passport'];
            $father->client_passport_expire_date = $_POST['father_passport_expire_date'];
            $father->client_cpf = $_POST['father_cpf'];
            $father->client_rg = $_POST['father_rg'];
            $father->client_other_information = $_POST['father_other_information'];                
            $father->client_contact_name = $_POST['father_contact_name'];
            $father->client_contact_relation = $_POST['father_contact_relation'];
            $father->client_contact_phone = $_POST['father_contact_phone'];
            $father->client_contact_email = $_POST['father_contact_email'];
            $father->update_client();
        }
        elseif($_POST['father_surname']!="" && $_POST['father_name']!=""){
            $father->client_surname = $_POST['father_surname'];
            $father->client_name = $_POST['father_name'];
            $father->client_phone = $_POST['father_phone'];
            $father->client_mobile = $_POST['father_mobile'];                
            $father->client_email = $_POST['father_email'];
            $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
            $father->client_date_of_birth = $_POST['father_date_of_birth'];
            $father->client_address = $_POST['father_address'];
            $father->client_neighbourhood = $_POST['father_neighbourhood'];
            $father->client_city = $_POST['father_city'];
            $father->client_state = $_POST['father_state'];
            $father->client_cep = $_POST['father_cep'];
            $father->client_gender = $_POST['father_gender']; 
            $father->client_civil_status = $_POST['father_civil_status'];                 
            $father->client_profession = $_POST['father_profession'];                               
            $father->client_passport = $_POST['father_passport'];
            $father->client_passport_expire_date = $_POST['father_passport_expire_date'];
            $father->client_cpf = $_POST['father_cpf'];
            $father->client_rg = $_POST['father_rg'];
            $father->client_other_information = $_POST['father_other_information'];                
            $father->client_contact_name = $_POST['father_contact_name'];
            $father->client_contact_relation = $_POST['father_contact_relation'];
            $father->client_contact_phone = $_POST['father_contact_phone'];
            $father->client_contact_email = $_POST['father_contact_email'];
            $father->insert_client();
        }
        //Se o Id da mãefoi setado, ás informções da mãe são editadas, Caso contrario um novo registro é criado e a mãe é inserido
        if($_POST["mother_id"]!=""){
            $mother->get_client($_POST["mother_id"]);
            $mother->client_surname = $_POST['mother_surname'];
            $mother->client_name = $_POST['mother_name'];
            $mother->client_phone = $_POST['mother_phone'];
            $mother->client_mobile = $_POST['mother_mobile'];                
            $mother->client_email = $_POST['mother_email'];
            $mother->client_how_to_reach_us = $_POST['mother_how_to_reach_us'];                
            $mother->client_date_of_birth = $_POST['mother_date_of_birth'];
            $mother->client_address = $_POST['mother_address'];
            $mother->client_neighbourhood = $_POST['mother_neighbourhood'];
            $mother->client_city = $_POST['mother_city'];
            $mother->client_state = $_POST['mother_state'];
            $mother->client_cep = $_POST['mother_cep'];
            $mother->client_gender = $_POST['mother_gender']; 
            $mother->client_civil_status = $_POST['mother_civil_status'];                 
            $mother->client_profession = $_POST['mother_profession'];                               
            $mother->client_passport = $_POST['mother_passport'];
            $mother->client_passport_expire_date = $_POST['mother_passport_expire_date'];
            $mother->client_cpf = $_POST['mother_cpf'];
            $mother->client_rg = $_POST['mother_rg'];
            $mother->client_other_information = $_POST['mother_other_information'];                
            $mother->client_contact_name = $_POST['mother_contact_name'];
            $mother->client_contact_relation = $_POST['mother_contact_relation'];
            $mother->client_contact_phone = $_POST['mother_contact_phone'];
            $mother->client_contact_email = $_POST['mother_contact_email'];
            $mother->update_client();
        }
        elseif($_POST['mother_surname']!="" && $_POST['mother_name']!=""){
            $mother->client_surname = $_POST['mother_surname'];
            $mother->client_name = $_POST['mother_name'];
            $mother->client_phone = $_POST['mother_phone'];
            $mother->client_mobile = $_POST['mother_mobile'];                
            $mother->client_email = $_POST['mother_email'];
            $mother->client_how_to_reach_us = $_POST['mother_how_to_reach_us'];                
            $mother->client_date_of_birth = $_POST['mother_date_of_birth'];
            $mother->client_address = $_POST['mother_address'];
            $mother->client_neighbourhood = $_POST['mother_neighbourhood'];
            $mother->client_city = $_POST['mother_city'];
            $mother->client_state = $_POST['mother_state'];
            $mother->client_cep = $_POST['mother_cep'];
            $mother->client_gender = $_POST['mother_gender']; 
            $mother->client_civil_status = $_POST['mother_civil_status'];                 
            $mother->client_profession = $_POST['mother_profession'];                               
            $mother->client_passport = $_POST['mother_passport'];
            $mother->client_passport_expire_date = $_POST['mother_passport_expire_date'];
            $mother->client_cpf = $_POST['mother_cpf'];
            $mother->client_rg = $_POST['mother_rg'];
            $mother->client_other_information = $_POST['mother_other_information'];                
            $mother->client_contact_name = $_POST['mother_contact_name'];
            $mother->client_contact_relation = $_POST['mother_contact_relation'];
            $mother->client_contact_phone = $_POST['mother_contact_phone'];
            $mother->client_contact_email = $_POST['mother_contact_email'];
            $mother->insert_client();
        }
        //Cria a Relação Familiar do Client
        $client->insert_family_relation($father->client_id,$mother->client_id);
        header('Location:index.php?page=Lista-de-Clientes&success=add');
    }
    //se $_POST['client_id'] não está vazio quer dizer que o o clinte já existe e aperação é de edição
    else{
        $client->get_client($_POST["client_id"]);
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
        $client->client_contact_email = $_POST['mother_contact_email'];
        $client->client_future_opportunities = $_POST['client_future_opportunities'];
	    $client->update_client();

        //Se o Id do pai foi setado, ás informções do pai são editadas, Caso contrario um novo registro é criado e o pai é inserido
        if($_POST["father_id"]!=""){
            $father->get_client($_POST["father_id"]);
            $father->client_surname = $_POST['father_surname'];
            $father->client_name = $_POST['father_name'];
            $father->client_phone = $_POST['father_phone'];
            $father->client_mobile = $_POST['father_mobile'];                
            $father->client_email = $_POST['father_email'];
            $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
            $father->client_date_of_birth = $_POST['father_date_of_birth'];
            $father->client_address = $_POST['father_address'];
            $father->client_neighbourhood = $_POST['father_neighbourhood'];
            $father->client_city = $_POST['father_city'];
            $father->client_state = $_POST['father_state'];
            $father->client_cep = $_POST['father_cep'];
            $father->client_gender = $_POST['father_gender']; 
            $father->client_civil_status = $_POST['father_civil_status'];                 
            $father->client_profession = $_POST['father_profession'];                               
            $father->client_passport = $_POST['father_passport'];
            $father->client_passport_expire_date = $_POST['father_passport_expire_date'];
            $father->client_cpf = $_POST['father_cpf'];
            $father->client_rg = $_POST['father_rg'];
            $father->client_other_information = $_POST['father_other_information'];                
            $father->client_contact_name = $_POST['father_contact_name'];
            $father->client_contact_relation = $_POST['father_contact_relation'];
            $father->client_contact_phone = $_POST['father_contact_phone'];
            $father->client_contact_email = $_POST['father_contact_email'];
            $father->update_client();
        }
        elseif($_POST['father_surname']!="" && $_POST['father_name']!=""){
            $father->client_surname = $_POST['father_surname'];
            $father->client_name = $_POST['father_name'];
            $father->client_phone = $_POST['father_phone'];
            $father->client_mobile = $_POST['father_mobile'];                
            $father->client_email = $_POST['father_email'];
            $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
            $father->client_date_of_birth = $_POST['father_date_of_birth'];
            $father->client_address = $_POST['father_address'];
            $father->client_neighbourhood = $_POST['father_neighbourhood'];
            $father->client_city = $_POST['father_city'];
            $father->client_state = $_POST['father_state'];
            $father->client_cep = $_POST['father_cep'];
            $father->client_gender = $_POST['father_gender']; 
            $father->client_civil_status = $_POST['father_civil_status'];                 
            $father->client_profession = $_POST['father_profession'];                               
            $father->client_passport = $_POST['father_passport'];
            $father->client_passport_expire_date = $_POST['father_passport_expire_date'];
            $father->client_cpf = $_POST['father_cpf'];
            $father->client_rg = $_POST['father_rg'];
            $father->client_other_information = $_POST['father_other_information'];                
            $father->client_contact_name = $_POST['father_contact_name'];
            $father->client_contact_relation = $_POST['father_contact_relation'];
            $father->client_contact_phone = $_POST['father_contact_phone'];
            $father->client_contact_email = $_POST['father_contact_email'];
            $father->insert_client();
        }
        //Se o Id da mãefoi setado, ás informções da mãe são editadas, Caso contrario um novo registro é criado e a mãe é inserido
        if($_POST["mother_id"]!=""){
            $mother->get_client($_POST["mother_id"]);
            $mother->client_surname = $_POST['mother_surname'];
            $mother->client_name = $_POST['mother_name'];
            $mother->client_phone = $_POST['mother_phone'];
            $mother->client_mobile = $_POST['mother_mobile'];                
            $mother->client_email = $_POST['mother_email'];
            $mother->client_how_to_reach_us = $_POST['mother_how_to_reach_us'];                
            $mother->client_date_of_birth = $_POST['mother_date_of_birth'];
            $mother->client_address = $_POST['mother_address'];
            $mother->client_neighbourhood = $_POST['mother_neighbourhood'];
            $mother->client_city = $_POST['mother_city'];
            $mother->client_state = $_POST['mother_state'];
            $mother->client_cep = $_POST['mother_cep'];
            $mother->client_gender = $_POST['mother_gender']; 
            $mother->client_civil_status = $_POST['mother_civil_status'];                 
            $mother->client_profession = $_POST['mother_profession'];                               
            $mother->client_passport = $_POST['mother_passport'];
            $mother->client_passport_expire_date = $_POST['mother_passport_expire_date'];
            $mother->client_cpf = $_POST['mother_cpf'];
            $mother->client_rg = $_POST['mother_rg'];
            $mother->client_other_information = $_POST['mother_other_information'];                
            $mother->client_contact_name = $_POST['mother_contact_name'];
            $mother->client_contact_relation = $_POST['mother_contact_relation'];
            $mother->client_contact_phone = $_POST['mother_contact_phone'];
            $mother->client_contact_email = $_POST['mother_contact_email'];
            $mother->update_client();
        }
        elseif($_POST['mother_surname']!="" && $_POST['mother_name']!=""){
            $mother->client_surname = $_POST['mother_surname'];
            $mother->client_name = $_POST['mother_name'];
            $mother->client_phone = $_POST['mother_phone'];
            $mother->client_mobile = $_POST['mother_mobile'];                
            $mother->client_email = $_POST['mother_email'];
            $mother->client_how_to_reach_us = $_POST['mother_how_to_reach_us'];                
            $mother->client_date_of_birth = $_POST['mother_date_of_birth'];
            $mother->client_address = $_POST['mother_address'];
            $mother->client_neighbourhood = $_POST['mother_neighbourhood'];
            $mother->client_city = $_POST['mother_city'];
            $mother->client_state = $_POST['mother_state'];
            $mother->client_cep = $_POST['mother_cep'];
            $mother->client_gender = $_POST['mother_gender']; 
            $mother->client_civil_status = $_POST['mother_civil_status'];                 
            $mother->client_profession = $_POST['mother_profession'];                               
            $mother->client_passport = $_POST['mother_passport'];
            $mother->client_passport_expire_date = $_POST['mother_passport_expire_date'];
            $mother->client_cpf = $_POST['mother_cpf'];
            $mother->client_rg = $_POST['mother_rg'];
            $mother->client_other_information = $_POST['mother_other_information'];                
            $mother->client_contact_name = $_POST['mother_contact_name'];
            $mother->client_contact_relation = $_POST['mother_contact_relation'];
            $mother->client_contact_phone = $_POST['mother_contact_phone'];
            $mother->client_contact_email = $_POST['mother_contact_email'];
            $mother->insert_client();
        }
        //Cria a Relação Familiar do Client
        $client->insert_family_relation($father->client_id,$mother->client_id);
        header('Location:index.php?page=Lista-de-Clientes&success=edit');
    }





	