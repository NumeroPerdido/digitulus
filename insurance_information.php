<?php
	include_once "insurance.class.php";
	$insurance= new Insurance();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                
                $insurance->us_canada_extra_insurance_net_value = $_POST['us_canada_extra_insurance_net_value'];
                $insurance->world_extra_insurance_net_value = $_POST['world_extra_insurance_net_value'];
                $insurance->extra_insurance_gross_value = $_POST['extra_insurance_gross_value'];
                $insurance->ireland_insurance_value = $_POST['ireland_insurance_value'];
                $insurance->oshc_insurance_value= $_POST['oshc_insurance_value'];
                $insurance->insurance_duration = $_POST['insurance_duration'];
			    $insurance->insert_insurance();
                header('Location:index.php?page=Lista-de-Seguros&success=add');
            }
            elseif ($operation =="edit")
            {
                $insurance->us_canada_extra_insurance_net_value = $_POST['us_canada_extra_insurance_net_value'];
                $insurance->world_extra_insurance_net_value = $_POST['world_extra_insurance_net_value'];
                $insurance->extra_insurance_gross_value = $_POST['extra_insurance_gross_value'];
                $insurance->ireland_insurance_value = $_POST['ireland_insurance_value'];
                $insurance->oshc_insurance_value= $_POST['oshc_insurance_value'];
                $insurance->insurance_duration = $_GET['insurance_duration'];
			    $insurance->update_insurance();
              
                header('Location:index.php?page=Lista-de-Seguros&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $insurance->insurance_duration = $_GET["insurance_duration"];
                $insurance->delete_insurance($insurance->insurance_duration);
                header('Location:index.php?page=Lista-de-Seguros&success=delete'); 

            } 

            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Seguros';
					</script>";
            }
    }






	