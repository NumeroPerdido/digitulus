<?php
	include_once "opportunity.class.php";
	include_once "activity.class.php";
    include_once "user.class.php";
	$opportunity= new Opportunity();
    $activity= new Activity();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                session_start();
                $opportunity->opportunity_user_id = $_SESSION["user"]->user_id;
                if(isset($_POST['opportunity_title'])){
                    $opportunity->opportunity_title = $_POST['opportunity_title'];
                }
                if(isset($_POST['opportunity_description'])){
                    $opportunity->opportunity_description = $_POST['opportunity_description'];
                }
                if(isset($_POST['opportunity_status'])){
                    $opportunity->opportunity_status = $_POST['opportunity_status'];
                }                
                if(isset($_GET["client_id"])){
                    $opportunity->opportunity_client_id = $_GET["client_id"];
                }
                if(isset($_POST['opportunity_notes'])){
                    $opportunity->opportunity_notes = $_POST['opportunity_notes'];
                }
                if(isset($_POST['opportunity_deal_date'])){
                    $opportunity->opportunity_deal_date = $_POST['opportunity_deal_date'];
                }
                if(isset($_POST['opportunity_currency_code'])){
                    $opportunity->opportunity_currency_code = $_POST['opportunity_currency_code'];
                }
                if(isset($_POST['opportunity_total_value'])){
                    $opportunity->opportunity_total_value = $_POST['opportunity_total_value'];
                }
                if(isset($_POST['opportunity_total_inflow_date'])){
                    $opportunity->opportunity_total_inflow_date = $_POST['opportunity_total_inflow_date'];
                }                
                $resp=$opportunity->insert_opportunity();
                $opportunity_id=$resp[0]["LAST_INSERT_ID()"];
                
                $activity->activity_opportunity_id = $opportunity_id;
                if(isset($_POST['activity_date'])){
                     $activity->activity_date = $_POST['activity_date'];
                }
                if(isset($_POST['activity_proposal'])){
                     $activity->activity_proposal = $_POST['activity_proposal'];
                }
                if(isset($_POST['activity_answer'])){
                     $activity->activity_answer = $_POST['activity_answer'];
                }
			    $activity->insert_activity();    
                header('Location:index.php?page=Lista-de-Atendimentos&success=add');
            }
            elseif ($operation =="edit")
            {
                $opportunity->opportunity_id = $_POST['opportunity_id'];
                $opportunity->opportunity_user_id = $_POST['opportunity_user_id'];                
                $opportunity->opportunity_title = $_POST['opportunity_title'];
                $opportunity->opportunity_description = $_POST['opportunity_description'];
                $opportunity->opportunity_status = $_POST['opportunity_status'];                
                $opportunity->opportunity_client_id = $_POST['opportunity_client_id'];
                $opportunity->opportunity_notes = $_POST['opportunity_notes'];
                $opportunity->opportunity_deal_date = $_POST['opportunity_deal_date'];
                $opportunity->opportunity_currency_code = $_POST['opportunity_currency_code'];
                $opportunity->opportunity_total_value = $_POST['opportunity_total_value'];
                $opportunity->opportunity_total_inflow_date = $_POST['opportunity_total_inflow_date'];                                                
			    $opportunity->update_opportunity();
              
                header('Location:index.php?page=Lista-de-Atendimentos&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $opportunity->opportunity_id = $_GET["opportunity_id"];
                $opportunity->delete_opportunity($opportunity->opportunity_id);
                header('Location:index.php?page=Lista-de-Atendimentos&success=delete'); 
            } 
            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Atendimentos';
					</script>";
            }
    }






	