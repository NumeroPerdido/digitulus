<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Painel de Controle
                        <!--<small>Últimas novidades</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Painel de Controle</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">R$</sup><?php echo $currency[0]; ?>
                                    </h3>
                                    <p>
                                        Valor do Dólar
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-money"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    + Info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        It's Over 9000
                                    </h3>
                                    <p>
                                        Produtos Vencidos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-alarm-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    + Info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $_SESSION["qtproducts"]; ?>
                                    </h3>
                                    <p>
                                        Produtos no Sistema
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    + Info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                       <?php echo $_SESSION["qtuser"];?>
                                    </h3>
                                    <p>
                                        Usuários Cadastrados
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    + Info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <!--<div class="col-lg-3 col-xs-6">
                            <!-- small box 
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    + Info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>--><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->
 
                            <!-- Box com Lista de Aniversariantes -->
                            <div class="box box-danger" id="list-of-client-birthday">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-birthday-cake"></i>

                                    <h3 class="box-title">Lista de Aniversariantes</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Dia da Semana</th>
                                            <th>Data de Nascimento</th>
                                            <th>Nome</th>
                                            <th>Aniversário a ser comemorado</th>
                                            <th>E-mail</th>
                                            <th>Telefone residencial</th>
                                            <th>Celular</th>
                                        </tr>
                                        
                                            <?php
