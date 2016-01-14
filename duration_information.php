<?php
	include_once "duration.class.php";
	$duration= new Duration();

if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                
                $duration->standard_travel_duration = $_POST["standard_travel_duration"];
                $duration->standard_travel_duration_name = $_POST['standard_travel_duration_name'];
                $duration->australia_weeks_of_vacation = $_POST['australia_weeks_of_vacation'];
                $duration->australia_travel_duration = $_POST['australia_travel_duration'];
                $duration->australia_travel_duration_name = $_POST['australia_travel_duration_name'];
                $duration->ireland_weeks_of_vacation = $_POST['ireland_weeks_of_vacation'];
                $duration->ireland_travel_duration = $_POST['ireland_travel_duration'];
                $duration->ireland_travel_duration_name = $_POST['ireland_travel_duration_name'];	
                header('Location:index.php?page=Lista-de-Duracoes&success=add');
            }
            elseif ($operation =="edit")
            {
          
         
                $duration->standard_travel_duration = $_POST["standard_travel_duration"];
                $duration->standard_travel_duration_name = $_POST['standard_travel_duration_name'];
                $duration->australia_weeks_of_vacation = $_POST['australia_weeks_of_vacation'];
                $duration->australia_travel_duration = $_POST['australia_travel_duration'];
                $duration->australia_travel_duration_name = $_POST['australia_travel_duration_name'];
                $duration->ireland_weeks_of_vacation = $_POST['ireland_weeks_of_vacation'];
                $duration->ireland_travel_duration = $_POST['ireland_travel_duration'];
                $duration->ireland_travel_duration_name = $_POST['ireland_travel_duration_name'];	
                $duration->update_duration();
                header('Location:index.php?page=Lista-de-Duracoes&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $duration->standard_travel_duration = $_GET["standard_travel_duration"];
                $duration->delete_duration($duration->standard_travel_duration);
                header('Location:index.php?page=Lista-de-Duracoes&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Duracoes';
					</script>";
            }
    }