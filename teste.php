<?php
        $db= new DB();
        //pegas dos durations em mes e semana
        $duration=$db->query("SELECT * from duration");
?>
<aside class="right-side">
<div class="box-header">
                                            <h3 class="box-title">Editando Produto 1</h3>
                                        </div><!-- /.box-header -->
                                     <div class="box box-warning">
                                         <div class="tab-content">
        <div class="col-md-6">
            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Date picker</h3>
                                </div>
                                <div class="box-body">

                                    <form method="post" action="index.php?page=teste">
                                        <label class="control-label">Converter CÃ³digo da Rota da Reserva/EmissÃ£o</label>

                                        <div class="controls">									 			
                                            <textarea name="convert_flight_code" id="flight_code" rows="10" cols="65" ></textarea>
                                        </div>
                                        <input type="submit" value="enviar" />
                                    </form>
                                    <?php 
                                        if(isset($_POST["convert_flight_code"])){
                                            $row=explode("\n",$_POST["convert_flight_code"]);
                                            for($i=0;$i<count($row);$i++){
                                                if($row[$i]!=""){
                                                    $cel=explode(" ",$row[$i]);
                                                    echo $cel[1];
//                                                    echo $row[$i]."<br/>";
                                                }
                                            }
                                        }
                                        else{
                                            echo "nada enviado<br/><br/>";
                                        }



                                    ?>
         <!-- phone mask -->
                                    <div class="form-group">
                                        <label>US phone mask:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
        </div>
                                             <input type="text" name="teste" value="asdasd" />
        <div class="col-md-6">
         
        </div>
        </div>
    </div>
                                   
</aside>
<!-- jQuery 2.0.2 -->
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->

<script>
    
$(function() {
//antedeguemon();
                $("[data-mask]").inputmask();

            });
    //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );
</script>