function diasemana($data) 
{
	
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana)
	{
		case"0": 
			$diasemana = "Domingo";       
		break;
		case"1": 
			$diasemana = "Segunda-feira"; 
		break;
		case"2": 
			$diasemana = "Terça-feira";   
		break;
		case"3": 
			$diasemana = "Quarta-feira"; 
		break;
		case"4": 
			$diasemana = "Quinta-feira";  
		break;
		case"5": 
			$diasemana = "Sexta-feira"; 
		break;
		case"6": 
			$diasemana = "Sábado";       
		break;
		default:
			$diasemana= "Data inválida";
			break;
	}

	return $diasemana;
}
    include_once "db.class.php";
    $db = new DB();
    $sql = "SELECT client_date_of_birth, client_name, client_surname, client_email, client_phone, client_mobile FROM `digitulus_client` WHERE WEEKOFYEAR( CONCAT( YEAR(NOW()),'-',MONTH( client_date_of_birth),'-',DAY(client_date_of_birth) ) ) = WEEKOFYEAR( NOW() )";                          $query = $db->query($sql);                                 
     foreach($query as $results)
     { 
     
      echo "<tr>";
       echo "<td>" . diasemana(2015 ."-".substr($results['client_date_of_birth'],5,2)."-".substr($results['client_date_of_birth'],8,2)). "</td>";
       echo "<td>" . substr($results['client_date_of_birth'],8,2)."/".substr($results['client_date_of_birth'],5,2) . "</td>";    
       echo "<td>" . $results['client_name'] ." " . $results['client_surname']. "</td>";
       $idade= date('Y') - substr($results['client_date_of_birth'],0,4); 
       echo "<td>" . $idade."</td>";
       echo "<td>". str_replace("@","<br>@",$results['client_email']). "</td>";
       echo "<td>". $results['client_phone'] . "</td>";
       echo "<td>" . $results['client_mobile']. "</td>";
       echo "</tr>"; 
       
     }
                       ?>
          
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->  
      
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable"> 
                                                        <!-- Box (with bar chart) -->
                            <div class="box box-danger" id="loading-example">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-money"></i>

                                    <h3 class="box-title">Cotação do dia</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <!-- bar chart -->
                                            <div class="chart" id="bar-chart" style="height: 250px;"></div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="pad">
                                                <!-- Progress bars -->
                                                <div class="clearfix">
                                                    <span class="pull-left">Dólar</span>
                                                    <small class="pull-right">$<?php echo $currency[0]; ?></small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: <?php echo $currency[0]*10; ?>%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">Libra</span>
                                                    <small class="pull-right">£<?php echo $currency[2]; ?></small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: <?php echo $currency[2]*10; ?>%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">Euro</span>
                                                    <small class="pull-right">€<?php echo $currency[4]; ?></small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-light-blue" style="width: <?php echo $currency[4]*10; ?>%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">Dólar Canadense</span>
                                                    <small class="pull-right">C$<?php echo $currency[3]; ?></small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: <?php echo $currency[3]*10; ?>%;"></div>
                                                </div>
                                                <!-- Buttons -->
                                                <p>
                                                    <button class="btn btn-default btn-sm" onclick="funcao2()"><i class="fa fa-cloud-download"></i> Baixar PDF</button>
                                                </p>
                                            </div><!-- /.pad -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row - inside box -->
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="<?php echo $currency[1]; ?>" data-width="60" data-height="60" data-fgColor="#f56954"/>
                                            <div class="knob-label">Libra</div>
                                        </div><!-- ./col -->
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="<?php echo $currency[0]; ?>" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                                            <div class="knob-label">Dólar</div>
                                        </div><!-- ./col -->
                                        <div class="col-xs-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="<?php echo $currency[4]; ?>" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                                            <div class="knob-label">Euro</div>
                                        </div><!-- ./col -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div><!-- /.box --> 
                            <!-- Box com Alfabeto Fonético -->
                            <div class="box box-primary" id="phonetic-alphabet">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-language"></i>

                                    <h3 class="box-title">Alfabeto Fonético</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Letra</th>
                                            <th>Brasil</th>
                                            <th>Mundo</th>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">A</span></td>
                                            <td>Alfa</td>
                                            <td>Alfa</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">B</span></td>
                                            <td>Bravo</td>
                                            <td>Bravo</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">C</span></td>
                                            <td>Charlie</td>
                                            <td>Charlie</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">D</span></td>
                                            <td>Delta</td>
                                            <td>Delta</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">E</span></td>
                                            <td>Eco</td>
                                            <td>Echo</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">F</span></td>
                                            <td>Fox</td>
                                            <td>Foxtrot</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">G</span></td>
                                            <td>Golfe</td>
                                            <td>Golf</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">H</span></td>
                                            <td>Hotel</td>
                                            <td>Hotel</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">I</span></td>
                                            <td>Índia</td>
                                            <td>India</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">J</span></td>
                                            <td>Juliete</td>
                                            <td>Juliett</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">K</span></td>
                                            <td>Kilo</td>
                                            <td>Kilo</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">L</span></td>
                                            <td>Lima</td>
                                            <td>Lima</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">M</span></td>
                                            <td>Mike</td>
                                            <td>Mike</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">N</span></td>
                                            <td>Novembro</td>
                                            <td>November</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">O</span></td>
                                            <td>Oscar</td>
                                            <td>Oscar</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">P</span></td>
                                            <td>Papa</td>
                                            <td>Papa</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">Q</span></td>
                                            <td>Quebec</td>
                                            <td>Quebec</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">R</span></td>
                                            <td>Romeu</td>
                                            <td>Romeu</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">S</span></td>
                                            <td>Sierra</td>
                                            <td>Sierra</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">T</span></td>
                                            <td>Tango</td>
                                            <td>Tango</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">U</span></td>
                                            <td>Uniforme</td>
                                            <td>Uniform</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">V</span></td>
                                            <td>Victor</td>
                                            <td>Victor</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">W</span></td>
                                            <td>Uísque</td>
                                            <td>Whiskey</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">X</span></td>
                                            <td>Xadrez</td>
                                            <td>X-ray</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">Y</span></td>
                                            <td>Ianque</td>
                                            <td>Yankee</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-blue">Z</span></td>
                                            <td>Zulu</td>
                                            <td>Zulu</td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->        
                            
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->
                    

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Box com Lista de Ramais -->
                            <div class="box box-success" id="list-of-telephone-extensions">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-fw fa-phone"></i>

                                    <h3 class="box-title">Lista de Ramais</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Ramal</th>
                                        </tr>
                                        <tr>
                                            <td>Adilene</td>
                                            <td><span class="badge bg-green">222</span></td>
                                        </tr>
                                        <tr>
                                            <td>Alexandre</td>
                                            <td><span class="badge bg-green">200</span></td>
                                        </tr>
                                        <tr>
                                            <td>Diana</td>
                                            <td><span class="badge bg-green">219</span></td>
                                        </tr>
                                        <tr>
                                            <td>Heitor</td>
                                            <td><span class="badge bg-green">202</span></td>
                                        </tr> 
                                        <tr>
                                            <td>Izabela/Pablo/Brenner/Henrique</td>
                                            <td><span class="badge bg-green">223</span></td>
                                        </tr>  
                                        <tr>
                                            <td>Joyce</td>
                                            <td><span class="badge bg-green">218</span></td>
                                        </tr>                 
                                        <tr>
                                            <td>Marco</td>
                                            <td><span class="badge bg-green">217</span></td>
                                        </tr>   
                                        <tr>
                                            <td>Marina</td>
                                            <td><span class="badge bg-green">224</span></td>
                                        </tr>          
                                        <tr>
                                            <td>Matheus</td>
                                            <td><span class="badge bg-green">220</span></td>
                                        </tr>
                                        <tr>
                                            <td>Octavio</td>
                                            <td><span class="badge bg-green">221</span></td>
                                        </tr>               
                                        <tr>
                                            <td>Rivane</td>
                                            <td><span class="badge bg-green">211</span></td>
                                        </tr>                         
                                        <tr>
                                            <td>Tatiana</td>
                                            <td><span class="badge bg-green">226</span></td>
                                        </tr>                                        
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->  
                            
                           
                            <!-- Map box -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">                                        
                                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->

                                    <i class="fa fa-map-marker"></i>
                                    <h3 class="box-title">
                                        Visitors
                                    </h3>
                                </div>
                                <div class="box-body no-padding">
                                    <div id="world-map" style="height: 300px;"></div>
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Country</th>
                                                <th>Visitors</th>
                                                <th>Online</th>
                                                <th>Page Views</th>
                                            </tr>
                                            <tr>
                                                <td><a href="#">USA</a></td>
                                                <td><div id="sparkline-1"></div></td>
                                                <td>209</td>
                                                <td>239</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">India</a></td>
                                                <td><div id="sparkline-2"></div></td>
                                                <td>131</td>
                                                <td>958</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Britain</a></td>
                                                <td><div id="sparkline-3"></div></td>
                                                <td>19</td>
                                                <td>417</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Brazil</a></td>
                                                <td><div id="sparkline-4"></div></td>
                                                <td>109</td>
                                                <td>476</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">China</a></td>
                                                <td><div id="sparkline-5"></div></td>
                                                <td>192</td>
                                                <td>437</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Australia</a></td>
                                                <td><div id="sparkline-6"></div></td>
                                                <td>1709</td>
                                                <td>947</td>
                                            </tr>
                                        </table><!-- /.table -->
                                    </div>
                                </div><!-- /.box-body-->
                                <div class="box-footer">
                                    <button class="btn btn-info"><i class="fa fa-download"></i> Generate PDF</button>
                                    <button class="btn btn-warning"><i class="fa fa-bug"></i> Report Bug</button>
                                </div>
                            </div>
                            <!-- /.box -->
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>	