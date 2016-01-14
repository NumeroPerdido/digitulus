<?php
	include_once "activity.class.php";
	$activity= new Activity();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                $activity->activity_opportunity_id = $_POST['activity_opportunity_id'];
                $activity->activity_date = $_POST['activity_date'];
                $activity->activity_proposal = $_POST['activity_proposal'];
                $activity->activity_answer = $_POST['activity_answer'];
			    $activity->insert_activity();
                header('Location:index.php?page=Lista-de-Atividades&success=add');
            }
            elseif ($operation =="edit")
            {
                $activity->activity_id = $_POST['activity_id'];
                $activity->activity_opportunity_id = $_POST['activity_opportunity_id'];
                $activity->activity_date = $_POST['activity_date'];
                $activity->activity_proposal = $_POST['activity_proposal'];
                $activity->activity_answer = $_POST['activity_answer'];
			    $activity->update_activity();
              
                header('Location:index.php?page=Lista-de-Atividades&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $activity->activity_id = $_GET["activity_id"];
                $activity->delete_activity($activity->activity_id);
                header('Location:index.php?page=Lista-de-Atividades&success=delete'); 
            } 
            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Atividades';
					</script>";
            }
    }






	