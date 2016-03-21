<?php
	include_once "client.class.php";
	include_once "opportunity.class.php";
    include_once "activity.class.php";
    include_once "user.class.php";
    $client= new Client();
    $father= new Client();
	$mother= new Client();
    $activity= new Activity();
    $opportunity= new Opportunity();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                //seta as informações do cliente que foram passadas pelo formulário
                $client->client_surname = $_POST['client_surname'];
                $client->client_name = $_POST['client_name'];
                $client->client_phone = $_POST['client_phone'];
                $client->client_mobile = $_POST['client_mobile'];                
                $client->client_email = $_POST['client_email'];
                $client->client_how_to_reach_us = $_POST['client_how_to_reach_us'];
                //salva o cliente novo no banco de dados
                $resp=$client->insert_client();
                //recebe o último id que foi inserido na tabela digitulus_client
                $client_id=$resp[0]["LAST_INSERT_ID()"];

                //Se o Id do pai foi setado, ás informções do pai são editadas, Caso contrario um novo registro é criado e o pai é inserido
                if($_POST["father_id"]!=""){
                    $father->get_client($_POST["father_id"]);
                    $father->client_surname = $_POST['father_surname'];
                    $father->client_name = $_POST['father_name'];
                    $father->client_phone = $_POST['father_phone'];
                    $father->client_mobile = $_POST['father_mobile'];                
                    $father->client_email = $_POST['father_email'];
                    $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
                    $father->update_client();
                }
                elseif($_POST['father_surname']!="" && $_POST['father_name']!=""){
                    $father->client_surname = $_POST['father_surname'];
                    $father->client_name = $_POST['father_name'];
                    $father->client_phone = $_POST['father_phone'];
                    $father->client_mobile = $_POST['father_mobile'];                
                    $father->client_email = $_POST['father_email'];
                    $father->client_how_to_reach_us = $_POST['father_how_to_reach_us'];                
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
                    $mother->update_client();
                }
                elseif($_POST['mother_surname']!="" && $_POST['mother_name']!=""){
                    $mother->client_surname = $_POST['mother_surname'];
                    $mother->client_name = $_POST['mother_name'];
                    $mother->client_phone = $_POST['mother_phone'];
                    $mother->client_mobile = $_POST['mother_mobile'];                
                    $mother->client_email = $_POST['mother_email'];
                    $mother->client_how_to_reach_us = $_POST['mother_how_to_reach_us'];                
                    $mother->insert_client();
                }
                //cria a relação familiar
                $client->insert_family_relation($father->client_id,$mother->client_id);

                session_start();
                $opportunity->opportunity_user_id = $_SESSION["user"]->user_id;
                $opportunity->opportunity_title = $_POST['opportunity_title'];
                $opportunity->opportunity_description = $_POST['opportunity_description'];
                $opportunity->opportunity_status = $_POST['opportunity_status'];
                $opportunity->opportunity_client_id = $client_id;
			    //salva o opportunity no bd
                $resp=$opportunity->insert_opportunity();
                $opportunity_id=$resp[0]["LAST_INSERT_ID()"];
                
                $activity->activity_opportunity_id = $opportunity_id;
                $activity->activity_date = $_POST['activity_date'];
                $activity->activity_proposal = $_POST['activity_proposal'];
                $activity->activity_answer = $_POST['activity_answer'];
			    $activity->insert_activity();    
                header('Location:index.php?page=Lista-de-Atendimentos');
                exit;
            }
            
            if($operation=="edit"){
                //caso o usuário tenha preenchido algo do formulário de ADD Activity, insere a nova atividade no BD
                if($_POST['new_activity_date']!="" || $_POST['new_activity_proposal']!="" || $_POST['new_activity_answer']!="" ){
                    $activity->activity_opportunity_id = $_GET["opportunity_id"];
                    $activity->activity_date = $_POST['new_activity_date'];
                    $activity->activity_proposal = $_POST['new_activity_proposal'];
                    $activity->activity_answer = $_POST['new_activity_answer'];
                    $activity->insert_activity();
                }
                //Caso o usuário tenha preenchido o opportunity_title , atualiza no bd
                if($_POST["opportunity_title"]!=""){
                    $opportunity->get_opportunity($_GET["opportunity_id"]);
                    $opportunity->opportunity_title = $_POST['opportunity_title'];
                    $opportunity->update_opportunity($_GET["opportunity_id"]);
                }
                //Caso o usuário tenha preenchido o opportunity_description , atualiza no bd
                if($_POST["opportunity_description"]!=""){
                    $opportunity->get_opportunity($_GET["opportunity_id"]);
                    $opportunity->opportunity_description = $_POST['opportunity_description'];
                    $opportunity->update_opportunity($_GET["opportunity_id"]);
                }
                //Caso o usuário tenha preenchido o opportunity_status, atualiza no bd
                if($_POST["opportunity_status"]!=""){
                    $opportunity->get_opportunity($_GET["opportunity_id"]);
                    $opportunity->opportunity_status = $_POST['opportunity_status'];
                    $opportunity->update_opportunity($_GET["opportunity_id"]);
                }                
                //Caso o usuário tenha editado alguma ativiade, atualiza no bd
                if($_POST['edit_activity_date']!="" || $_POST['edit_activity_proposal']!="" || $_POST['edit_activity_answer']!="" ){
                    $activity->get_activity($_POST['edit_activity_id']);
                    if($_POST['edit_activity_date']!=""){
                        $activity->activity_date = $_POST['edit_activity_date'];
                    }
                    if($_POST['edit_activity_proposal']!=""){
                        $activity->activity_proposal = $_POST['edit_activity_proposal'];
                    }
                    if($_POST['edit_activity_answer']!=""){
                        $activity->activity_answer = $_POST['edit_activity_answer'];
                    }
                    $activity->update_activity($_POST['edit_activity_id']);
                }
                //Caso no novo status do atendimento seja setado para vendido é redirecionado para Concluir Venda
                if($opportunity->opportunity_status=="Vendido"){
                    header('Location:index.php?page=Concluir-Venda&opportunity_id='.$_GET["opportunity_id"].'&client_id='.$_GET["client_id"].'');
                    exit;
                }
                //Caso contrário continua no Editar Atendidmento
                else{
                    header('Location:index.php?page=Editar-Atendimento&opportunity_id='.$_GET["opportunity_id"].'&client_id='.$_GET["client_id"].'');
                    exit;
                }
            }
            
            if($operation=="complete"){
                //atualiza as infos do cliente
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
                $client->client_contact_email = $_POST['client_contact_email'];
                $client->client_future_opportunities = $_POST['client_future_opportunities'];
			    $client->update_client();
                
                //atualiza as infos do atendimento
                $opportunity->get_opportunity($_GET["opportunity_id"]);
                $opportunity->opportunity_title = $_POST['opportunity_title'];
                $opportunity->opportunity_description = $_POST['opportunity_description'];
                $opportunity->opportunity_status = $_POST['opportunity_status'];
                $opportunity->opportunity_notes = $_POST['opportunity_notes'];
                $opportunity->opportunity_deal_date = $_POST['opportunity_deal_date'];
                $opportunity->opportunity_currency_code = $_POST['opportunity_currency_code'];
                $opportunity->opportunity_total_value = $_POST['opportunity_total_value'];
                $opportunity->opportunity_total_inflow_date = $_POST['opportunity_total_inflow_date'];                            
                $opportunity->update_opportunity($_GET["opportunity_id"]);
                //verifica se existe um orçamento para esse atendimento
                $deal_course_id=$opportunity->get_deal_course();
                //se existir vai para página de editar orçamento
                if($deal_course_id!=""){
                     header('Location:index.php?page=Editar-Orçamento&opportunity_id='.$_GET["opportunity_id"]);
                     exit;
                }
                //caso contrário vai para página de add
                else{
                    header('Location:index.php?page=Adicionar-Orcamento&opportunity_id='.$_GET["opportunity_id"]);
                    exit;
                }
            }
    }