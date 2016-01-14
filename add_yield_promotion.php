<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <?php 
    //pegar os valores de variável via get
if(isset($_POST['empty_seats_available'])){
    $empty_seats_available = $_POST['empty_seats_available'];
    $course_name = $_POST['course_name'];
    $timetable_classes = $_POST['timetable_classes'];
    $weeks_available = $_POST['weeks_available'];
    $net_fee = $_POST['net_fee'];
    $minimum_gross_fee = $_POST['minimum_gross_fee'];
    $regular_gross_fee = $_POST['regular_gross_fee'];
    $country = $_POST['country'];
    $states = $_POST['states'];
    $start_date_from = $_POST['start_date_from'];
    $start_date_to = $_POST['start_date_to'];
    $monday_yes_no = $_POST['monday_yes_no'];
    $specific_start_dates = $_POST['specific_start_dates'];
    $enrolment_fee = $_POST['enrolment_fee'];
    $oshc = $_POST['oshc'];
    $material_fee = $_POST['material_fee'];
    $other_fees_yes_no = $_POST['other_fees_yes_no'];
    $compulsory_fees = $_POST['compulsory_fees'];
    $accommodation_special_yes_no = $_POST['accommodation_special_yes_no'];
    $option_1_description     = $_POST['option_1_description'];
    $option_1_placement_fee     = $_POST['option_1_placement_fee'];
    $option_1_net_fee  = $_POST['option_1_net_fee'];
    $option_2_description = $_POST['option_2_description'];
    $option_2_placement_fee = $_POST['option_2_placement_fee'];
    $option_2_net_fee = $_POST['option_2_net_fee'];
    $option_3_description = $_POST['option_3_description'];
    $option_3_placement_fee = $_POST['option_3_placement_fee'];
    $option_3_net_fee     = $_POST['option_3_net_fee'];
    $arrival_transfer_fee = $_POST['arrival_transfer_fee'];
    $other_additional_service_fees = $_POST['other_additional_service_fees'];
    $booking_deadline = $_POST['booking_deadline'];
    $refund_policy = $_POST['refund_policy'];
    $special_requirements = $_POST['special_requirements'];
    $proficiency_level = $_POST['proficiency_level'];
    $minimum_age = $_POST['minimum_age'];
    $maximum_age = $_POST['maximum_age'];
    $special_policies = $_POST['special_policies'];
    //a variavel dados dever conter os dados acima, concatenando com ;
//    $dados =  $empty_seats_available . ";" . $course_name . ";" . $timetable_classes . ";" . $weeks_available . ";" . $net_fee . ";" . $minimum_gross_fee . ";" . $regular_gross_fee . ";" . $country . ";" . $states . ";" . $start_date_from . ";" . $start_date_to . ";" . $monday_yes_no . ";" . $specific_start_dates . ";" . $enrolment_fee . ";" . $oshc . ";" . $material_fee . ";" . $other_fees_yes_no . ";" . $compulsory_fees . ";" . $accommodation_special_yes_no . ";" . $option_1_description . ";" . $option_1_placement_fee . ";" . $option_1_net_fee . ";" . $option_2_description . ";" . $option_2_placement_fee . ";" . $option_2_net_fee . ";" . $option_3_description . ";" . $option_3_placement_fee . ";" . $option_3_net_fee . ";" . $arrival_transfer_fee . ";" . $other_additional_service_fees . ";" . $booking_deadline . ";" . $refund_policy . ";" . $special_requirements . ";" . $proficiency_level . $minimum_age . ";" . $maximum_age . ";" . $special_policies."\n";
    $user=$_SESSION["user"];
    $to="tatiana@grupoartha.com". ", ";
    $to.="ti01@grupoartha.com". ", ";
    $to.="pablo.fl@hotmail.com";
//    $subject="Novo formulário de $user->username ($user->email)";
    $subject="New form of $user->username ($user->email)";
    $message="
    <html>
                                <head>
                                </head>
                                <body>
    Formulário enviado por $user->username ($user->email) ".date("d/m/Y h:i:sa")."
    <br/>
    <table>
        <tr><td>Number of empty seats available in class:</td><td>$empty_seats_available</td></tr>
        <tr><td>Course name:</td><td>$course_name</td></tr>
        <tr><td>Timetable of classes (AM, PM, student can choose, according to the arrival test):</td><td>$timetable_classes</td></tr>
        <tr><td>Number of weeks available:</td><td>$weeks_available</td></tr>
        <tr><td>Net fee per week:</td><td>$net_fee</td></tr>
        <tr><td>Suggested minimum gross fee per week:</td><td>$minimum_gross_fee</td></tr>
        <tr><td>Regular gross fee per week:</td><td>$regular_gross_fee</td></tr>
        <tr><td colspan='2'>Target Market</td></tr>
        <tr><td>Country:</td><td>$country</td></tr>
        <tr><td>State:</td><td>$states</td></tr>
        <tr><td>Start Date from:</td><td>$start_date_from</td></tr>
        <tr><td>Start Date to:</td><td>$start_date_to</td></tr>
        <tr><td>Can the student start any Monday between these dates:</td><td>$monday_yes_no</td></tr>
        <tr><td>If No, specify the start dates:</td><td>$specific_start_dates</td></tr>
        <tr><td colspan='2'>Other fees</td></tr>
        <tr><td>Enrolment fee:</td><td>$enrolment_fee</td></tr>
        <tr><td>OSHC:</td><td>$oshc</td></tr>
        <tr><td>Material fee:</td><td>$material_fee</td></tr>
        <tr><td>Any other compulsory fee?</td><td>$other_fees_yes_no</td></tr>
        <tr><td>If Yes, specify:</td><td>$compulsory_fees</td></tr>
        <tr><td colspan='2'>Accommodation</td></tr>
        <tr><td>Can the school provide a special price for accommodation?</td><td>$accommodation_special_yes_no</td></tr>
        <tr><td colspan='2'>If No, please refer to the regular fee for this information</td></tr>
        <tr><td colspan='2'>If Yes, specify</td></tr>
        <tr><td>Option 1 (Description):</td><td>$option_1_description</td></tr>
        <tr><td>Placement fee:</td><td>$option_1_placement_fee</td></tr>
        <tr><td>Net fee per week:</td><td>$option_1_net_fee</td></tr>
        <tr><td>Option 2 (Description):</td><td>$option_2_description</td></tr>
        <tr><td>Placement fee:</td><td>$option_2_placement_fee</td></tr>
        <tr><td>Net fee per week:</td><td>$option_2_net_fee</td></tr>
        <tr><td>Option 3 (Description):</td><td>$option_3_description</td></tr>
        <tr><td>Placement fee:</td><td>$option_3_placement_fee</td></tr>
        <tr><td>Net fee per week:</td><td>$option_3_net_fee</td></tr>
        <tr><td colspan='2'>Additional Services</td></tr>
        <tr><td>Arrival Airport Transfer:</td><td>$arrival_transfer_fee</td></tr>
        <tr><td>Other, please explain:</td><td>$other_additional_service_fees</td></tr>
        <tr><td colspan='2'>Terms and Conditions of Special Promotion Seats Available</td></tr>
        <tr><td>Booking deadline:</td><td>$booking_deadline</td></tr>
        <tr><td>Refund polices, extension policies, date change policies for this Promotion:</td><td>$refund_policy</td></tr>
        <tr><td>Special requirement for this course:</td><td>$special_requirements</td></tr>
        <tr><td>Level of proficiency:</td><td>$proficiency_level</td></tr>
        <tr><td>Minimum age:</td><td>$minimum_age</td></tr>
        <tr><td>Maximum age:</td><td>$maximum_age</td></tr>
        <tr><td>Any other special term: </td><td>$special_policies</td></tr>
    </table>
    </body>
    </html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@grupoartha.com' . "\r\n";
    $headers .='Reply-To: info@grupoartha.com' . "\r\n";
    mail($to, $subject, $message, $headers);
//    $arquivo = fopen("csv\yield\yields.csv", "a+");
//    fputs($arquivo,$dados);
//    //fecha o arquivo
//    fclose($arquivo);
    
    echo"<div class='alert alert-success alert-dismissable' style='margin-top:2%'>
                                            <i class='fa fa-check'></i>
                                            <b>Informações Salvas com sucesso!</b> Os dados informados passarão por um processo de validação. Obrigado<br/>
                                            <b>Saved Information successfully! </ b> The reported data will go through a validation process. Thank you
                                        </div>";
}

