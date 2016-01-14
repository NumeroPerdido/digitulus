<?php
	include_once "deal_course.class.php";
	include_once "opportunity.class.php";
    include_once "user.class.php";
	$deal_course= new Deal_course();
    $opportunity= new Opportunity();

    if (isset($_GET["page"]))
        {
        
            $operation = $_GET["page"];
           
            if ($operation == "add")
            {
                session_start();
                $deal_course->deal_course_user_id = $_SESSION["user"]->user_id;
                if(isset($_GET['opportunity_id'])){
                    $deal_course->deal_course_opportunity_id = $_GET['opportunity_id'];
                }
                if(isset($_POST['deal_course_user_id'])){
                    $deal_course->deal_course_user_id = $_POST['deal_course_user_id'];
                }
                if(isset($_POST['country'])){
                    $deal_course->country = $_POST['country'];
                }
                if(isset($_POST['school'])){
                 $deal_course->school = $_POST['school'];
                }
                if(isset($_POST['city'])){
                    $deal_course->city = $_POST['city'];
                }
                if(isset($_POST['neighbourhood'])){
                    $deal_course->neighbourhood = $_POST['neighbourhood'];
                }
                if(isset($_POST['course_name'])){
                    $deal_course->course_name = $_POST['course_name'];
                }
                if(isset($_POST['lessons_per_week'])){
                    $deal_course->lessons_per_week = $_POST['lessons_per_week'];
                }
                if(isset($_POST['lesson_duration'])){
                    $deal_course->lesson_duration = $_POST['lesson_duration'];
                }
                if(isset($_POST['start_date'])){
                    $deal_course->start_date = $_POST['start_date'];
                }
                if(isset($_POST['duration'])){
                    $deal_course->duration = $_POST['duration'];
                }
                if(isset($_POST['finish_date'])){
                    $deal_course->finish_date = $_POST['finish_date'];
                }
                if(isset($_POST['currency_code'])){
                    $deal_course->currency_code = $_POST['currency_code'];
                }
                if(isset($_POST['banking_fee_value'])){
                    $deal_course->banking_fee_value = $_POST['banking_fee_value'];
                }
                if(isset($_POST['registration_fee_value'])){
                    $deal_course->registration_fee_value = $_POST['registration_fee_value'];
                }
                if(isset($_POST['course_value'])){
                    $deal_course->course_value = $_POST['course_value'];
                }
                if(isset($_POST['material_fee_value'])){
                    $deal_course->material_fee_value = $_POST['material_fee_value'];
                }
                if(isset($_POST['others_value'])){
                    $deal_course->others_value = $_POST['others_value'];
                }
                if(isset($_POST['accommodation_type'])){
                    $deal_course->accommodation_type = $_POST['accommodation_type'];
                }
                if(isset($_POST['room'])){
                    $deal_course->room = $_POST['room'];
                }
                if(isset($_POST['meals'])){
                    $deal_course->meals = $_POST['meals'];
                }
                if(isset($_POST['accommodation_start_date'])){
                    $deal_course->accommodation_start_date = $_POST['accommodation_start_date'];
                }
                if(isset($_POST['accommodation_duration'])){
                    $deal_course->accommodation_duration = $_POST['accommodation_duration'];
                }
                if(isset($_POST['accommodation_finish_date'])){
                    $deal_course->accommodation_finish_date = $_POST['accommodation_finish_date'];
                }
                if(isset($_POST['accommodation_fee_value'])){
                    $deal_course->accommodation_fee_value = $_POST['accommodation_fee_value'];
                }
                if(isset($_POST['accommodation_value'])){
                    $deal_course->accommodation_value = $_POST['accommodation_value'];
                }
                if(isset($_POST['required_insurance_value'])){
                    $deal_course->required_insurance_value = $_POST['required_insurance_value'];
                }
                if(isset($_POST['airport_transfer_value'])){
                    $deal_course->airport_transfer_value = $_POST['airport_transfer_value'];
                }
                if(isset($_POST['extra_nights'])){
                    $deal_course->extra_nights = $_POST['extra_nights'];
                }
                $resp=$deal_course->insert_deal_course();
                $deal_course_id=$resp[0]["LAST_INSERT_ID()"];
                header('Location: PHPWord/generate_contract.php?opportunity_id='.$deal_course->deal_course_opportunity_id.'&deal_course_id='.$deal_course_id);
//                header('Location:index.php?page=Lista-de-Orcamentos&success=add');
            }
            elseif ($operation =="edit")
            {
                $deal_course->deal_course_id = $_POST['deal_course_id'];
                $deal_course->deal_course_opportunity_id = $_POST['deal_course_opportunity_id'];
                $deal_course->deal_course_user_id = $_POST['deal_course_user_id'];
                $deal_course->country = $_POST['country'];
                $deal_course->school = $_POST['school'];
                $deal_course->city = $_POST['city'];
                $deal_course->neighbourhood = $_POST['neighbourhood'];
                $deal_course->course_name = $_POST['course_name'];
                $deal_course->lessons_per_week = $_POST['lessons_per_week'];
                $deal_course->lesson_duration = $_POST['lesson_duration'];
                $deal_course->start_date = $_POST['start_date'];
                $deal_course->duration = $_POST['duration'];
                $deal_course->finish_date = $_POST['finish_date'];
                $deal_course->currency_code = $_POST['currency_code'];
                $deal_course->banking_fee_value = $_POST['banking_fee_value'];
                $deal_course->registration_fee_value = $_POST['registration_fee_value'];
                $deal_course->course_value = $_POST['course_value'];
                $deal_course->material_fee_value = $_POST['material_fee_value'];
                $deal_course->others_value = $_POST['others_value'];
                $deal_course->accommodation_type = $_POST['accommodation_type'];
                $deal_course->room = $_POST['room'];
                $deal_course->meals = $_POST['meals'];
                $deal_course->accommodation_start_date = $_POST['accommodation_start_date'];
                $deal_course->accommodation_duration = $_POST['accommodation_duration'];
                $deal_course->accommodation_finish_date = $_POST['accommodation_finish_date'];
                $deal_course->accommodation_fee_value = $_POST['accommodation_fee_value'];
                $deal_course->accommodation_value = $_POST['accommodation_value'];
                $deal_course->required_insurance_value = $_POST['required_insurance_value'];
                $deal_course->airport_transfer_value = $_POST['airport_transfer_value'];
                $deal_course->extra_nights = $_POST['extra_nights'];
			    $deal_course->update_deal_course();
                header('Location:index.php?page=Lista-de-Orcamentos&success=edit');
            }
            elseif ($operation =="delete") 
            {
                $deal_course->deal_course_id = $_GET["deal_course_id"];
                $deal_course->delete_deal_course($deal_course->deal_course_id);
                header('Location:index.php?page=Lista-de-Orcamentos&success=delete'); 
            } 
            else
            {
                echo "<script language=\"JavaScript\">;
					alert(\"Operação inválida\");
					document.location.href = 'index.php?page=Lista-de-Orcamentos';
					</script>";
            }
    }






	