?>
    <section class="content-header">
        <h1>
            Adding Yield Management Promotion
            <small>Data and Values</small>
        </h1>
        <br/>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"></li>
        </ol>
    </section>
    <!-- Main content -->                            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
					<!-- COMEÇO DO FORM -->
                    <div class="box-header">
                        <h3 class="box-title">Adding Yield Management Promotion</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
						<form id="insurance_form" method="POST" role="form" class="half-form" action="index.php?page=Add-Yield-Management-Promotion">
                            <!-- text input --> 
							<div class="form-group control-group">
								<label class="control-label" for="empty_seats_available">Number of empty seats available in class:</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="empty_seats_available" name="empty_seats_available" placeholder="Number of empty seats available in class" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="Course name: ">Course name: </label>
								<div class="controls">									 
									 <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="Timetable_classes">Timetable of classes (AM, PM, student can choose, according to the arrival test):</label>
								<div class="controls">									 
									<input type="text" class="form-control" id="timetable_classes" name="timetable_classes" placeholder="Timetable of classes (AM, PM, student can choose, according to the arrival test):"  />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="weeks_available">Number of weeks available: </label>
								<div class="controls">	
									<input type="text" class="form-control" id="weeks_available" name="weeks_available" placeholder="Number of weeks available"  />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="net_fee">Net fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="net_fee" name="net_fee" placeholder="Net fee per week "   />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="minimum_gross_fee">Suggested minimum gross fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="minimum_gross_fee" name="minimum_gross_fee" placeholder="Suggested minimum gross fee per week" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="regular_gross_fee">Regular gross fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="regular_gross_fee" name="regular_gross_fee" placeholder="Regular gross fee per week" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="target_market">Target Market</label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="country">Country: </label>
								<div class="controls">
									<input type="text" class="form-control" id="country" name="country" value="Brazil" placeholder="Country" readonly />
								</div>
                            </div>
                             <div class="form-group control-group">
								<label class="control-label" for="states">State: </label>
								<div class="controls">
									<input type="text" class="form-control" id="states" name="states" value="All" placeholder="States" readonly />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="start_date_from">Start Date from: </label>
								<div class="controls">
									<input type="text" class="form-control" id="start_date_from" name="start_date_from" placeholder="Start Date from" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="start_date_to">Start Date to: </label>
								<div class="controls">
									<input type="text" class="form-control" id="start_date_to" name="start_date_to" placeholder="Start Date to" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="monday_yes_no">Can the student start any Monday between these dates: </label>
                                <select class="form-control" id="monday_yes_no" name="monday_yes_no" >
                                    <option value="Yes" selected="selected">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="specific_start_dates">If No, specify the start dates: </label>
								<div class="controls">
									<input type="text" class="form-control" id="specific_start_dates" name="specific_start_dates" placeholder="If No, specify the start dates" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="target_market">Other fees</label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="enrolment_fee">Enrolment fee: </label>
								<div class="controls">
									<input type="text" class="form-control" id="enrolment_fee" name="enrolment_fee" placeholder="Enrolment fee" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="oshc">OSHC: </label>
								<div class="controls">
									<input type="text" class="form-control" id="oshc" name="oshc" placeholder="OSHC" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="material_fee">Material fee: </label>
								<div class="controls">
									<input type="text" class="form-control" id="material_fee" name="material_fee" placeholder="Material fee" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="other_fees_yes_no">Any other compulsory fee? </label>
                                <select class="form-control" id="other_fees_yes_no" name="other_fees_yes_no" >
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected="selected">No</option>
                                </select>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="compulsory_fees">If Yes, specify: </label>
								<div class="controls">
									<input type="text" class="form-control" id="compulsory_fees" name="compulsory_fees" placeholder="If Yes, specify" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="target_market">Accommodation </label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="accommodation_special_yes_no">Can the school provide a special price for accommodation? </label>
                                <select class="form-control" id="accommodation_special_yes_no" name="accommodation_special_yes_no" >
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected="selected">No</option>
                                </select>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="refer_to_normal_fees">If No, please refer to the regular fee for this information </label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="refer_to_options_below">If Yes, specify </label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_1_description">Option 1 (Description): </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_1_description" name="option_1_description" placeholder="Option 1 (Description)" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_1_placement_fee">Placement fee: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_1_placement_fee" name="option_1_placement_fee" placeholder="Placement fee" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_1_net_fee">Net fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_1_net_fee" name="option_1_net_fee" placeholder="Net fee per week" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_2_description">Option 2 (Description): </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_2_description" name="option_2_description" placeholder="Option 2 (Description)" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_2_placement_fee">Placement fee: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_2_placement_fee" name="option_2_placement_fee" placeholder="Placement fee" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_2_net_fee">Net fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_2_net_fee" name="option_2_net_fee" placeholder="Net fee per week" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_3_description">Option 3 (Description): </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_3_description" name="option_3_description" placeholder="Option 3 (Description)" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_3_placement_fee">Placement fee: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_3_placement_fee" name="option_3_placement_fee" placeholder="Placement fee" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="option_3_net_fee">Net fee per week: </label>
								<div class="controls">
									<input type="text" class="form-control" id="option_3_net_fee" name="option_3_net_fee" placeholder="Net fee per week" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="additional_services">Additional Services </label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="arrival_transfer_fee">Arrival Airport Transfer: </label>
								<div class="controls">
									<input type="text" class="form-control" id="arrival_transfer_fee" name="arrival_transfer_fee" placeholder="Arrival Airport Transfer" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="other_additional_service_fees">Other, please explain: </label>
								<div class="controls">
									<input type="text" class="form-control" id="other_additional_service_fees" name="other_additional_service_fees" placeholder="Other, please explain" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="terms_and_conditions">Terms and Conditions of Special Promotion Seats Available </label>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="booking_deadline">Booking deadline: </label>
								<div class="controls">
									<input type="text" class="form-control" id="booking_deadline" name="booking_deadline" placeholder="Booking deadline" />
								</div>
                            </div>
                            <div class="form-group control-group">
								<label class="control-label" for="refund_policy">Refund polices, extension policies, date change policies for this Promotion: </label>
								<div class="controls">
									<input type="text" class="form-control" id="refund_policy" name="refund_policy" placeholder="Refund polices, extension policies, date change policies for this Promotion" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="special_requirements">Special requirement for this course: </label>
								<div class="controls">
									<input type="text" class="form-control" id="special_requirements" name="special_requirements" placeholder="Special requirement for this course" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="proficiency_level">Level of proficiency: </label>
								<div class="controls">
									<input type="text" class="form-control" id="proficiency_level" name="proficiency_level" placeholder="Level of proficiency" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="minimum_age">Minimum age: </label>
								<div class="controls">
									<input type="text" class="form-control" id="minimum_age" name="minimum_age" placeholder="Minimum age" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="maximum_age">Maximum age: </label>
								<div class="controls">
									<input type="text" class="form-control" id="maximum_age" name="maximum_age" placeholder="Maximum age" />
								</div>
                            </div>
							<div class="form-group control-group">
								<label class="control-label" for="special_policies">Any other special term: </label>
								<div class="controls">
									<input type="text" class="form-control" id="special_policies" name="special_policies" placeholder="Any other special term" />
								</div>
                            </div>
							<div class="form-group control-group">
								<div class="controls">
									<button class="btn btn-warning" type="submit">Send</button>
								</div>
                            </div>
                        </form>
                    </div>
					<!--FINAL DO FORM-->
                </div>
            </div>
        </div>
    </section><!-- /.content -->

<!--
<script>
  $(function() {
    $( "#start_date_from" ).datepicker();
  });
</script>
-->

